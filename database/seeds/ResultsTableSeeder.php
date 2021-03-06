<?php

use App\Models\Academic\Course;
use App\Models\Academic\Result;
use Illuminate\Database\Seeder;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Result::truncate();

        $courses = Course::where([
            'department_id'=> 101,
            'semester_id'=> 101,
        ])->get();

        $results = Result::factory(count($courses))->make();

        $i =0;
        foreach ($results as $result) {

            $result->course_id = $courses[$i]->id;

            $result->save();
            $i++;
        }
    }
}
