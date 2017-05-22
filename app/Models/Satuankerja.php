<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satuankerja extends Model
{
  protected $table = 'satuan_kerja';
  protected $fillable = ['code','name','unit_kerja_id','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
}
