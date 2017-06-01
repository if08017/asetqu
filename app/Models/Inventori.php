<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventori extends Model
{
  protected $table = 'inventori_barang';
  protected $fillable = ['barang_id','quantity','number','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
