<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoriesMain;
use App\Models\Category;
use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $reminders = Reminder::where('user_id', $user_id)->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        $categories = Category::with('parent')->where('user_id', $user_id)->get();
        $categoriesMine = CategoriesMain::all();
        return response()->json(['reminders' => $reminders, 'categories' => $categories, 'categoriesMine' => $categoriesMine]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

        $reminder = Reminder::create($validatedData);

        return response()->json(['reminder' => $reminder], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reminder = Reminder::find($id);

        if (!$reminder) {
            return response()->json(['message' => 'Reminder not found'], 404);
        }

        $categories = Category::all();

        return response()->json(['reminder' => $reminder,    'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reminder = Reminder::find($id);

        if (!$reminder) {
            return response()->json(['message' => 'Reminder not found'], 404);
        }

        $reminder->update($request->all());

        return response()->json(['reminder' => $reminder, 'message' => 'Reminder updated successfully']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reminder = Reminder::find($id);
    
        if (!$reminder) {
            return response()->json(['message' => 'Reminder not found'], 404);
        }
    
        $reminder->delete();
    
        return response()->json(['message' => 'Reminder deleted successfully']);
    }
}
