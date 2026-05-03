<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Hash;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Visitor::create([
    'email' => 'visitor@test.com',
    'password' => bcrypt('123456'),
]);
    }
}
