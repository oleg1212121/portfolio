<?php

use Illuminate\Database\Seeder;

class NeuralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\NeuralInput::firstOrCreate(
            ['name' => 'salary'],
            ['weight' => rand(0,100)/100]);
        \App\Models\NeuralInput::firstOrCreate(
            ['name' => 'medicine'],
            ['weight' => rand(0,100)/100]);
        \App\Models\NeuralInput::firstOrCreate(
            ['name' => 'vacation'],
            ['weight' => rand(0,100)/100]);
        \App\Models\NeuralInput::firstOrCreate(
            ['name' => 'work-form'],
            ['weight' => rand(0,100)/100]);
        \App\Models\NeuralInput::firstOrCreate(
            ['name' => 'sport'],
            ['weight' => rand(0,100)/100]);
        \App\Models\NeuralInput::firstOrCreate(
            ['name' => 'food'],
            ['weight' => rand(0,100)/100]);
    }
}
