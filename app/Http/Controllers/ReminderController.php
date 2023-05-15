<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function index()
    {
        // $user_id = auth()->id();
        $user_id = 1;
        $reminders = Reminder::where('user_id', $user_id)->get();
        $categories = Category::all();
        $reminders = Reminder::orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        return view('reminder.index', compact('reminders', 'categories' ,'reminders'));
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
}
