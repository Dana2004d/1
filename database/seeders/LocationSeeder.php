<?php

namespace Database\Seeders;

use App\Models\Location;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Location::create([
        'name' => 'Al Remal',
        'governorate_id' => 1
    ]);

    Location::create([
        'name' => 'Jabalia',
        'governorate_id' => 2
    ]);

    Location::create([
        'name' => 'Bani Suhaila',
        'governorate_id' => 3
    ]);
    }}
