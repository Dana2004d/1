<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Governorate::create(['name' => 'Gaza']);
    Governorate::create(['name' => 'North Gaza']);
    Governorate::create(['name' => 'Khan Younis']);
    Governorate::create(['name' => 'Rafah']);
    }
}
