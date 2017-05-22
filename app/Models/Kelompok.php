<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
  protected $table = 'kelompok_barang';
  protected $fillable = ['code','name','status','bidang_barang_id','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
