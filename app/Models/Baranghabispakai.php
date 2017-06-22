<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baranghabispakai extends Model
{
  protected $table = 'barang_habis_pakai';
  protected $fillable = ['mutation_id','barang_id','kwitansi_id','golongan_barang_id','bidang_barang_id','kelompok_barang_id','sub_kelompok_barang_id','satuan_name','kondisi_name','status_name','ruangan_id','unit_kerja_id','pegawai_id','jabatan_id','quantity','source','price','sum','description','updated_at','_token'];
  protected $quarded = ['id', 'created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
