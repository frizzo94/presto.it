<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    *
    * @return void
    */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            
            Storage::deleteDirectory('public/announcements');
            
            User::create([
                'name' => 'mario',
                'email' => 'mario@example.com',
                'password' => Hash::make('mariomario'),
            ]);
            
            \App\Models\User::create([
                'name' => 'revisor',
                'email' => 'revisor@example.com',
                'password' => Hash::make('revisorrevisor'),
                
                'is_revisor'=> true,
            ]);
            
        }
    }
    