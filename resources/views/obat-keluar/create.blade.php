@extends('layouts.main')

@section('container')
@if(session()->has('success')) 
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit Riwayat Obat Keluar</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/obat-keluar">Data Obat Keluar</a></li>
                <li class="breadcrumb-item active">Edit Riwayat Obat Keluar</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card" >
    <div class="card-header">
        <h4 class="card-title">Edit Riwayat Obat Keluar</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('obat-keluar.store') }}" method="post">
            @csrf 
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label for="pasien_id" class="sr-only ">No RM</label>
                    {{-- <input type="text" placeholder="Masukkan No RM" name="pasien_id" id="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror" required value="{{ old('pasien_id') }}"> --}}
                    <select class="form-select @error('pasien_id') is-invalid @enderror" name="pasien_id" required id="pasien_id" onclick="pasienfill()">
                        <option disabled>Masukan No RM</option>
                        @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->no_rekam_medis }}" id="pasien_id" onclick="pasienfill()">{{ $pasien->no_rekam_medis }}</option>
                        
                        @endforeach
                    </select>
                    @error('pasien_id')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="nama_pasien" class="sr-only">Nama Pasien</label>
                    <input type="text" placeholder="Masukkan Nama Pasien"   readonly name="nama_pasien" id="nama_pasien"  onkeyup="pasienfill()" class="form-control @error('nama_pasien') is-invalid @enderror" required value="{{ old('nama_pasien') }}">
                    @error('nama_pasien')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="dokter_id" class="sr-only ">Dokter Penanggung Jawab</label>
                    <select class="form-select @error('dokter_id') is-invalid @enderror" name="dokter_id" required id="dokter_id">
                        <option disabled>Masukan Nama Dokter</option>
                        @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}" id="dokter_id">{{ $dokter->nama }}</option>
                        
                        @endforeach
                    </select>
                    @error('dataobat_id')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                {{-- <div class="form-group col-md-6 col-12">
                    <label for="dataobat_id" class="sr-only ">Nama Obat</label>
                    <select class="form-select @error('dataobat_id') is-invalid @enderror" name="dataobat_id" required id="dataobat_id" onclick="autofill()">
                        <option value="">Masukan Nama Obat</option>
                        @foreach($dataobats as $dataobat)
                        <option value="{{ $dataobat->kode_obat }}" id="dataobat_id" onclick="autofill()">{{ $dataobat->nama_obat }}</option>
                        
                        @endforeach
                    </select>
                    @error('dataobat_id')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div> --}}
                {{-- <div class="form-group col-md-6 col-12">
                    <label for="kode_obat_id" class="sr-only">Kode Obat</label>
                    <input type="text" readonly placeholder="Masukkan Kode Obat" name="kode_obat_id" id="kode_obat" class="form-control @error('kode_obat_id') is-invalid @enderror" required value="{{ old('kode_obat_id') }}" onkeyup="autofill()">
                    @error('kode_obat_id')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="jumlah" class="sr-only">Stok</label>
                    <input type="number" placeholder="Masukkan Jumlah" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" readonly required value="{{ old('jumlah') }}" >
                    @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="jumlah_keluar" class="sr-only">Jumlah</label>
                    <input type="number" placeholder="Masukkan Jumlah" name="jumlah_keluar" class="form-control @error('jumlah_keluar') is-invalid @enderror" onkeyup="autofill()" required value="{{ old('jumlah_keluar') }}" >
                    @error('jumlah_keluar')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div> --}}
                {{-- <div class="form-group col-md-6 col-12">
                    <label for="dosis" class="sr-only">Aturan Pakai</label>
                    <input type="text" placeholder="Masukkan Dosis" name="dosis" class="form-control @error('dosis') is-invalid @enderror" required value="{{ old('dosis') }}">
                    @error('dosis')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div> --}}
                {{-- <div class="form-group col-md-6 col-12">
                    <label for="satuan" class="sr-only">Satuan</label>
                    <select class="form-select @error('satuan') is-invalid @enderror" disabled id="satuan" onclick="autofill()" name="satuan" required onkeyup="autofill()">
                        <option value="Tablet" id="satuan" onclick="autofill()">Tablet</option>
                        <option value="Botol" id="satuan" onclick="autofill()">Botol</option>
                        <option value="Ampul" id="satuan" onclick="autofill()">Ampul</option>
                        <option value="Vial" id="satuan" onclick="autofill()">Vial</option>

                    </select>
                    @error('satuan')
                    <div class="invalid-feedback">
                        Masukkan Satuan
                    </div>
                    @enderror
                </div> --}}
                
                <div class="form-group col-md-6 col-12">
                    <label for="tgl_keluar" class="sr-only">Tanggal Keluar</label>
                    <input type="date" placeholder="Masukkan Tanggal Keluar" id="startdateId" name="tgl_keluar" class="form-control @error('tgl_keluar') is-invalid @enderror" required value="{{ old('tgl_keluar') }}">
                    @error('tgl_keluar')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                
            </div>
            <div class="table-responsive mb-2 p-2 mt-3">
                <table class="table table-striped" id="obtklr_tb">
                    <thead>
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Nama Obat</th>
                                {{-- <th scope="col">Tgl Keluar</th>
                                <th scope="col">No RM</th> --}}
                            <th scope="col">Kode Obat</th>
                            <th scope="col">Stok</th> 
                            <th scope="col">Jumlah</th> 
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td ><select class="form-select dataobat @error('dataobat_id') is-invalid @enderror" name="dataobat_id[]" required id="dataobat_id" onclick=autofill()>
                                <option disabled>Masukan Nama Obat</option>
                                @foreach($dataobats as $dataobat)
                                <option value="{{ $dataobat->kode_obat }}" id="dataobat_id">{{ $dataobat->nama_obat }}</option>
                                
                                @endforeach
                            </select>
                            </td>
                            <td width="130px"><input type="text" readonly name="kode_obat_id[]" id="kode_obat" class="form-control @error('kode_obat_id') is-invalid @enderror" required value="{{ old('kode_obat_id') }}" onkeyup="autofill()"></td>
                            <td width="100px"><input type="number"  name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" readonly required value="{{ old('jumlah') }}" ></td>
                            <td width="100px"><input type="number" name="jumlah_keluar[]" class="form-control @error('jumlah_keluar') is-invalid @enderror" required value="{{ old('jumlah_keluar') }}" ></td>
                            <td><button class="btn btn-danger btn-sm border-0"><i class="bi bi-trash-fill" id="deleteRow"></i></button></td>
                        </tr>
                        {{-- <td>1</td> --}}
                        {{-- @foreach($obat_keluars as $obat_keluar)
                        <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y', strtotime($obat_keluar->tgl_keluar)) }}</td>
                                <td>{{ $obat_keluar->pasien_id }}</td>
                                <td>{{ $obat_keluar->dataobat->nama_obat }}</td>
                                <td>{{ $obat_keluar->jumlah_keluar}}</td>
                                <td>{{ $obat_keluar->dataobat->satuan}}</td>
                                <td>
                                    <form action="/obat-keluar-temp/{{ $obat_keluar->id }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
                                        @method("delete")
                                        @csrf
                                        <button class="btn btn-danger btn-sm border-0"><i class="bi bi-trash-fill" ></i></button>
                                    </form>                         
                                </td>
                            </tr>
                            @endforeach --}}
                    </tbody>
                </table>
                <button class="btn btn-success mt-2 float-end" id="btn-simpan">Simpan</button>
                {{-- <a href="/obatkeluartemp"  method="get" class="btn btn-success mt-2">Simpan</a> --}}
                <button class="btn btn-primary mt-2" id="dataObatKeluarBaru">Tambah</button>
            </div>
        </form>

        {{-- <button class="btn btn-primary mt-2"></a>Tambah</button> --}}
        
    
    {{-- <button class="btn btn-primary mt-2" name="action" value="add" id="add"><a href="/"></a>Tambah</button> --}}
    
    </div>
