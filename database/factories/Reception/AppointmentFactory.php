<?php

namespace Database\Factories\Reception;

use App\Models\Reception\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_name'=>$this->faker->name,
            'patient_age'=>$this->faker->numberBetween('5','60'),
            'patient_address'=>$this->faker->address,
            'patient_phone'=>$this->faker->e164PhoneNumber,
            'price'=>'80',
            'date'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'time'=>$this->faker->time($format = 'H:i', $max = 'now'),
        ];
    }
}
