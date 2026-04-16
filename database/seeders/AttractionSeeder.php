<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attraction;

class AttractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   
        for ($i = 0; $i < 0; $i++) {
            Attraction::create([
                        'name' => fake()->company(),
                        'description' => fake()->sentence(),
                   ]);
             }
         }
     }