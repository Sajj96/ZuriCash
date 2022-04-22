<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_types = [
            'Featured',
            'Normal'
            ];
        foreach ($category_types as $category) {
            DB::table('category_types')->insert([
                'name' => $category
            ]);
        }
    }
}
