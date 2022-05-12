<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = [
        'street',
        'suite',
        'city',
        'zipcode',
        'lat',
        'lng'
    ];

    public $timestamps = false;

    public function fullAddress() {
        return "{$this->street} {$this->suite}, {$this->city}, {$this->zipcode}";
    }
}
