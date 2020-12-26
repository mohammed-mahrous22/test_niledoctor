<?php

namespace Database\Seeders;

use App\Models\Admin\Clinic;
use App\Models\Adminstration\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $admin = Admin::factory()->create();




        Clinic::factory()
            ->count(500)
            ->for($admin)
            ->create();

        $this->call([SpecialitySeeder::class,
        ]);

        //User::factory()->times(1)->create();


    }
}
