<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
  protected $table = 'kondisi_barang';
  protected $fillable = ['name','updated_at'];
  protected $quarded = ['created_at'];
  public $timestamps = true;
}
