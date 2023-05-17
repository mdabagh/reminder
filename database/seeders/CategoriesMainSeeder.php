<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesMainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories_mains')->insert([
            ['name_en' => 'Birthday', 'name_fa' => 'تولد'],
            ['name_en' => 'Meeting', 'name_fa' => 'ملاقات'],
            ['name_en' => 'Holidays', 'name_fa' => 'تعطیلات'],
            ['name_en' => 'Events', 'name_fa' => 'رویدادها'],
            ['name_en' => 'Educational', 'name_fa' => 'آموزشی'],
            ['name_en' => 'Work', 'name_fa' => 'کار'],
            ['name_en' => 'Daily Tasks', 'name_fa' => 'وظایف روزانه'],
            ['name_en' => 'Miscellaneous', 'name_fa' => 'متفرقه']
        ]);
    }
}
