<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data = [
            [
                'name' => 'Nguyen',
                'username' => 'nguyen01',
                'password' => 'nguyenpassword01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Quang',
                'username' => 'quang02',
                'password' => 'quangpassword02',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('users')->insert($data);
    }
}
