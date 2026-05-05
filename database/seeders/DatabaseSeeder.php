<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Visitor;
use App\Models\Governorate;
use App\Models\Location;
use App\Models\Category;
use App\Models\AidRequest;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ======================
        // Governorates + Locations
        // ======================
        $locationsData = [
            'شمال غزة' => ['جباليا', 'بيت لاهيا', 'بيت حانون'],
            'غزة' => ['غزة', 'الرمال', 'الشجاعية'],
            'دير البلح' => ['دير البلح', 'النصيرات'],
            'خانيونس' => ['خانيونس', 'عبسان'],
            'رفح' => ['رفح', 'تل السلطان'],
        ];

        foreach ($locationsData as $govName => $locations) {
            $gov = Governorate::create(['name' => $govName]);

            foreach ($locations as $loc) {
                Location::create([
                    'name' => $loc,
                    'governorate_id' => $gov->id,
                ]);
            }
        }

        // ======================
        // Categories
        // ======================
        $food = Category::create([
            'name' => 'مساعدة غذائية',
            'description' => 'سلال غذائية',
            'status' => 'active',
            'links' => null,
        ]);

        $medical = Category::create([
            'name' => 'مساعدة طبية',
            'description' => 'خدمات طبية',
            'status' => 'active',
            'links' => null,
        ]);

        $financial = Category::create([
            'name' => 'دعم مالي',
            'description' => 'مساعدات نقدية',
            'status' => 'active',
            'links' => null,
        ]);

        $shelter = Category::create([
            'name' => 'سكن ومأوى',
            'description' => 'خيام ومأوى',
            'status' => 'active',
            'links' => null,
        ]);

        $children = Category::create([
            'name' => 'مستلزمات أطفال',
            'description' => 'حليب وحفاظات',
            'status' => 'active',
            'links' => null,
        ]);

        // ======================
        // Admin + User
        // ======================
        $admin = Admin::create([
            'email' => 'admin@test.com',
            'password' => Hash::make('123456'),
        ]);

        $admin->user()->create([
            'first_name' => 'Dana',
            'last_name' => 'Admin',
            'mobile' => '0591111111',
            'address' => 'Gaza',
            'date' => now(),
            'gender' => 'female',
            'status' => 'active',
            'location_id' => 1,
        ]);

        // ======================
        // Visitor + User
        // ======================
        $visitor = Visitor::create([
            'email' => 'visitor@test.com',
            'password' => Hash::make('123456'),
        ]);

        $visitor->user()->create([
            'first_name' => 'Test',
            'last_name' => 'Visitor',
            'mobile' => '0599999999',
            'address' => 'Gaza',
            'date' => now(),
            'gender' => 'male',
            'status' => 'active',
            'location_id' => 1,
        ]);

        // ======================
        // Aid Requests
        // ======================
        AidRequest::create([
            'name' => 'WFP',
            'phone' => '0599000001',
            'company_name' => 'WFP',
            'aid_type' => 'food',
            'link' => 'https://wfp.org',
            'notes' => 'Food support',
            'category_id' => $food->id,
            'status' => 'approved',
        ]);

        AidRequest::create([
            'name' => 'UNRWA',
            'phone' => '0599000002',
            'company_name' => 'UNRWA',
            'aid_type' => 'food',
            'link' => 'https://unrwa.org',
            'notes' => 'Food aid',
            'category_id' => $food->id,
            'status' => 'approved',
        ]);

        // ======================
        // Comment
        // ======================
        Comment::create([
            'comment_text' => 'ممتاز',
            'visitor_id' => $visitor->id,
        ]);

        // ======================
        // Contact
        // ======================
        Contact::create([
            'message_type' => 'question',
            'message' => 'كيف أضيف طلب؟',
            'visitor_id' => $visitor->id,
        ]);
    }
}
