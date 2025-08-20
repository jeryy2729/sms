<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = ['student_id', 'class_id', 'section_id', 'session', 'status'];

    // Relationships (manual since no foreign keys)
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function schoolClass()   // ✅ use this name
    {
        return $this->belongsTo(School_Classes::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
