<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    const IMAGE_FROM = "images/persons";
    const IMAGE_TO = "image/teacher";

    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->file(storage_path(self::IMAGE_FROM), public_path(self::IMAGE_TO), false),
            'department_id'=> 101,
            'teacher_type' => 'permanent',
        ];
    }
}
