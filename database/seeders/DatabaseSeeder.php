<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\image;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Comment::factory()->count(4)->state(new Sequence(
        //     fn (Sequence $sequence) => [
        //         "user_id" => $sequence->index + 1,
        //         "post_id" => 1
        //     ]
        // ))->create();
        // User::factory()->count(10)->create();
        // image::factory()->count(10)->state(new Sequence(
        //     fn (Sequence $sequence) => ["user_id" => $sequence->index + 1]
        // ))->create();
        // Post::factory()->count(10)->state(new Sequence(fn (Sequence $sequence) => [
        //     "user_id" => $sequence->index + 1
        // ]))->create();
    }
}
