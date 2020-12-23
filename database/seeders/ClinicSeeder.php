<?php

namespace Database\Seeders;

use App\Models\Admin\Clinic;
use App\Models\Adminstration\Admin;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = AdminSeeder::$admin;

         Clinic::factory()
            ->count(1)
            ->for($admin)
            ->create();
    }
}
