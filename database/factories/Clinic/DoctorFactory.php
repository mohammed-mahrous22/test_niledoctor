<?php

namespace Database\Factories\Clinic;

use App\Models\Clinic\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->name,
            // 'phone_number'=> $this->faker->e164PhoneNumber,
            // 'speciality_id' => $this->faker->randomElement(['1','2','3']),
            'name' =>'mohamed',
            'phone_number'=>'01096842556',
            'speciality_id' => $this->faker->randomElement(['1','2','3']),
        ];
    }
}
