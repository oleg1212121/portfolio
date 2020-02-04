<?php

use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Type::firstOrCreate(['name' => 'Погода']);
        \App\Models\Type::firstOrCreate(['name' => 'Главные новости дня']);
        \App\Models\Type::firstOrCreate(['name' => 'Обычная новость']);
        \App\Models\Type::firstOrCreate(['name' => 'Итоги дня']);
    }
}
