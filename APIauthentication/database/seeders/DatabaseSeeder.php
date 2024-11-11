<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash; 
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'chiheb',
            'email' => 'chiheb@yahya.com',
           'password' => Hash::make('chiheb@yahya.com'),
            'phone'=>'92701708',
            'role'=>'user'
         ]);
    }
}
