<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use App\Http\Requests;
use Image;

use App\Models\Inventori;
use App\Models\Golongan;
use App\Models\Bidang;
use App\Models\Kelompok;
use App\Models\Subkelompok;
use App\Models\Ruangan;
use App\Models\Pegawai;
use App\Models\Satuan;
use App\Models\Kondisi;
use App\Models\Status;

class InventoriController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $inventoris = Inventori::orderBy('created_at', 'desc')->paginate(13);
    return view('inventori', ['inventoris' => $inventoris]);
  }
  public function inventori_view($id){
    $inventori = Inventori::find($id);
    return view('inventoriview', ['inventori' => $inventori]);
  }
  public function inventori_edit($id){
    $kondisis = Kondisi::orderBy('name', 'asc')->get();
    $statuss = Status::orderBy('name', 'asc')->get();
    $inventori = Inventori::find($id);
    //$barang = Barang::find($id);
    //dd($barang);
    return view('inventoriedit', ['inventori' => $inventori, 'kondisis' => $kondisis, 'statuss' => $statuss]);
  }
  public function inventori_update($id, Request $request){
    // dd($request);
    if($request->hasFile('picture')){
      $inventori = Inventori::findOrFail($id);
      // dd($inventori);
      if($inventori['picture']){
        // File::delete('images/inventori/'.$inventori->picture);
        $pathToImage = public_path('images/inventori/'.$inventori['picture']);
        // dd($pathToImage);
        File::delete($pathToImage);
      }
      $picture = $request->file('picture');
      $filename = time() . '.' . $picture->getClientOriginalExtension();
      Image::make($picture)->resize(300,null, function ($constraint) { $constraint->aspectRatio(); })->save(public_path('images/inventori/' . $filename))->destroy();
      $inventori = Inventori::find($id);
      $inventori->picture = $filename;
      $inventori->save();
    }

    $inventori = Inventori::find($id);
    $inventori->barang_code = $request->code;
    $inventori->number = $request->number;
    $inventori->barang_name = $request->name;
    $inventori->description = $request->description;
    $inventori->price = $request->price;
    $inventori->quantity = $request->quantity;
    $inventori->kondisi_name = $request->kondisi;
    $inventori->tujuan = $request->tujuan;
    $inventori->source = $request->source;
    $inventori->brand = $request->brand;
    $inventori->size = $request->size;
    $inventori->satuan_name = $request->satuan;
    $inventori->status_name = 'Aktif';
    $inventori->color = $request->color;
    $inventori->material = $request->material;
    $inventori->created_year = $request->created_year;
    $inventori->buy_year = $request->buy_year;
    $inventori->save();
    return redirect('/inventori/'.$id.'/view');
  }
  public function inventori_delete($id){
    $inventori = Inventori::findOrFail($id);
    // dd($inventori);
    if($inventori['picture']){
      // File::delete('images/inventori/'.$inventori->picture);
      $pathToImage = public_path('images/inventori/'.$inventori['picture']);
      // dd($pathToImage);
      File::delete($pathToImage);
    }
    Inventori::destroy($id);
    return redirect('/inventori');
  }
  public function inventori_add(){
    $satuans = Satuan::orderBy('name', 'asc')->get();
    $kondisis = Kondisi::orderBy('name', 'asc')->get();
    $statuss = Status::orderBy('name', 'asc')->get();
    $pegawais = Pegawai::orderBy('name', 'asc')->get();
    $ruangans = Ruangan::orderBy('name', 'asc')->get();
    $golongans = Golongan::orderBy('name', 'asc')->get();
    return view('inventoriadd',['satuans' => $satuans, 'kondisis' => $kondisis,  'statuss' => $statuss, 'ruangans' => $ruangans, 'pegawais' => $pegawais, 'golongans' => $golongans]);
  }
  public function inventori_insert(Request $request){
    // dd($request);
    if($request->hasFile('picture')){
      $picture = $request->file('picture');
      $filename = time() . '.' . $picture->getClientOriginalExtension();
      Image::make($picture)->resize(300,null, function ($constraint) { $constraint->aspectRatio(); })->save(public_path('images/inventori/' . $filename))->destroy();
    }

    Inventori::create([
      'barang_id' => $request->barang_id,
      'barang_code' => $request->code,
      'barang_name' => $request->name,
      'quantity' => $request->quantity,
      'satuan_name' => $request->satuan,
      'pegawai_id' => $request->pegawai,
      'ruangan_id' => $request->ruangan,
      'golongan_barang_id' => $request->golongan,
      'bidang_barang_id' => $request->bidang,
      'kelompok_barang_id' => $request->kelompok,
      'sub_kelompok_barang_id' => $request->subkelompok,
      'picture' => $filename,
      'number' => $request->number,
      'description' => $request->description,
      'price' => $request->price,
      'size' => $request->size,
      'brand' => $request->brand,
      'color' => $request->color,
      'material' => $request->material,
      'source' => $request->source,
      'created_year' => $request->created_year,
      'buy_year' => $request->buy_year,
      'mutation_id' => 1
    ]);
    return redirect('/inventori');
  }
}
