<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\DataObat;
use App\Models\ObatKeluar;
use Illuminate\Http\Request;
use App\Models\ObatKeluarTemp;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
// use App\Http\Requests\StoreObatKeluarRequest;
// use App\Http\Requests\UpdateObatKeluarRequest;

class ObatKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('obat-keluar.index',[
            'title'=>'Obat Keluar',
            'obatkeluars'=>ObatKeluar::orderBy('id','desc')->get(),
            'data_obats'=>DataObat::all(),
            'dokters'=>Pasien::where('role_id','=',4)->orderBy('nama')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat-keluar.create',[
            'title'=>'Tambah Data Obat Keluar',
            'dataobats'=>DataObat::orderBy('nama_obat')->get(),
            'pasiens'=>Pasien::where('role_id','=',3)->orderBy('no_rekam_medis')->get(),
            // 'obat_keluars'=>ObatKeluarTemp::all(),
            'dokters'=>Pasien::where('role_id','=',4)->orderBy('nama')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = [
            'tgl_keluar'=>$request->tgl_keluar,
            'data_obat_id'=>$request->data_obat_id,
            'pasien_id'=>$request->pasien_id,
            'jumlah_keluar'=>$request->jumlah_keluar,
            'dokter_id'=>$request->dokter_id
            
        ];
        // $tgl = explode("-", $request->tgl_keluar);
        // $tahun = substr($tgl[0], -2);
        // $tanggal = "K".$tgl[2].$tgl[1].$tahun;

        
        $no_resep = IdGenerator::generate(['table' => 'obat_keluars','field'=>'no_resep' ,'length' => 10, 'reset_on_prefix_change' => true,'prefix' =>'K'.date('ym')]);
        // dd($no_resep);

        // $tanggals = Carbon::now()->format('Y-m-d');
        // $now = Carbon::now();
        // $thnBulan = $now->year . $now->month;
        // $cek = ObatKeluar::count();

        // dump($no_resep);

        if (count($datas['data_obat_id'])>0){
            foreach($datas['data_obat_id'] as $item=>$value){
                $data = array(
                    'no_resep'=>$no_resep,
                    'tgl_keluar'=>$datas['tgl_keluar'],
                    'data_obat_id'=>$datas['data_obat_id'][$item],
                    'pasien_id'=>$datas['pasien_id'],
                    'jumlah_keluar'=>$datas['jumlah_keluar'][$item],
                    'dokter_id'=>$datas['dokter_id']
                );
                // dump($data['no_resep']);
                $data_id = $datas['data_obat_id'][$item];
                $dataobat = DataObat::find($data_id);
                if ($data['jumlah_keluar']> $dataobat->jumlah){
                    Alert::warning('Gagal', 'Jumlah Obat Tidak Boleh Melebihi Stok!');
                    return redirect('/obat-keluar/create');
                }else{
                    $dataobat->jumlah -= $datas['jumlah_keluar'][$item];
                    $dataobat->save();
                    ObatKeluar::create($data);
                    
                }
                
            }
        }
        Alert::success('Sukses', 'Data Berhasil Ditambah!');
        return redirect('/obat-keluar');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(ObatKeluar $obatKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('obat-keluar.edit',[
            'title'=>'Edit Riwayat Obat Keluar',
            'dataobats'=>DataObat::all(),
            'pasiens'=>Pasien::all(),
            'obat_keluars'=>ObatKeluar::where('id',$id)->first(),
            'dokters'=>User::where('role_id','=',4)->orderBy('nama')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObatKeluar $obatKeluar)
    {
        // dump($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObatKeluar $obatKeluar)
    {
        $id = $obatKeluar->id;
        $data = ObatKeluar::where('id',$id)->first();
        $data_id = $data->data_obat_id;
        // dd($data->jumlah);
        
        $dataobat = DataObat::find($data_id);
        $dataobat->jumlah += $data->jumlah_keluar;
        // dd($dataobat);
        $dataobat->save();
        ObatKeluar::destroy($id);
        Alert::success('Sukses', 'Data Berhasil Dihapus!');
        return redirect('/obat-keluar');
    }

    public function getDataMasuk($id=""){
        $columns = DB::table('pasiens')->where('no_rekam_medis', $id)->first();
        return response()->json([
           'nama' => $columns->nama,
        ]);

    }

    public function getDataTemp(Request $request){
        $temps = ObatKeluarTemp::all()->toArray();
        // $barang = ObatMasukTemp::all();
        
        
        foreach($temps as $temp){
            // dump($temp['data_obat_id']);
            $dataobat = DataObat::find($temp['data_obat_id']);
            $dataobat->jumlah -= $temp['jumlah_keluar'];
            // dump($dataobat);
            $dataobat->save();
            // dump($dataobat->jumlah);
            DB::table('obat_keluars')->insert($temp);
            DB::table('obat_keluar_temps')->delete($temp);
        }
        // ObatMasukTemp::destroy($temp['kode_transaksi']);
        // $sum = DataObat::all();
        // dd($sum);
        Alert::success('Sukses', 'Data Berhasil Disimpan!');
        return redirect('/obat-keluar');

    }
}
