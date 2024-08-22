<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory(10)->create(); // fa tab3an lazem yekon fe factory 2bl ma tktb el line dh 
        // bt7aded feh eh el haytktb (values) fen (columns) 
    }
}
