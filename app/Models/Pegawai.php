<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
  protected $table = 'pegawai';
  protected $fillable = ['nip','name','contact','email','address','sex','birthday','updated_at','jabatan_id','unit_kerja_id','satuan_kerja_id','provinsi_id','kabupaten_id'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
  public $primaryKey = 'id';
}
