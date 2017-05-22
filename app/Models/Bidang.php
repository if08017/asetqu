<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
  protected $table = 'bidang_barang';
  protected $fillable = ['code','name','status','golongan_barang_id','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
