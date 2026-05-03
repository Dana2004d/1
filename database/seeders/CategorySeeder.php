<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Category::create([
        'name' => 'Food',
        'description' => 'Food Aid',
        'status' => 'active'
    ]);

    Category::create([
        'name' => 'Medical',
        'description' => 'Medical Aid',
        'status' => 'active'
    ]);

    Category::create([
        'name' => 'Financial',
        'description' => 'Money Support',
        'status' => 'active'

    ]);
    Category::create([
    'name' => 'Food',
    'description' => 'Food Aid',
    'status' => 'active',
    'links' => 'https://example.com'
]);
    }
}
