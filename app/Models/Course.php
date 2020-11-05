<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function CourseTopics()
    {
    	return $this->hasMany('App\Models\CourseTopic','course_id')->where('course_topics.deleted_at', NULL);
    }
}
