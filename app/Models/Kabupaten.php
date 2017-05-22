<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
  protected $table = 'kabupaten';
  protected $fillable = ['code','name','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
}
