<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
  protected $table = 'mutation';
  protected $fillable = ['handover_date','name','updated_at'];
  protected $quarded = ['created_at'];
  public $timestamps = true;
}
