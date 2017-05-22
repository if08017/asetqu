<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asetqu extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['code','name','golongan_id','status','updated_at'];
    protected $quarded = ['id','created_at'];
    public $timestamps = true;
}
