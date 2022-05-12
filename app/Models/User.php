<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'companyId',
        'name',
        'username',
        'email',
        'address',
        'phone',
        'website'
    ];

    public $timestamps = false;

    public function company() {
        return $this->belongsTo(Company::class, 'companyId');
    }

    public function address() {
        return $this->belongsTo(Address::class, 'addressId');
    }

    public static function getUsers() {
        return self::with(['company', 'address'])->get();
    }

}
