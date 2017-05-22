<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subkelompok extends Model
{
  protected $table = 'sub_kelompok_barang';
  protected $fillable = ['code','name','status','kelompok_barang_id','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
