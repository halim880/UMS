<?php

namespace Database\Factories\Library;

use App\Models\Library\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(5),
            'author'=> $this->faker->name,
            'description'=> $this->faker->sentence(20),
            'type'=>$this->faker->randomElement(['Computer Science', 'Electrical and Electronics', 'Civil']),
            'total_quantity'=> $this->faker->randomElement([25,30,40, 50]),
            'available'=> $this->faker->randomElement([8,19,13]),
            'rack' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]),
            'row'=> $this->faker->randomElement([1,2,3,4,5]),
            'col'=> $this->faker->randomElement([1,2,3,4]),
        ];
    }
}
