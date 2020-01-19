<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Service::create([
            'name' => 'Back-end',
            'desc' => 'Разработка серверной части приложений.',

            'image' => 'm',
            'user_id' => '1',
        ]);
        \App\Service::create([
            'name' => 'Database',
            'desc' => 'Проектирование структуры баз данных приложений.',

            'image' => 'n',
            'user_id' => '1',
        ]);
        \App\Service::create([
            'name' => 'UI/UX',
            'desc' => 'Продумывание функционала приложений для удобства использования.',

            'image' => 'g',
            'user_id' => '1',
        ]);
        \App\Service::create([
            'name' => 'Management',
            'desc' => 'Создание функционала для управления приложением/автоматизации процессов.',

            'image' => 'c',
            'user_id' => '1',
        ]);
        \App\Service::create([
            'name' => 'SPA',
            'desc' => 'Разработка single page application.',

            'image' => 'd',
            'user_id' => '1',
        ]);
        \App\Service::create([
            'name' => 'Front-end',
            'desc' => 'Разработка клиентской части приложений.',

            'image' => 'U',
            'user_id' => '1',
        ]);
    }
}
