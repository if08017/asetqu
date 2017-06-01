<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected $table = 'barang';
  protected $fillable = ['code','name','description','sub_kelompok_barang_id','updated_at'];
  protected $quarded = ['id', 'created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
