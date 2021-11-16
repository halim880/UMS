<?php

use App\Models\Academic\Course;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherTableSeeder extends Seeder
{
    public function run()
    {
        $courses = Course::where(['department_id'=> 101, 'semester_id'=> 106])->get();

        $teachers = Teacher::all();

        foreach ($teachers as $teacher) {
            if ($teacher->user) {
                $teacher->user->roles()->detach();
                $teacher->user->delete();
            }
        }

        Teacher::truncate();
        DB::table('course_teacher')->truncate();

        $images = glob(public_path('image/teacher/*'));
        foreach($images as $image){
            if (file_exists($image)) {
                    unlink($image);
            }
        }


        $teachers = [
            [
                'name'=>'Teacher',
                'email'=>'teacher@gmail.com',
                'password' => Hash::make('password'),
                'title'=>'Profesor',
                'department_id'=>'102',
                'status'=> 'parmanent',
            ],
            [
                'name'=>'Mousumi Aktar',
                'email'=>'mousumi@gmail.com',
                'password' => Hash::make('password'),
                'title'=>'Assistant Profesor',
                'department_id'=>'101',
                'status'=> 'parmanent',
            ],
            [
                'name'=>'Proma heig',
                'email'=>'proma@gmail.com',
                'password' => Hash::make('password'),
                'title'=>'Lecturer',
                'department_id'=>'101',
                'status'=> 'Guest',
            ],
        ];

        
        $role = Role::select('id')->where('name', 'teacher')->get()->first();

        foreach ($teachers as $t) {
            $user = User::create([
                'name' => $t['name'],
                'email' => $t['email'],
                'password' => $t['password'],
            ]);

            $user->roles()->attach($role);
            $teacher = Teacher::factory()->make();
            $teacher->title = $t['title'];
            $teacher->department_id = $t['department_id'];
            $user->teacher()->save($teacher);
            
            $teacher->courses()->sync($courses);
        }
    }
}
