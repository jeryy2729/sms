<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'teacher_id',
        'class_id',
    ];

    // relationships
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function schoolClass()
    {
        return $this->belongsTo(School_Classes::class, 'class_id');
    }
}
