<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
//use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
      User::create([
    'first_name' => 'Dana',
    'last_name' => 'Admin',
    'mobile' => '0591111111',
    'address' => 'Gaza',
    'date' => now(),
    'gender' => 'female',
    'status' => 'active',

    // 🔥 هذا هو الحل
    'location_id' => 1,

   // 'actor_id' => $admin->id,
    'actor_type' => Admin::class,
]);
    }
}
