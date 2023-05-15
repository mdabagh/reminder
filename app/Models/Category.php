<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable = ['name_en', 'name_fa', 'id_parent', 'user_id'];

    /**
     * Get the parent category that owns the category.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'id_parent');
    }

    /**
     * Get the subcategories for the category.
     */
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'id_parent');
    }

    /**
     * Get the user that owns the category.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the reminders for the category.
     */
    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
}