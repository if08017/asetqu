<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;


class ReportController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $pegawais = Pegawai::orderBy('name', 'asc')->get();
    return view('laporan',['pegawais'=>$pegawais]);
  }
  public function inventaris_pdf($id){
    $reports=Report::where('id',$id)->first();
    dd($reports);
    return view('laporan',['reports'=>$reports]);
  }
}
