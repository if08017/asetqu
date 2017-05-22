<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
  protected $table = 'receipt';
  protected $fillable = ['name','description','receipt_date','updated_at'];
  protected $quarded = ['created_at'];
  public $timestamps = true;
}
