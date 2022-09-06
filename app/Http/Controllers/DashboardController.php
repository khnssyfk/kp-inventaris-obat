<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataObat;
use App\Models\ObatMasuk;
use App\Models\ObatKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obt_masuk = DB::table('obat_masuk')->sum('jumlah');
        $obt_keluar = DB::table('obat_keluars')->sum('jumlah_keluar');

        $msk_jan = ObatMasuk::whereMonth('tgl_masuk','01')->sum('jumlah');
        $msk_feb = ObatMasuk::whereMonth('tgl_masuk','02')->sum('jumlah');
        $msk_mar = ObatMasuk::whereMonth('tgl_masuk','03')->sum('jumlah');
        $msk_apr = ObatMasuk::whereMonth('tgl_masuk','04')->sum('jumlah');
        $msk_mei = ObatMasuk::whereMonth('tgl_masuk','05')->sum('jumlah');
        $msk_jun = ObatMasuk::whereMonth('tgl_masuk','06')->sum('jumlah');
        $msk_jul = ObatMasuk::whereMonth('tgl_masuk','07')->sum('jumlah');
        $msk_agu = ObatMasuk::whereMonth('tgl_masuk','08')->sum('jumlah');
        $msk_sep = ObatMasuk::whereMonth('tgl_masuk','09')->sum('jumlah');
        $msk_okt = ObatMasuk::whereMonth('tgl_masuk','10')->sum('jumlah');
        $msk_nov = ObatMasuk::whereMonth('tgl_masuk','11')->sum('jumlah');
        $msk_des = ObatMasuk::whereMonth('tgl_masuk','12')->sum('jumlah');
        
        $klr_jan = ObatKeluar::whereMonth('tgl_keluar','01')->sum('jumlah_keluar');
        $klr_feb = ObatKeluar::whereMonth('tgl_keluar','02')->sum('jumlah_keluar');
        $klr_mar = ObatKeluar::whereMonth('tgl_keluar','03')->sum('jumlah_keluar');
        $klr_apr = ObatKeluar::whereMonth('tgl_keluar','04')->sum('jumlah_keluar');
        $klr_mei = ObatKeluar::whereMonth('tgl_keluar','05')->sum('jumlah_keluar');
        $klr_jun = ObatKeluar::whereMonth('tgl_keluar','06')->sum('jumlah_keluar');
        $klr_jul = ObatKeluar::whereMonth('tgl_keluar','07')->sum('jumlah_keluar');
        $klr_agu = ObatKeluar::whereMonth('tgl_keluar','08')->sum('jumlah_keluar');
        $klr_sep = ObatKeluar::whereMonth('tgl_keluar','09')->sum('jumlah_keluar');
        $klr_okt = ObatKeluar::whereMonth('tgl_keluar','10')->sum('jumlah_keluar');
        $klr_nov = ObatKeluar::whereMonth('tgl_keluar','11')->sum('jumlah_keluar');
        $klr_des = ObatKeluar::whereMonth('tgl_keluar','12')->sum('jumlah_keluar');
        $now = Carbon::now();
        $bulan = $now->format('m');
        $tahun = $now->year;

        // $query = DB::table('obat_keluars')->select('dataobat_id', DB::raw('sum(jumlah_keluar) as total'))->groupBy('dataobat_id')->whereMonth('tgl_keluar','=',$bulan)->whereYear('tgl_keluar','=',$tahun)->get();
        $query = ObatKeluar::select('dataobat_id', DB::raw('sum(jumlah_keluar) as total'))->groupBy('dataobat_id')->whereMonth('tgl_keluar','=',$bulan)->whereYear('tgl_keluar','=',$tahun)->orderBy('total','desc')->get();
        // dd($query);

        return view('dashboard',[
            'title'=>'Dashboard',
            'obt_masuk' => $obt_masuk,
            'obt_keluar'=>$obt_keluar,
            'msk_jan'=>$msk_jan,
            'msk_feb'=>$msk_feb,
            'msk_mar'=>$msk_mar,
            'msk_apr'=>$msk_apr,
            'msk_mei'=>$msk_mei,
            'msk_jun'=>$msk_jun,
            'msk_jul'=>$msk_jul,
            'msk_agu'=>$msk_agu,
            'msk_sep'=>$msk_sep,
            'msk_okt'=>$msk_okt,
            'msk_nov'=>$msk_nov,
            'msk_des'=>$msk_des,
            'klr_jan'=>$klr_jan,
            'klr_feb'=>$klr_feb,
            'klr_mar'=>$klr_mar,
            'klr_apr'=>$klr_apr,
            'klr_mei'=>$klr_mei,
            'klr_jun'=>$klr_jun,
            'klr_jul'=>$klr_jul,
            'klr_agu'=>$klr_agu,
            'klr_sep'=>$klr_sep,
            'klr_okt'=>$klr_okt,
            'klr_nov'=>$klr_nov,
            'klr_des'=>$klr_des,
            'query'=>$query,
            'dataobat'=>DataObat::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id     
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getObatTerbanyak(Request $request){
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        // dd($request->tahun);
        // $query = DB::table('obat_keluars')->select()->whereMonth('tgl_keluar','=',$bulan)->whereYear('tgl_keluar','=',$tahun)->get();

        $query = ObatKeluar::select('dataobat_id', DB::raw('sum(jumlah_keluar) as total'))->groupBy('dataobat_id')->whereMonth('tgl_keluar','=',$bulan)->whereYear('tgl_keluar','=',$tahun)->orderBy('total','desc')->get();

        // $coba = json_encode(DB::table('obat_keluars')->select('dataobat_id', DB::raw('sum(jumlah_keluar) as total'))->groupBy('dataobat_id')->whereMonth('tgl_keluar','=',$bulan)->whereYear('tgl_keluar','=',$tahun)->get()->toArray());

        // foreach($querys as $query){
        //     dump($query->total);
        // }
        // $now = Carbon::now();
        // $month = $now->format('m');
        // dump($month);

        $obt_masuk = DB::table('obat_masuk')->sum('jumlah');
        $obt_keluar = DB::table('obat_keluars')->sum('jumlah_keluar');
        $msk_jan = ObatMasuk::whereMonth('tgl_masuk','01')->sum('jumlah');
        $msk_feb = ObatMasuk::whereMonth('tgl_masuk','02')->sum('jumlah');
        $msk_mar = ObatMasuk::whereMonth('tgl_masuk','03')->sum('jumlah');
        $msk_apr = ObatMasuk::whereMonth('tgl_masuk','04')->sum('jumlah');
        $msk_mei = ObatMasuk::whereMonth('tgl_masuk','05')->sum('jumlah');
        $msk_jun = ObatMasuk::whereMonth('tgl_masuk','06')->sum('jumlah');
        $msk_jul = ObatMasuk::whereMonth('tgl_masuk','07')->sum('jumlah');
        $msk_agu = ObatMasuk::whereMonth('tgl_masuk','08')->sum('jumlah');
        $msk_sep = ObatMasuk::whereMonth('tgl_masuk','09')->sum('jumlah');
        $msk_okt = ObatMasuk::whereMonth('tgl_masuk','10')->sum('jumlah');
        $msk_nov = ObatMasuk::whereMonth('tgl_masuk','11')->sum('jumlah');
        $msk_des = ObatMasuk::whereMonth('tgl_masuk','12')->sum('jumlah');
        
        $klr_jan = ObatKeluar::whereMonth('tgl_keluar','01')->sum('jumlah_keluar');
        $klr_feb = ObatKeluar::whereMonth('tgl_keluar','02')->sum('jumlah_keluar');
        $klr_mar = ObatKeluar::whereMonth('tgl_keluar','03')->sum('jumlah_keluar');
        $klr_apr = ObatKeluar::whereMonth('tgl_keluar','04')->sum('jumlah_keluar');
        $klr_mei = ObatKeluar::whereMonth('tgl_keluar','05')->sum('jumlah_keluar');
        $klr_jun = ObatKeluar::whereMonth('tgl_keluar','06')->sum('jumlah_keluar');
        $klr_jul = ObatKeluar::whereMonth('tgl_keluar','07')->sum('jumlah_keluar');
        $klr_agu = ObatKeluar::whereMonth('tgl_keluar','08')->sum('jumlah_keluar');
        $klr_sep = ObatKeluar::whereMonth('tgl_keluar','09')->sum('jumlah_keluar');
        $klr_okt = ObatKeluar::whereMonth('tgl_keluar','10')->sum('jumlah_keluar');
        $klr_nov = ObatKeluar::whereMonth('tgl_keluar','11')->sum('jumlah_keluar');
        $klr_des = ObatKeluar::whereMonth('tgl_keluar','12')->sum('jumlah_keluar');

        return view('dashboard',compact('query'),[
            'title'=>'Dashboard',
            'dataobat'=>DataObat::all(),
            'query'=>$query,
            'obt_masuk' => $obt_masuk,
            'obt_keluar'=>$obt_keluar,
            'msk_jan'=>$msk_jan,
            'msk_feb'=>$msk_feb,
            'msk_mar'=>$msk_mar,
            'msk_apr'=>$msk_apr,
            'msk_mei'=>$msk_mei,
            'msk_jun'=>$msk_jun,
            'msk_jul'=>$msk_jul,
            'msk_agu'=>$msk_agu,
            'msk_sep'=>$msk_sep,
            'msk_okt'=>$msk_okt,
            'msk_nov'=>$msk_nov,
            'msk_des'=>$msk_des,
            'klr_jan'=>$klr_jan,
            'klr_feb'=>$klr_feb,
            'klr_mar'=>$klr_mar,
            'klr_apr'=>$klr_apr,
            'klr_mei'=>$klr_mei,
            'klr_jun'=>$klr_jun,
            'klr_jul'=>$klr_jul,
            'klr_agu'=>$klr_agu,
            'klr_sep'=>$klr_sep,
            'klr_okt'=>$klr_okt,
            'klr_nov'=>$klr_nov,
            'klr_des'=>$klr_des,
            
        ]);
    }
}
