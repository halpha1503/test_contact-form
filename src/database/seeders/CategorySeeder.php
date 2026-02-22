<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['id' => 1, 'content' => '商品の交換について', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'content' => '配送について', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'content' => 'お支払いについて', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'content' => 'その他', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
