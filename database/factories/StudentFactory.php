<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    const IMAGE_FROM = "images/persons";
    const IMAGE_TO = "image/student";

    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->file(storage_path(self::IMAGE_FROM), public_path(self::IMAGE_TO), false),
            'father_name'=> $this->faker->firstNameMale .' '. $this->faker->lastName,
            'mother_name'=> $this->faker->firstNameFemale. ' '. $this->faker->lastName,
            'phone'=> '01'.rand(6,9).rand(10000000, 99999999),
            'session'=> '2016-2017',
            'current_address'=> $this->faker->address,
            'permanent_address'=> $this->faker->address,
        ];
    }
}
