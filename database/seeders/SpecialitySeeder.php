<?php

namespace Database\Seeders;

use App\Models\Clinic\Speciality;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speciality::factory()
        ->count(3)
        ->create();
    }
}
