<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statusmutasi extends Model
{
  protected $table = 'status_mutasi';
  protected $fillable = ['name','updated_at'];
  protected $quarded = ['created_at'];
  public $timestamps = true;
}
