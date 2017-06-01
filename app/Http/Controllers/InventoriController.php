<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use App\Models\Inventori;


class InventoriController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    
  }
}
