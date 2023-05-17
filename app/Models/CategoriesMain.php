<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesMain extends Model
{
    use HasFactory;

    protected $table = 'categories_mains';

    protected $fillable = [
        'name_en',
        'name_fa',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'id_categores_Main');
    }
}