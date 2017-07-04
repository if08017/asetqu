<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
  protected $table = 'barang_masuk';
  protected $fillable = ['number','barang_id','ruangan_id','pegawai_id','kondisi_barang_id','status_name','description','quantity','price','color','size','material','source','picture','created_year','buy_year','updated_at'];
  protected $quarded = ['id', 'created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
