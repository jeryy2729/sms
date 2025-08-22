<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School_Classes extends Model
{
    use HasFactory;
    protected $table = 'school_classes';
    protected $fillable = ['name'];

    public function sections()
     { 
        return $this->hasMany(Section::class, 'class_id'); 
    }
    public function subjects()
{
    return $this->belongsToMany(Subject::class, 'class_subject', 'class_id', 'subject_id');
}

}
