<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
      for ($i = 0; $i <= 0; $i++){
      User::create([
                'name' => fake("id_ID")->name(),
                'email' => fake("id_ID")->unique()->safeEmail(),
                'password' => bcrypt('password')
            
            ]);
        }
      
     }
}
