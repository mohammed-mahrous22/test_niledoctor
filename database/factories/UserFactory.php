<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'username'=>$this->faker->unique()->userName,
            'username'=>$this->faker->unique()->randomElement(['xxspider4','xxspider5']),
            // 'email' => $this->faker->unique()->safeEmail,
            'email' =>$this->faker->unique()->randomElement(['xxspider44@gmail.com','xxspider45@gmail.com']),
            // 'type'=>$this->faker->randomElement(['doctor','receptionist']),
            'type'=>$this->faker->unique()->randomElement(['doctor','receptionist']),
            'Clinic_id'=>'1',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
