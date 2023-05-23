<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
