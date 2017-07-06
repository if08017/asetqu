<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
  protected $table = 'barang_keluar';
  protected $fillable = ['barang_id','ruangan_id','pegawai_id','kondisi_barang_id','status_mutasi_id','description','number','quantity','updated_at'];
  protected $quarded = ['id', 'created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
