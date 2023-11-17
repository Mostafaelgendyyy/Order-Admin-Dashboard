<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phonenumber',
        'address',
        'nationalid'
    ];
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }
}
