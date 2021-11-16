<?php

namespace App\Http\Resources;

use App\Models\Student;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseRegistrationFormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'student'=> new StudentResource($this),
            'current_courses'=> CourseResource::collection($this->courses),
            'drop_courses'=> CourseResource::collection($this->dropCourses),
        ];
    }
}
