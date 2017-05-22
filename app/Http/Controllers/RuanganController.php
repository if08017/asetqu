<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Ruangan;

class RuanganController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $ruangans = Ruangan::orderBy('created_at', 'desc')->paginate(10);
    //dd($kategoris);
    if(!$barangs)
    abort(404);
    return view('ruangan', ['ruangans' => $ruangans]);
  }
}
