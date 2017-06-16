<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventori extends Model
{
  protected $table = 'inventori_barang';
  protected $fillable = ['picture','barang_id','barang_code','barang_name','number','description','tujuan','price','satuan_name','size','quantity','kondisi_name','brand','status_name','color','material','source','created_year', 'buy_year','updated_at','mutation_id', 'receipt_id'];
  protected $quarded = ['id', 'created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
