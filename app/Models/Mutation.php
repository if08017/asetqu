<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
  protected $table = 'mutation';
  protected $fillable = ['barang_id','pegawai_id','ruangan_id','quantity'];
  protected $quarded = ['created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
