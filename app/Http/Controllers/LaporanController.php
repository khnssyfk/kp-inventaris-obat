<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Laporan;
use App\Models\DataObat;
use App\Models\ObatMasuk;
use App\Models\ObatKeluar;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;

class LaporanController extends Controller
{
    public function lap_obt(){
        // $todayDate = date("Y-m-d");
        return view('laporan.dataobat',[
            'dataobats' => DataObat::all(),
            'tgl'=>date("d-m-Y")
        ]);
        
    }
    public function lap_obt_msk(Request $request){
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;
        // dd($tgl_mulai);
        $obatmasuk = ObatMasuk::select('id', 'kode_transaksi', 'tgl_masuk','dataobat_id', 'jumlah','harga','nama_apotek','expired')
        ->whereBetween('tgl_masuk', [$tgl_mulai, $tgl_selesai])
        ->get();

        return view('laporan.obatmasuk',[
            'obatmasuks' => $obatmasuk,
            'dataobat'=>DataObat::all(),
            'tgl_mulai' =>$tgl_mulai,
            'tgl_selesai'=>$tgl_selesai
        ]);
    }
    public function lap_obt_klr(Request $request){
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;
        // dd($tgl_mulai);
        $obatkeluar = ObatKeluar::select('id', 'no_resep', 'tgl_keluar','dataobat_id','pasien_id','jumlah_keluar')
        ->whereBetween('tgl_keluar', [$tgl_mulai, $tgl_selesai])
        ->get();

        return view('laporan.obatkeluar',[
            'obatkeluars' => $obatkeluar,
            'dataobat'=>DataObat::all(),
            'tgl_mulai' =>$tgl_mulai,
            'tgl_selesai'=>$tgl_selesai
        ]);
    }
    public function lap_stk_obt(){
        return view('laporan.stokobat',[
            'dataobats'=>DataObat::all(),
            'tgl'=>date("d-m-Y")
        ]);
    }
    public function lap_dokter(){
        return view('laporan.dokter',[
            'dokters'=>Dokter::all(),
            'tgl'=>date("d-m-Y")
        ]);
    }
    public function lap_pasien(){
        return view('laporan.pasien',[
            'pasiens'=>Pasien::all(),
            'tgl'=>date("d-m-Y")
        ]);
    }
    

}
