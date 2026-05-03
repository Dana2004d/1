<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
       Comment::create([
    'visitor_id' => 1,
    'comment_text' => 'Please help urgently',
]);
    }
}
