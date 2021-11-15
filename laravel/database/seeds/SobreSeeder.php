<?php

use Illuminate\Database\Seeder;

class SobreSeeder extends Seeder
{
    public function run()
    {
        DB::table('sobre')->insert([
            'imagem_1' => '',
            'texto_1' => '',
            'frase' => '',
            'imagem_2' => '',
            'texto_2' => '',
            'imagem_3' => '',
            'texto_3' => '',
            'imagem_4' => '',
            'texto_4' => '',
        ]);
    }
}
