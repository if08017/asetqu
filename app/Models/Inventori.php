<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventori extends Model
{
  protected $table = 'inventori_barang';
  protected $fillable = ['picture','barang_id','golongan_barang_id','bidang_barang_id','kelompok_barang_id','sub_kelompok_barang_id','ruangan_id','pegawai_id','number','description','tujuan','price','satuan_name','size','quantity','out_stock','kondisi_name','brand','status_name','color','material','source','created_year', 'buy_year','updated_at','mutation_name', 'receipt_id'];
  protected $quarded = ['id', 'created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
