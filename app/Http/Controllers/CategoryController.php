<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        // اعتبارسنجی داده‌های فرم
        $validatedData = $request->validate([
            'name_en' => 'required|max:255',
            'name_fa' => 'required|max:255',
            'id_parent' => 'nullable|integer',
        ]);
    
        // ذخیره داده‌های فرم در دیتابیس
        $category = new Category();
        $category->name_en = $validatedData['name_en'];
        $category->name_fa = $validatedData['name_fa'];
        $category->id_parent = $validatedData['id_parent'];
        // $category->user_id = auth()->user()->id; // با توجه به اینکه هر کاربر می‌تواند یک دستبندی شخصی داشته باشد، می‌توانید user_id را از شی Auth دریافت کنید.
        $category->user_id = 1;

        $category->save();
    
        // بازگشت به صفحه قبلی با پیام موفقیت‌آمیز بودن ذخیره‌سازی
        return back()->with('success', 'Category has been created successfully.');
    }
}
