<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Admin extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'password',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
