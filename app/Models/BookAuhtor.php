<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Models\Authors;

class BookAuhtor extends Model
{
  protected $table = 'books_author';

  protected $fillable = [
      'book_id',
      'author_id',
      'user_id'
  ];

  public function getUser()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
  public function getAuthor()
  {
    return $this->belongsTo(Authors::class, 'author_id');
  }

}
