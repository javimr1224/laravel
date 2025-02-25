<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = 
            [
                [
                'title' => 'Titulo 1',
                'content' => 'Texto de mi primer post',
                'color' => 'rojo',
                'phone' => '35555635',
                'author' => 'jlopez',
                'author_age' => 31
                ],
                [
                'title' => 'Titulo 2',
                'content' => 'Texto de mi segundo post',
                'color' => 'azul',
                'phone' => '639543268',
                'author' => 'jmarrod',
                'author_age' => 20
                ],
                [
                    'title' => 'Titulo 3',
                    'content' => 'Texto de mi tercer post',
                    'color' => 'amarillo',
                    'phone' => '630545269',
                    'author' => 'albi',
                    'author_age' => 19
                    ],
            ];

        DB::table('posts')->insert($data);
    }
}
