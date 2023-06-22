<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'title' => 'Front-end',
                'description' => 'NextJS is a good choice',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Back-end',
                'description' => 'Laravel is a great choice',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Database',
                'description' => 'Mysql. Of course!',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Coder',
                'description' => 'Which language should I use?',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('posts')->insert($data);
    }
}
