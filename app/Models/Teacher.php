<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','employee_id','qualification','department','join_date','phone_no'];

    public function user() { return $this->belongsTo(User::class, 'user_id'); }
        public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

}
