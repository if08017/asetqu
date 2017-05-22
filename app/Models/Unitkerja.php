<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unitkerja extends Model
{
  protected $table = 'unit_kerja';
  protected $fillable = ['code','name','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
}
