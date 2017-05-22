<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
  protected $table = 'jabatan';
  protected $fillable = ['nip','name','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
}
