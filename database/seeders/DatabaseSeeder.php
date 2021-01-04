<?php

namespace Database\Seeders;

use App\Models\Admin\Clinic;
use App\Models\Adminstration\Admin;
use App\Models\Clinic\Doctor;
use App\Models\Reception\Appointment;
use App\Models\Reception\Receptionist;
use App\Models\User;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\Constraint\Count;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([SpecialitySeeder::class,]);


        $admin = Admin::factory()->create();
        Clinic::factory()
        ->count(100)
        ->for($admin)
        ->create();




        // for ($i=0; $i <2000 ; $i++) {

        //     $user = User::factory()
        //                 ->create();

        //     $Clinic = Clinic::find($user->Clinic_id);

            for ($i=0; $i <2 ; $i++) {
                $user = User::factory()->create();

                $Clinic = Clinic::find($user->Clinic_id);

            if ($user->type == 'doctor') {
               $doctor = Doctor::factory()
                    ->for($Clinic,'clinic')
                    ->for($user,'user')
                    ->create();


            }

            if ($user->type == 'receptionist') {
                Receptionist::factory()
                    ->for($Clinic,'clinic')
                    ->for($user,'user')
                    ->create();
            }
        }
        Appointment::factory()
                    ->count(30)
                    ->for($doctor,'doctor')
                    ->create();

        // }




        //User::factory()->times(1)->create();


    }
}
