<?php

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_student')->truncate();
        $students = Student::all();
        $courses = Course::where(['department_id'=> 101, 'semester_id'=> 106])->get();
        foreach ($courses as $c) {
            foreach ($students as $s) {
                DB::table('course_student')->insert([
                    'course_id'=> intval($c->id),
                    'student_id'=> intval($s->id)
                ]);
            }
        }
    }
}
