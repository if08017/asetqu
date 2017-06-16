<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
  protected $table = 'mutation';
  protected $fillable = ['barang_id','barang_code','barang_name','pegawai_id','ruangan_id','quantity','description','kondisi_name','status_name','update_at'];
  protected $quarded = ['created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
