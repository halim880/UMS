<?php

namespace Tests\Feature\Attendance;

use App\Models\Academic\Course;
use App\Models\Teacher;

trait AttendanceTrait {
    public function createAttendance(){
        $teacher = Teacher::factory()->create();
        $attendance = [
            'course_id'=> 1,
            'teacher_id'=> 1,
            'session'=> '2016-2017',
            'data'=> [
                ['reg'=> 2016331501, 'isPresent'=> true],
                ['reg'=> 2016331502, 'isPresent'=> true],
                ['reg'=> 2016331503, 'isPresent'=> false],
                ['reg'=> 2016331504, 'isPresent'=> true],
                ['reg'=> 2016331505, 'isPresent'=> true],
            ],
        ];
        return $this->actingAs($teacher->user)->post('teacher/attendance/store', $attendance);
    }
} 