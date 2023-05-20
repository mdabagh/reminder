<?php

namespace App\Http\Controllers;

use App\Jobs\ReminderYearly;
use App\Models\CategoriesMain;
use App\Models\Category;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReminderController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $reminders = Reminder::where('user_id', $user_id)->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        $categories = Category::with('parent')->where('user_id', $user_id)->get();
        $categoriesMine = CategoriesMain::all();
        return view('reminder.index', compact('reminders', 'categories', 'reminders', 'categoriesMine'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'repeat_yearly' => 'nullable|boolean',
        ]);

        $validatedData['user_id'] = auth()->id();

        Reminder::create($validatedData);

        return redirect()->route('reminder.index')->with('success', 'Reminder created successfully.');
    }

    public function edit($reminder)
    {
        $reminder = Reminder::findOrFail($reminder);
        $categories = Category::all();
        return view('reminder.edit', compact('reminder', 'categories'));
    }

    public function update(Request $request, $reminder)
    {
        $reminder = Reminder::findOrFail($reminder);
        $reminder->update($request->all());

        return redirect()->route('reminder.index')->with('success', 'Reminder has been updated successfully.');
    }

    public function destroy($reminder)
    {
        $reminder = Reminder::findOrFail($reminder);
        $reminder->delete();

        return redirect()->route('reminder.index')->with('success', 'Reminder has been deleted successfully.');
    }

    public function checkReminders(Request $request)
    {
        $token = $request->input('token');
        $tokenHash = hash('sha256', $token);
        $AppToken = env('APP_TOKEN');
        if (hash_equals($tokenHash, hash('sha256', $AppToken))) {
            // یافتن تمام یادآور‌هایی که یک ساعت یا کمتر تا زمانشان باقی مانده است
              $reminders = Reminder::where(function ($query) {
                $query->where('date', '=', date('Y-m-d'))
                    ->whereBetween('time', [
                        date('H:i'),
                        date('H:i', strtotime('+1 hour'))
                    ]);
            })->orWhere(function ($query) {
                $query->where('repeat_yearly', '=', true)
                    ->where('date', 'like', '%' . date('-m-d'))
                    ->whereBetween('time', [
                        date('H:i'),
                        date('H:i', strtotime('+1 hour'))
                    ]);
            })->get();

            // ارسال ایمیل به ایجاد کننده یادآور
            foreach ($reminders as $reminder) {
                $user = $reminder->user;
                Mail::to($user->email)->send($reminder->title);
            }
        } else {
            // توکن اشتباه است
            abort(401, 'Unauthorized');
        }
    }
}
