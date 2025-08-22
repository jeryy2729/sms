<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'teacher_id',
'class_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
public function classes()
{
    return $this->belongsToMany(School_Classes::class, 'class_subject', 'subject_id', 'class_id');
}

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
