<?php

namespace Database\Seeders;

use App\Models\StaffType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StaffType::create([
            'name' => 'Teachers'
        ]);
        StaffType::create([
            'name' => 'Administrator'
        ]);
        StaffType::create([
            'name' => 'Clerk'
        ]);
        StaffType::create([
            'name' => 'Peon'
        ]);
    }
}
