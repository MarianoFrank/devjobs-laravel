<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category' => 'Backend Developer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Front end Developer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Mobile Developer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Techlead',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'UX / UI Design',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Software Architecture',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Devops',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Data Scientist',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Machine Learning Engineer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Cybersecurity Specialist',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
        
    }
}
