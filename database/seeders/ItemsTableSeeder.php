<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();
        $items = [
            [
                'owner_id' => 2,
                'name' => 'breakfast',
                'done' => false
            ],
            [
                'owner_id' => 2,
                'name' => 'lunch',
                'done' => false
            ],
            [
                'owner_id' => 2,
                'name' => 'dinner',
                'done' => false
            ]
        ];
        DB::table('items')->insert($items);
    }
}
