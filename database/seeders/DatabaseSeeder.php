<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Content_Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Content_Type::query()->create([
            'type' => "pengumuman",
        ]);
        Content_Type::query()->create([
            'type' => "berita",
        ]);
        // Admin::query()->create([
        //     'name' => "super admin",
        //     'username' => "admsmansara",
        //     'password' => "smansara",
        //     'role' => 1
        // ]);
        User::query()->create([
            'name' => "super admin",
            'username' => "admsmansara",
            'password' => "smansara",
            'role' => 1
        ]);
        
    }
}
