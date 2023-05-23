<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function store(Request $request)
    {
        // اعتبارسنجی داده‌های ورودی
        $validatedData = $request->validate([
            'name_en' => 'required|max:255',
            'name_fa' => 'required|max:255',
            'id_parent' => 'nullable|integer',
        ]);

        // ذخیره داده‌های ورودی در دیتابیس
        $category = new Category();
        $category->name_en = $validatedData['name_en'];
        $category->name_fa = $validatedData['name_fa'];
        $category->id_parent = $validatedData['id_parent'];
        $category->user_id = auth()->user()->id;

        $category->save();

        // بازگرداندن پاسخ در قالب JSON
        return response()->json(['message' => 'Category has been created successfully', 'category' => $category], 201);
    }
}
