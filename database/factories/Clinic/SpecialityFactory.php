<?php

namespace Database\Factories\Clinic;

use App\Models\Clinic\Speciality;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Speciality::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->unique()->randomElement(['Neurologist','Internist','Orthopedist']);



        $Neu = 'a specialist in the anatomy, functions, and organic disorders of nerves and the nervous system' ;
        $Int = 'a medical specialist in internal diseases' ;
        $Ort = 'who corrects congenital or functional abnormalities of the bones with surgery, casting, and bracing' ;

        switch ($name) {
            case 'Neurologist':
                $disc = $Neu;
                $sym = 'NEU';
                break;
            case 'Internist':
                $disc = $Int;
                $sym = 'INT';
                break;
            case 'Orthopedist':
                $disc = $Ort;
                $sym = 'ORT';
                break;


        }
        return [
            'name'=>$name,
            'discription'=>$disc,
            'sympol'=>$sym,
        ];
    }
}
