<?php

namespace Tests\Feature\Attendance;

use App\Models\Attendance;
use App\Models\Role;
use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TeacherAttendanceTest extends TestCase
{
    use DatabaseMigrations;
    use AttendanceTrait;
    /** @test */
    public function teacher_can_store_attendance(){
        $this->withoutExceptionHandling();

        $response = $this->createAttendance();
        $response->assertOk();


        $attendance = Attendance::first();
        $this->assertEquals(count(Attendance::all()), 1);
        $this->assertEquals(count($attendance->data), 5);

        $this->assertTrue($attendance->data[0]['isPresent'] == 1);
        $this->assertTrue($attendance->data[1]['isPresent'] == 1);
        $this->assertTrue($attendance->data[2]['isPresent'] == 0);
        $this->assertTrue($attendance->data[3]['isPresent'] == 1);
        $this->assertTrue($attendance->data[4]['isPresent'] == 1);
    }

    /** @test */
    public function update_attendance(){
        $this->withoutExceptionHandling();
        Role::create(['name'=>'teacher']);
        $teacher = User::factory()->create();
        $teacher->assignRole('teacher');

        $response = $this->createAttendance();
        $response->assertOk();

        $attendance = Attendance::first();

        $attendance_updated = [
            'course_id'=> 1,
            'teacher_id'=> 1,
            'session'=> '2016-2017',
            'data'=> [
                ['reg'=> 2016331501, 'isPresent'=> true],
                ['reg'=> 2016331502, 'isPresent'=> true],
                ['reg'=> 2016331503, 'isPresent'=> false],
                ['reg'=> 2016331504, 'isPresent'=> false],
                ['reg'=> 2016331505, 'isPresent'=> true],
            ],
        ];

        $response = $this->actingAs($teacher)->post('teacher/attendance/update/'.$attendance->id, $attendance_updated);
        $response->assertOk();
        

        $this->assertEquals(count(Attendance::all()), 1);
        $attendance = Attendance::find($attendance->id);
        $this->assertEquals(count($attendance->data), 5);

        $this->assertTrue($attendance->data[0]['isPresent'] == 1);
        $this->assertTrue($attendance->data[1]['isPresent'] == 1);
        $this->assertTrue($attendance->data[2]['isPresent'] == 0);
        $this->assertTrue($attendance->data[3]['isPresent'] == 0);
        $this->assertFalse($attendance->data[3]['isPresent'] == 1);
        $this->assertTrue($attendance->data[4]['isPresent'] == 1);
    }
}
