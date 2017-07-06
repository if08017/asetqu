<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use App\Http\Requests;
use Image;

use App\Models\Barang;
use App\Models\Golongan;
use App\Models\Bidang;
use App\Models\Kelompok;
use App\Models\Subkelompok;
use App\Models\Ruangan;
use App\Models\Pegawai;
use App\Models\Satuan;
use App\Models\Kondisi;
use App\Models\Status;
use App\Models\Statusmutasi;
use App\Models\Mutation;
use App\Models\Receipt;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;

class BarangController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $barangs = Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
              ->select('barang.*','golongan_barang.name as golongan_barang_name')
              ->orderBy('updated_at', 'desc')->paginate(13);
    return view('barang', ['barangs' => $barangs]);
  }

  public function barang_view($id){
    $barang = Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
              ->join('bidang_barang','bidang_barang_id','=','bidang_barang.id')
              ->join('kelompok_barang','kelompok_barang_id','=','kelompok_barang.id')
              ->join('sub_kelompok_barang','sub_kelompok_barang_id','=','sub_kelompok_barang.id')
              ->select('barang.*','golongan_barang.name as golongan_barang_name','bidang_barang.name as bidang_barang_name','kelompok_barang.name as kelompok_barang_name','sub_kelompok_barang.name as sub_kelompok_barang_name')
              ->find($id);
    return view('barangview', ['barang' => $barang]);
  }
  public function barang_edit($id,$golongan_barang_id,$bidang_barang_id,$kelompok_barang_id){
    $golongans = Golongan::orderBy('name', 'asc')->get();
    $bidangs = Bidang::where('golongan_barang_id',$golongan_barang_id)->orderBy('name', 'asc')->get();
    $kelompoks = Kelompok::where('bidang_barang_id',$bidang_barang_id)->orderBy('name', 'asc')->get();
    $subkelompoks = Subkelompok::where('kelompok_barang_id',$kelompok_barang_id)->orderBy('name', 'asc')->get();
    $satuans = Satuan::orderBy('name', 'asc')->get();
    $barang = Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
              ->join('bidang_barang','bidang_barang_id','=','bidang_barang.id')
              ->join('kelompok_barang','kelompok_barang_id','=','kelompok_barang.id')
              ->join('sub_kelompok_barang','sub_kelompok_barang_id','=','sub_kelompok_barang.id')
              ->select('barang.*','golongan_barang.name as golongan_barang_name','bidang_barang.name as bidang_barang_name','kelompok_barang.name as kelompok_barang_name','sub_kelompok_barang.name as sub_kelompok_barang_name')
              ->find($id);
    return view('barangedit', ['barang' => $barang, 'satuans' => $satuans, 'golongans' => $golongans, 'bidangs' => $bidangs, 'kelompoks' => $kelompoks, 'subkelompoks' => $subkelompoks]);
  }
  public function barang_delete($id){
    Barang::destroy($id);
    return redirect('/barang');
  }
  public function barang_add(){
    $satuans = Satuan::orderBy('name', 'asc')->get();
    $golongans = Golongan::orderBy('name', 'asc')->get();
    $bidangs = Bidang::orderBy('name', 'asc')->get();
    $kelompoks = Kelompok::orderBy('name', 'asc')->get();
    $subkelompoks = Subkelompok::orderBy('name', 'asc')->get();
    return view('barangadd',['satuans' => $satuans, 'golongans' => $golongans, 'bidangs' => $bidangs, 'kelompoks' => $kelompoks, 'subkelompoks' => $subkelompoks]);
  }
  public function barang_insert(Request $request){
    Barang::create([
      'code' => $request->code,
      'name' => $request->name,
      'description' => $request->description,
      'satuan_name' => $request->satuan,
      'status_name' => 'Aktif',
      'golongan_barang_id' => $request->golongan,
      'bidang_barang_id' => $request->bidang,
      'kelompok_barang_id' => $request->kelompok,
      'sub_kelompok_barang_id' => $request->subkelompok
    ]);
    return redirect('/barang');
  }
  public function barang_update($id, Request $request){
    $barang = Barang::find($id);
    $barang->code = $request->code;
    $barang->name = $request->name;
    $barang->description = $request->description;
    $barang->golongan_barang_id = $request->golongan;
    $barang->bidang_barang_id = $request->bidang;
    $barang->kelompok_barang_id = $request->kelompok;
    $barang->sub_kelompok_barang_id = $request->subkelompok;
    $barang->save();
    return redirect('/barang/'.$id.'/view');
  }
  public function bidang_barang(Request $request){
    //dd($request);
    $bidangbarangs = Bidang::where('golongan_barang_id', $request->bidang_id)->get();
    return \Response::json($bidangbarangs);
  }
  public function mutation_barang(Request $request){
    // dd($request);
    $barangs = Barang::join('golongan_barang','barang.golongan_barang_id','=','golongan_barang.id')
      ->join('bidang_barang','barang.bidang_barang_id','=','bidang_barang.id')
      ->join('kelompok_barang','barang.kelompok_barang_id','=','kelompok_barang.id')
      ->join('sub_kelompok_barang','barang.sub_kelompok_barang_id','=','sub_kelompok_barang.id')
      ->select('barang.*','golongan_barang.name as golongan_barang_name','bidang_barang.name as bidang_barang_name','kelompok_barang.name as kelompok_barang_name','sub_kelompok_barang.name as sub_kelompok_barang_name')
      ->where('barang.code', $request->barang_code)
      ->get();
    // dd($barangs);
    return \Response::json($barangs);
  }
  public function kelompok_barang(Request $request){
    //dd($request);
    $kelompokbarangs = Kelompok::where('bidang_barang_id', $request->kelompok_id)->get();
    return \Response::json($kelompokbarangs);
  }
  public function sub_kelompok_barang(Request $request){
    //dd($request);
    $subkelompokbarangs = Subkelompok::where('kelompok_barang_id', $request->subkelompok_id)->get();
    return \Response::json($subkelompokbarangs);
  }
  public function nama_barang(Request $request){
    // dd($request);
    $barangs = Barang::where('sub_kelompok_barang_id', $request->barang_id)->get();
    return \Response::json($barangs);
  }



  public function mutation_view(){
    $ruangans = Ruangan::orderBy('name', 'asc')->get();
    $pegawais = Pegawai::orderBy('name', 'asc')->get();
    $kondisis = Kondisi::orderBy('name', 'asc')->get();
    $statuss = Status::orderBy('name', 'asc')->get();
    $mutations = Mutation::join('pegawai','mutation.pegawai_id','=','pegawai.id')
                ->join('ruangan','mutation.ruangan_id','=','ruangan.id')
                ->orderBy('created_at', 'desc')
                ->select('mutation.*', 'pegawai.name as pegawai_name', 'ruangan.name as ruangan_name')
                ->paginate(5);
    return view('mutation',['mutations'=>$mutations,'ruangans' => $ruangans, 'pegawais' => $pegawais, 'kondisis'=>$kondisis, 'statuss'=>$statuss]);
  }
  public function mutation_barang_insert(Request $request){
    // dd($request);
    Mutation::create([
      'barang_id' => $request->id,
      'barang_code'=>$request->code,
      'barang_name'=>$request->name,
      'pegawai_id' => $request->pegawai,
      'ruangan_id' => $request->ruangan,
      'quantity' => $request->quantity,
      'kondisi_name' => $request->kondisi,
      'status_name' => $request->status,
      '_token' => $request->_token,
    ]);
    return redirect('/barang/'.$request->id.'/view');
  }
  public function mutation_autocomplete(Request $request){
    //call by non ajax autocomplete
    if ($request->ajax()) {
      //dd($request);
      $barangs = Barang::where(function($query) use ($request){
                    $query->orWhere('barang.code','like','%'.$request->term.'%');
                    $query->orWhere('barang.name','like','%'.$request->term.'%');
                })
                ->orderBy('name', 'asc')
                ->take(5)
                ->get();
      //convert to Json
      $results = [];
      foreach ($barangs as $barang) {
        $results[] = ['id' => $barang->id, 'value' => $barang->code, 'label' => $barang->code.'-'.$barang->name];
      }
      //dd($results);
      return \Response::json($results);
      //return response()->json($results);
    }
  }
  public function barang_masuk(){
    $barangs = Barangmasuk::join('barang','barang_id','=','barang.id')
      ->join('kondisi_barang','barang_masuk.kondisi_barang_id','=','kondisi_barang.id')
      ->join('status_barang','barang_masuk.status_barang_id','=','status_barang.id')
      ->select('barang_masuk.*','barang.code as barang_code','barang.name as barang_name','kondisi_barang.name as kondisi_barang_name','status_barang.name as status_barang_name')
      ->orderBy('updated_at', 'desc')->paginate(13);
    return view('barang_masuk', ['barangs' => $barangs]);
  }
  public function barang_masuk_add(){
    $ruangans = Ruangan::orderBy('name', 'asc')->get();
    $pegawais = Pegawai::orderBy('name', 'asc')->get();
    $kondisis = Kondisi::orderBy('name', 'asc')->get();
    // $statuss = Status::orderBy('name', 'asc')->get();
    return view('barangmasukadd',['ruangans' => $ruangans, 'pegawais' => $pegawais,'kondisis' => $kondisis]);
  }
  public function barang_masuk_insert(Request $request){
    // dd($request);
    if($request->hasFile('picture')){
      $picture = $request->file('picture');
      $filename = time() . '.' . $picture->getClientOriginalExtension();
      Image::make($picture)->resize(300,null, function ($constraint) { $constraint->aspectRatio(); })->save(public_path('images/inventori/' . $filename))->destroy();
    }

    Barangmasuk::create([
      'barang_id' => $request->barang_id,
      'quantity' => $request->quantity,
      'satuan_name' => $request->satuan,
      'kondisi_barang_id' => $request->kondisi,
      'pegawai_id' => $request->pegawai,
      'ruangan_id' => $request->ruangan,
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
      'buy_year' => $request->buy_year
    ]);
    return redirect('/barang/masuk');
  }
  public function barang_masuk_view($id){
    $barang = Barangmasuk::join('barang','barang_id','=','barang.id')
      ->join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
      ->join('bidang_barang','bidang_barang_id','=','bidang_barang.id')
      ->join('kelompok_barang','kelompok_barang_id','=','kelompok_barang.id')
      ->join('sub_kelompok_barang','sub_kelompok_barang_id','=','sub_kelompok_barang.id')
      ->select('barang_masuk.*','barang.code as barang_code','barang.name as barang_name','barang.brand as barang_brand','golongan_barang.name as golongan_barang_name','bidang_barang.name as bidang_barang_name','kelompok_barang.name as kelompok_barang_name','sub_kelompok_barang.name as sub_kelompok_barang_name')
      ->find($id);
    return view('barangmasukview', ['barang' => $barang]);
  }
  public function barang_masuk_edit($id){
    $satuans = Satuan::orderBy('name', 'asc')->get();
    $statuss = Status::orderBy('name', 'asc')->get();
    $kondisis = Kondisi::orderBy('name', 'asc')->get();
    $ruangans = Ruangan::orderBy('name', 'asc')->get();
    $pegawais = Pegawai::orderBy('name', 'asc')->get();
    $barang = Barangmasuk::join('barang','barang_id','=','barang.id')
      ->join('pegawai','barang_masuk.pegawai_id','=','pegawai.id')
      ->join('ruangan','barang_masuk.ruangan_id','=','ruangan.id')
      ->join('kondisi_barang','barang_masuk.kondisi_barang_id','=','kondisi_barang.id')
      ->select('barang_masuk.*','barang.name as barang_name','ruangan.name as ruangan_name','pegawai.name as pegawai_name','kondisi_barang.name as kondisi_barang_name')
      ->find($id);
    return view('barangmasukedit', ['barang' => $barang,'ruangans' => $ruangans, 'pegawais' => $pegawais,'satuans' => $satuans,'statuss'=>$statuss,'kondisis'=>$kondisis]);
  }
  public function barang_masuk_update($id, Request $request){
    // dd($request);
    if($request->hasFile('picture')){
      $barangmasuk = Barangmasuk::findOrFail($id);
      if($barangmasuk['picture']){
        // File::delete('images/inventori/'.$inventori->picture);
        $pathToImage = public_path('images/inventori/'.$barangmasuk['picture']);
        // dd($pathToImage);
        File::delete($pathToImage);
      }
      $picture = $request->file('picture');
      $filename = time() . '.' . $picture->getClientOriginalExtension();
      Image::make($picture)->resize(300,null, function ($constraint) { $constraint->aspectRatio(); })->save(public_path('images/inventori/' . $filename))->destroy();
      $barangmasuk = Barangmasuk::find($id);
      $barangmasuk->picture = $filename;
      $barangmasuk->save();
    }

    $barangmasuk = Barangmasuk::find($id);
    $barangmasuk->barang_id = $request->id;
    $barangmasuk->ruangan_id = $request->ruangan;
    $barangmasuk->pegawai_id = $request->pegawai;
    $barangmasuk->kondisi_barang_id = $request->kondisi;
    $barangmasuk->number = $request->number;
    $barangmasuk->description = $request->description;
    $barangmasuk->price = $request->price;
    $barangmasuk->quantity = $request->quantity;
    $barangmasuk->source = $request->source;
    $barangmasuk->size = $request->size;
    $barangmasuk->color = $request->color;
    $barangmasuk->material = $request->material;
    $barangmasuk->created_year = $request->created_year;
    $barangmasuk->buy_year = $request->buy_year;
    $barangmasuk->save();
    return redirect('/barang/masuk/'.$id.'/view');
  }
  public function barang_masuk_delete($id){
    $barangmasuk = Barangmasuk::findOrFail($id);
    // dd($inventori);
    if($barangmasuk['picture']){
      // File::delete('images/inventori/'.$inventori->picture);
      $pathToImage = public_path('images/inventori/'.$barangmasuk['picture']);
      // dd($pathToImage);
      File::delete($pathToImage);
    }
    Barangmasuk::destroy($id);
    return redirect('/barang/masuk');
  }
  public function barang_keluar(){
    $barangs = Barangkeluar::join('barang','barang_id','=','barang.id')
      ->join('pegawai','barang_keluar.pegawai_id','=','pegawai.id')
      ->join('ruangan','barang_keluar.ruangan_id','=','ruangan.id')
      ->join('kondisi_barang','barang_keluar.kondisi_barang_id','=','kondisi_barang.id')
      ->join('status_mutasi','barang_keluar.status_mutasi_id','=','status_mutasi.id')
      ->select('barang_keluar.*','barang.code as barang_code','barang.name as barang_name','pegawai.name as pegawai_name','kondisi_barang.name as kondisi_barang_name','status_mutasi.name as status_mutasi_name','ruangan.name as ruangan_name')
      ->orderBy('updated_at', 'desc')->paginate(13);
    return view('barang_keluar', ['barangs' => $barangs]);
  }
  public function barang_keluar_add(){
    $ruangans = Ruangan::orderBy('name', 'asc')->get();
    $pegawais = Pegawai::orderBy('name', 'asc')->get();
    $kondisis = Kondisi::orderBy('name', 'asc')->get();
    $statuss = Statusmutasi::orderBy('name', 'asc')->get();
    return view('barangkeluaradd',['ruangans' => $ruangans, 'pegawais' => $pegawais,'kondisis' => $kondisis, 'statuss' => $statuss]);
  }
  public function barang_keluar_insert(Request $request){
    // dd($request);
    Barangkeluar::create([
      'barang_id' => $request->barang_id,
      'ruangan_id' => $request->ruangan,
      'pegawai_id' => $request->pegawai,
      'kondisi_barang_id' => $request->kondisi,
      'status_mutasi_id' => $request->status,
      'quantity' => $request->quantity,
      'description' => $request->description
    ]);
    return redirect('/barang/keluar');
  }
  public function barang_keluar_edit($id){
    $satuans = Satuan::orderBy('name', 'asc')->get();
    $statuss = Statusmutasi::orderBy('name', 'asc')->get();
    $kondisis = Kondisi::orderBy('name', 'asc')->get();
    $ruangans = Ruangan::orderBy('name', 'asc')->get();
    $pegawais = Pegawai::orderBy('name', 'asc')->get();
    $barang = Barangkeluar::join('barang','barang_id','=','barang.id')
      ->join('pegawai','barang_keluar.pegawai_id','=','pegawai.id')
      ->join('ruangan','barang_keluar.ruangan_id','=','ruangan.id')
      ->join('kondisi_barang','barang_keluar.kondisi_barang_id','=','kondisi_barang.id')
      ->join('status_mutasi','barang_keluar.status_mutasi_id','=','status_mutasi.id')
      ->select('barang_keluar.*','barang.name as barang_name','ruangan.name as ruangan_name','pegawai.name as pegawai_name','kondisi_barang.name as kondisi_barang_name','status_mutasi.name as status_mutasi_name')
      ->find($id);
    return view('barangkeluaredit', ['barang' => $barang,'ruangans' => $ruangans, 'pegawais' => $pegawais,'satuans' => $satuans,'statuss'=>$statuss,'kondisis'=>$kondisis]);
  }
  public function barang_keluar_update($id, Request $request){
    // dd($request);
    $barangkeluar = Barangkeluar::find($id);
    $barangkeluar->barang_id = $request->id;
    $barangkeluar->ruangan_id = $request->ruangan;
    $barangkeluar->pegawai_id = $request->pegawai;
    $barangkeluar->kondisi_barang_id = $request->kondisi;
    $barangkeluar->status_mutasi_id = $request->status;
    $barangkeluar->description = $request->description;
    $barangkeluar->quantity = $request->quantity;
    $barangkeluar->save();
    return redirect('/barang/keluar');
  }
  public function barang_keluar_delete($id){
    Barangkeluar::destroy($id);
    return redirect('/barang/keluar');
  }
}
