<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;


class ReportController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $reports=Report::orderBy('id', 'asc')->get();
    return view('laporan',['reports'=>$reports]);
  }
  public function inventaris_pdf($id){
    $reports=Report::where('id',$id)->first();
    dd($reports);
    return view('laporan',['reports'=>$reports]);
  }
}
