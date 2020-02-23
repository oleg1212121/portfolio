<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Project::create([
            'name' => 'Basheltorg.ru',
            'desc' => 'Система ведения закупок государственных учреждений Республики Башкортостан. Занимался разработкой
             back-end с использованием laravel 5.7/Postgres, front-end с использованием vue.js.',

            'link' => 'http://basheltorg.ru',
            'user_id' => '1',
        ]);
        \App\Project::create([
            'name' => 'Edu360.ru',
            'desc' => 'Информационная система EDU360 - система ведения образовательного процесса средних и высших
             учебных заведений РФ. Занимался в основном back-end разработкой с использованием laravel 5.7/MySQL.',

            'link' => 'http://edu360.ru',
            'user_id' => '1',
        ]);
        \App\Project::create([
            'name' => 'Proton-lab.ru',
            'desc' => 'Корпоративный сайт компании. Занимался переработкой серверной части, с использованием laravel 5.7.',

            'link' => 'http://proton-lab.ru',
            'user_id' => '1',
        ]);
    }
}
