<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  protected $table = 'status';
  protected $fillable = ['name','updated_at'];
  protected $quarded = ['created_at'];
  public $timestamps = true;
}
