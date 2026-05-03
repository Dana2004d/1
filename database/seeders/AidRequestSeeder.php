<?php

namespace Database\Seeders;

use App\Models\AidRequest;
use Illuminate\Database\Seeder;

class AidRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AidRequest::create([
        'name' => 'Family Needs Food',
        'phone' => '0591234567',
        'company_name' => 'NGO Gaza',
        'aid_type' => 'food',
        'category_id' => 1,
        'notes' => 'Urgent case'
    ]);

    AidRequest::create([
        'name' => 'Medical Help',
        'phone' => '0567777777',
        'company_name' => 'Red Crescent',
        'aid_type' => 'medical',
        'category_id' => 2,
        'notes' => 'Needs medicine'
    ]);
    }
}
