<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;


class Authors extends Model
{
  use SoftDeletes;

  protected $table = 'authors';

  protected $fillable = [
      'name',
      'lastname',
      'year_birth',
      'year_died',
      'user_id'

  ];

  public function getUser()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
