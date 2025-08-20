<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['class_id','name'];

    public function schoolClass() { return $this->belongsTo(School_Classes::class, 'class_id'); }
}
