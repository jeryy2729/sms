<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'class_id',
        'section_id',
        'roll_no',
        'dob',
        'gender',
        'phone_no',
    
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function schoolClass() {
        return $this->belongsTo(School_Classes::class, 'class_id');
    }

    public function section() {
        return $this->belongsTo(Section::class, 'section_id');
    }
        public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

}
