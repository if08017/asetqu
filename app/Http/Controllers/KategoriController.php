<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Kategori;
use App\Models\Golongan;

class KategoriController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(){
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
      return view('kategori');
  }
  public function kategori(){
    $kategoris = Kategori::join('golongan','golongan_id','=','golongan.id')
                ->select('kategori.*','golongan.name as golongan_name')
                ->orderBy('created_at', 'desc')
                ->paginate(12);
    if(!$kategoris)
    abort(404);
    return view('kategori', ['kategoris' => $kategoris]);
  }
  public function kategori_add(){
    $golongans = Golongan::orderBy('name', 'asc')->get();
    return view('kategoriadd', ['golongans' => $golongans]);
  }
  public function kategori_insert(Request $request){
    Kategori::create([
      'code' => $request->code,
      'name' => $request->name,
      'status' => $request->status,
      'golongan_id' => $request->induk
    ]);
    return redirect('/kategori');
  }
  public function kategori_show($id){
    $kategoris = Kategori::find($id);
    dd($kategoris);
    return redirect('/kategori');
  }
  public function kategori_edit($id){
    $golongans = Golongan::orderBy('name', 'asc')->get();
    $kategori = Kategori::join('golongan','golongan_id','=','golongan.id')
                ->select('kategori.*','golongan.name as golongan_name')
                ->find($id);
    //dd($kategoris);
    return view('kategoriedit', ['kategori' => $kategori], ['golongans' => $golongans]);
  }
  public function kategori_update($id, Request $request){
    $kategoris = Kategori::find($id);
    $kategoris->code = $request->code;
    $kategoris->name = $request->name;
    $kategoris->golongan_id = $request->induk;
    $kategoris->status = $request->status;
    $kategoris->save();
    //dd($request);
    return redirect('/kategori');
  }
  public function kategori_delete($id){
    $kategoris = Kategori::destroy($id);
    //$kategoris->delete();
    //dd($kategoris);
    return redirect('/kategori');
  }
}
