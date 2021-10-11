<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Models\BookAuhtor;

class Book extends Model
{
  use SoftDeletes;

  protected $table = 'books';

  protected $fillable = [
      'title',
      'editor',
      'date_publish',
      'price_min',
      'price',
      'description',
      'average',
      'user_id'
  ];

  public function getUser()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function authors()
  {
      return $this->hasMany(BookAuhtor::class);
  }
}
