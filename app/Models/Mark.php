<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
        'section_id',
        'subject_id',
        'marks_obtained',
        'total_marks',
        'exam_type',
        'exam_date',
    ];

    // Relationships (optional – no foreign keys required, but helpful for access)

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
