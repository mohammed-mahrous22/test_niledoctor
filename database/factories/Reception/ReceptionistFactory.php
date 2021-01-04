<?php

namespace Database\Factories\Reception;

use App\Models\Reception\Receptionist;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceptionistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receptionist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => 'receptionist',
            //'name' => $this->faker->name,
            'phone_number'=> $this->faker->e164PhoneNumber,
        ];
    }
}
