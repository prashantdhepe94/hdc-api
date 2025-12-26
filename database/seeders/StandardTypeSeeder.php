<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StandardType;

class StandardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $standards = [
            ['std' => 'Nursery', 'section_name' => 'Blue'],
            ['std' => 'Nursery', 'section_name' => 'Green'],
            ['std' => 'Jr.Kg', 'section_name' => 'Orange'],
            ['std' => 'Jr.Kg', 'section_name' => 'Yellow'],
            ['std' => 'Jr.Kg', 'section_name' => 'Red'],
            ['std' => 'Sr.Kg', 'section_name' => 'Red'],
            ['std' => 'Sr.Kg', 'section_name' => 'Green'],
            ['std' => 'Sr.Kg', 'section_name' => 'Yellow'],
            ['std' => '1st', 'section_name' => 'Jasmin'],
            ['std' => '1st', 'section_name' => 'Lily'],
            ['std' => '2nd', 'section_name' => 'Daisy'],
            ['std' => '2nd', 'section_name' => 'Rose'],
            ['std' => '3rd', 'section_name' => 'Jupiter'],
            ['std' => '3rd', 'section_name' => 'Pluto'],
            ['std' => '4th', 'section_name' => 'null'],
            ['std' => '5th', 'section_name' => 'null'],
            ['std' => '6th', 'section_name' => 'null'],
            ['std' => '7th', 'section_name' => 'null'],
        ];

        foreach ($standards as $standard) {
            StandardType::create([
                'std' => $standard['std'],
                'section_name' => $standard['section_name']
            ]);
        }
    }
}
