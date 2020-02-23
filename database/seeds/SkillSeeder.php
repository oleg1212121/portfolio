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
        ]);
        \App\Skill::create([
            'name' => 'CSS 3',
        ]);
        \App\Skill::create([
            'name' => 'JS',
        ]);
        \App\Skill::create([
            'name' => 'VUE.JS',
        ]);
        \App\Skill::create([
            'name' => 'PHP',
        ]);
        \App\Skill::create([
            'name' => 'LARAVEL',
        ]);
        \App\Skill::create([
            'name' => 'SQL',
        ]);
        \App\Skill::create([
            'name' => 'GIT',
        ]);
    }
}
