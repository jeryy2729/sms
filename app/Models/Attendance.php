<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // protected $fillable = [
    //     'student_id', 'class_id', 'section_id', 'date', 'status'
    // ];
    protected $fillable = ['student_id', 'class_id', 'section_id', 'date', 'status'];



    // relationships (without foreign key constraints)
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    

    public function class()
    {
        return $this->belongsTo(School_Classes::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
