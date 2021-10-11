<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'lastname',
        'year_birth',
        'year_died',
        'phone',
        'address',
        'email'

    ];

}
