<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Barang;
use App\Models\Inventori;
use App\Models\Mutation;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use App\Models\Baranghabispakai;

use Charts;

class HomeController extends Controller
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
      $barangs = Barang::sum('in_stock');
      $inventory = Charts::multiDatabase('areaspline','highcharts')
        ->dataset('barang masuk',Barangmasuk::all())
        ->dateFormat('j F y')
        ->title('Aktivitas Barang Masuk')
        ->elementLabel('Jumlah')
        ->dimensions(0,300)
        ->responsive(false)
        ->lastByDay(14, true);

      $bhp = Charts::database(Barangkeluar::all(), 'pie', 'highcharts')
        ->title('User types')
        ->dimensions(0, 300)
        ->responsive(false)
        ->groupBy('status_mutasi_id', null, [1 => 'Mutasi Pindah', 2 => 'Usulan penghapusan', 3 => 'Dihapus']);
      // $bhp = Charts::multiDatabase('areaspline','highcharts')
      //   ->dataset('Mutasi Pindah',Barangkeluar::where('status_mutasi_id','1')->get())
      //   ->dataset('Usulan penghapusan',Barangkeluar::where('status_mutasi_id','2')->get())
      //   ->dataset('Dihapus',Barangkeluar::where('status_mutasi_id','3')->get())
      //   ->dateFormat('j F y')
      //   ->title('Aktivitas Barang Keluar/Mutasi')
      //   ->elementLabel('Jumlah')
      //   ->dimensions(0,300)
      //   ->responsive(false)
      //   ->lastByDay(14, true);
      $years = Charts::database(Barang::all(),'bar', 'highcharts')
        ->dateFormat('j F y')
        ->title('Grafik Tahunan')
        ->elementLabel('Total')
        ->dimensions(0,200)
        ->responsive(false)
        ->groupByYear();
      $charts2 = Charts::database(Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
        ->select('barang.*','golongan_barang.name as golongan_barang_name')
        ->get(),'area', 'highcharts')
        ->title('Line Kategori')
        ->elementLabel('Total')
        ->dimensions(0,200)
        ->responsive(false)
        ->groupBy('golongan_barang_name');
      return view('home', ['barangs' => $barangs,'inventory'=>$inventory,'bhp'=>$bhp, 'charts2'=>$charts2, 'years'=>$years]);
    }
    public function search(Request $request){
      //$search = \Request::get('search');
      // dd($request);
      $barangs = Barangmasuk::join('barang','barang_id','=','barang.id')
        ->join('pegawai','barang_masuk.pegawai_id','=','pegawai.id')
        ->join('kondisi_barang','barang_masuk.kondisi_barang_id','=','kondisi_barang.id')
        ->join('ruangan','barang_masuk.ruangan_id','=','ruangan.id')
        ->select('barang_masuk.*', 'pegawai.name as pegawai_name', 'ruangan.name as ruangan_name')
        ->where(function($query) use ($request){
          $query->orWhere('barang.code','like','%'.$request->term.'%');
          $query->orWhere('barang.name','like','%'.$request->term.'%');
          $query->orWhere('barang_masuk.description','like','%'.$request->term.'%');
          $query->orWhere('barang_masuk.quantity','like','%'.$request->term.'%');
          $query->orWhere('kondisi_barang.name','like','%'.$request->term.'%');
          // $query->orWhere('status_mutasi.name','like','%'.$request->term.'%');
          $query->orWhere('pegawai.name','like','%'.$request->term.'%');
          $query->orWhere('ruangan.name','like','%'.$request->term.'%');
        })
        ->orderBy('id', 'asc')->paginate(5);
      // dd($barangs);
      return view('search',['barangs'=>$barangs, 'request'=>$request]);
    }
    public function autocomplete(Request $request){
      //call by non ajax autocomplete
      // dd($request);
      if ($request->ajax()) {
        // dd($request);
        $barangs = Barangmasuk::join('barang','barang_id','=','barang.id')
          ->join('pegawai','barang_masuk.pegawai_id','=','pegawai.id')
          ->join('kondisi_barang','barang_masuk.kondisi_barang_id','=','kondisi_barang.id')
          ->join('ruangan','barang_masuk.ruangan_id','=','ruangan.id')
          ->select('barang_masuk.*','barang.code as barang_code','barang.name as barang_name','pegawai.name as pegawai_name', 'ruangan.name as ruangan_name')
          ->where(function($query) use ($request){
            $query->orWhere('barang.code','like','%'.$request->term.'%');
            $query->orWhere('barang.name','like','%'.$request->term.'%');
            $query->orWhere('barang_masuk.description','like','%'.$request->term.'%');
            $query->orWhere('barang_masuk.quantity','like','%'.$request->term.'%');
            $query->orWhere('kondisi_barang.name','like','%'.$request->term.'%');
            // $query->orWhere('status_mutasi.name','like','%'.$request->term.'%');
            $query->orWhere('pegawai.name','like','%'.$request->term.'%');
            $query->orWhere('ruangan.name','like','%'.$request->term.'%');
          })
        ->orderBy('id', 'asc')
        ->take(5)
        ->get();
        //convert to Json
        // dd($barangs);
        $results = [];
        foreach ($barangs as $barang) {
          $results[] = ['id' => $barang->barang_id, 'value' => $barang->barang_name, 'label' => $barang->barang_code.'-'.$barang->barang_name];
        }
        //dd($results);
        return \Response::json($results);
        //return response()->json($results);
      }
    }
}
