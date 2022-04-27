<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Medical',
            'Family',
            'Community',
            'Business',
            'Disaster',
            'Travel',
            'Wedding',
            'Immigration',
            'Funeral',
            'Education',
            'Other'
            ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
