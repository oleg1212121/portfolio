<?php

use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Education::create([
            'name' => 'Автомобилестроение',
            'desc' => 'Очная форма обучения. Специальность - техник-технолог.',
            'institute' => 'Минский государственный автомеханический колледж',
            'start' => '2002-09-01',
            'end' => '2006-07-01',
            'user_id' => '1',
        ]);
        \App\Education::create([
            'name' => 'Автомобилестроение',
            'desc' => 'Заочная форма обучения, автотракторный факультет. Специальность - инженер.',
            'institute' => 'Белорусский государственный технический университет',
            'start' => '2006-09-01',
            'end' => '2012-07-01',
            'user_id' => '1',
        ]);
    }
}
