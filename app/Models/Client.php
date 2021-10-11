<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;


class Client extends Model
{
    use SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'lastname',
        'year_birth',
        'year_died',
        'phone',
        'address',
        'email',
        'user_id'
    ];

    public function getUser()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

}
