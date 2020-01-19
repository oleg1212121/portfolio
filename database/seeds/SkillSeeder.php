<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Skill::create([
            'name' => 'HTML 5',
            'performance' => 65,
            'user_id' => '1',
        ]);
        \App\Skill::create([
            'name' => 'CSS 3',
            'performance' => 70,
            'user_id' => '1',
        ]);
        \App\Skill::create([
            'name' => 'JS',
            'performance' => 65,
            'user_id' => '1',
        ]);
        \App\Skill::create([
            'name' => 'VUE.JS',
            'performance' => 58,
            'user_id' => '1',
        ]);
        \App\Skill::create([
            'name' => 'PHP',
            'performance' => 65,
            'user_id' => '1',
        ]);
        \App\Skill::create([
            'name' => 'LARAVEL',
            'performance' => 73,
            'user_id' => '1',
        ]);
        \App\Skill::create([
            'name' => 'SQL',
            'performance' => 65,
            'user_id' => '1',
        ]);
        \App\Skill::create([
            'name' => 'GIT',
            'performance' => 80,
            'user_id' => '1',
        ]);
    }
}
