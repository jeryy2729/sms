<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street',
        'city',
        'state',
        'postal_code',
        'country'
    ];

    public function addressable()
    {
        return $this->morphTo();
    }
}
