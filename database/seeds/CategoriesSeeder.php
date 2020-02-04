<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::firstOrCreate(['name' => 'Наука']);
        \App\Models\Category::firstOrCreate(['name' => 'Спорт']);
        \App\Models\Category::firstOrCreate(['name' => 'Город']);
        \App\Models\Category::firstOrCreate(['name' => 'Мода']);
        \App\Models\Category::firstOrCreate(['name' => 'Погода']);
        \App\Models\Category::firstOrCreate(['name' => 'Итоги дня']);

    }
}
