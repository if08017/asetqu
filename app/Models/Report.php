<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
  protected $table = 'report';
  protected $fillable = ['code','name','description','status','updated_at'];
  protected $quarded = ['id','created_at'];
  public $timestamps = true;
}
