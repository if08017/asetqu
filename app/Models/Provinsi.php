<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
  protected $table = 'provinsi';
  protected $fillable = ['name','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
}
