<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = [
            [
                'name' => 'Terry',
                'password' => Hash::make('terry'),
                'email' => 'example@example.com'
            ]
        ];
        DB::table('users')->insert($users);
    }
}
