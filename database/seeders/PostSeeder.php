<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post; // Mengimpor model Post

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	Post::create([
		'title' => 'First Post for testing',
		'content' => 'Testing first post']);
    }
}