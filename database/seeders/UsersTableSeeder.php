<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Unknown Author',
                    'email' => 'unknown_author@g.g',
                    'password' => bcrypt(Str::random(length: 6)),
                ],
                [
                    'name' => 'John Doe',
                    'email' => 'john_doe@g.g',
                    'password' => bcrypt(value: 123456),
                ],
            ]
        );
    }
}