</div>


<script type="text/javascript">
    function autofill(){
        var dataobat_id = event.target.value;
        // console.log(dataobat_id);

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        td = event.target.parentNode;
        tr = td.parentNode;
        kode_obat = tr.querySelector('#kode_obat')
        jumlah = tr.querySelector('#jumlah')
        $.ajax({
        url: '/data/' + dataobat_id,
        method: "get",
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response) {
             $(kode_obat).val(response.kode_obat)
            $(jumlah).val(response.jumlah)
            // $("#jumlah").val(response.jumlah)
            }
        });
    }

    function pasienfill(){
        var pasien_id = $("#pasien_id").val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
        url: '/temp/' + pasien_id,
        method: "get",
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response) {
                $("#nama_pasien").val(response.nama)
            }
        });
    }

    $('document').ready(function() {
        $('#dataObatKeluarBaru').click(function() {
            $("#obtklr_tb").append('<tr><td><select class="form-select dataobat @error("dataobat_id") is-invalid @enderror" name="dataobat_id[]" required id="dataobat_id" onclick=autofill()><option disabled>Masukan Nama Obat</option>@foreach($dataobats as $dataobat)<option value="{{ $dataobat->kode_obat }}" id="dataobat_id">{{ $dataobat->nama_obat }}</option>@endforeach</select></td><td width="130px"><input type="text" readonly name="kode_obat_id[]" id="kode_obat" class="form-control @error("kode_obat_id") is-invalid @enderror" required value="{{ old("kode_obat_id") }}" onkeyup="autofill()"></td><td width="100px"><input type="number"  name="jumlah" class="form-control @error("jumlah") is-invalid @enderror" id="jumlah" readonly required value="{{ old("jumlah") }}" ></td><td width="100px"><input type="number" name="jumlah_keluar[]" class="form-control @error("jumlah_keluar") is-invalid @enderror" required value="{{ old("jumlah_keluar") }}" ></td><td><button class="btn btn-danger btn-sm border-0"><i class="bi bi-trash-fill" id="deleteRow"></i></button></td></tr>');
        });
       
        })
        
</script>
@endsection
