<?php

namespace App\Http\Controllers;

use App\Models\CategoriesMain;
use App\Models\Category;
use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $reminders = Reminder::where('user_id', $user_id)->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        $categories = Category::with('parent')->where('user_id', $user_id)->get();
        $categoriesMine = CategoriesMain::all();
        return view('reminder.index', compact('reminders', 'categories' ,'reminders' , 'categoriesMine'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $reminder = new Reminder();
        $reminder->title = $validatedData['title'];
        $reminder->category_id = $validatedData['category_id'];
        $reminder->date = $validatedData['date'];
        $reminder->time = $validatedData['time'];
        $user_id = 1;
        $reminder->user_id = $user_id;

        // $reminder->user_id = auth()->id();
        $reminder->save();

        return redirect()->route('reminder.index')->with('success', 'Reminder created successfully.');
    }

    public function edit($reminder)
    {
        $reminder = Reminder::findOrFail($reminder);
        $categories = Category::all();
        return view('reminder.edit', compact('reminder' , 'categories' ));
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
}
