<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'first_name' => 'Александр',
            'middle_name' => 'Юрьевич',
            'last_name' => 'Навоша',
            'email' => 'blr.ymka@tut.by',
            'skype' => 'aleksandr.12131',
            'linkedin' => 'https://www.linkedin.com/in/aleksandr-nav-634303182/',
            'cv' => 'https://jobs.tut.by/resume/877438abff017c65090039ed1f66494a314c47',
            'password' => '$2y$10$jDxggZSk9nhZQalwkTnqFusHNM.Z1Uifdt.sZuxVXuczllT8Kdk32',
        ]);
    }
}
