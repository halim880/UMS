<?php

namespace Database\Factories\Academic;

use App\Models\Academic\Result;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Result::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id'=> 2016331509,
            'department_id'=> 101,
            'semester_id'=> 106,
            'point'=> 3.34,
            'grade'=> 'A-',
            'status'=> 'passed'
        ];
    }
}
