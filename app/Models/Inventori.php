<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventori extends Model
{
  protected $table = 'inventori_barang';
  protected $fillable = ['picture','barang_code','barang_id','name','number','description','tujuan','price','satuan_name','size','quantity','kondisi_name','brand','status_name','color','material','source','year_created', 'year_buy','pegawai_id', 'ruangan_id','golongan_barang_id', 'bidang_barang_id','kelompok_barang_id','sub_kelompok_barang_id','updated_at','mutation_id', 'receipt_id'];
  protected $quarded = ['id', 'created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
