<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
  protected $table = 'ruangan';
  protected $fillable = ['name','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
}
