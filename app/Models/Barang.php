<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected $table = 'barang';
  protected $fillable = ['code','name','description','satuan_name','status_name','golongan_barang_id','bidang_barang_id','kelompok_barang_id','sub_kelompok_barang_id','updated_at'];
  protected $quarded = ['id', 'created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
