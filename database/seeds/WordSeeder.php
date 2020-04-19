<?php

use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = base_path().'/public/data.txt';
        $text = fopen($path, 'r');

        if ($text) {
            while (($buffer = fgets($text, 4096)) !== false) {
                $data = explode('--', str_replace(PHP_EOL, '', $buffer));
                \App\Models\Word::create([
                    'word' => trim($data[0]),
                    'translate' => trim($data[1]) ?? '',
                    'rating' => trim($data[2])
                ]);
            }
            fclose($text);
        }


    }
}
