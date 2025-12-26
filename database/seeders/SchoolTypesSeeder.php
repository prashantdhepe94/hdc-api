<?php

namespace Database\Seeders;

use App\Models\SchoolType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolType::create([
            'name' => 'ERA Kids, A Play School',
            'slug' => 'era-kids'
        ]);

        SchoolType::create([
            'name' => 'ERA International',
            'slug' => 'era-international'
        ]);
    }
}
