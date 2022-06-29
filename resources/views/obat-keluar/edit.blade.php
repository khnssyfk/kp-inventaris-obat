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

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Riwayat Obat Keluar</h4>
    </div>
    <div class="card-body">
        <form action="/obat-keluar/{{ $obat_keluars->id }}" method="post">
            @csrf 
        <div class="row">
            <div class="form-group col-md-6 col-12">
                <label for="pasien_id" class="sr-only ">No RM</label>
                {{-- <input type="text" placeholder="Masukkan No RM" name="pasien_id" id="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror" required value="{{ old('pasien_id') }}"> --}}
                <select class="form-select @error('pasien_id') is-invalid @enderror" name="pasien_id" required id="pasien_id" onclick="pasienfill()">
                    <option value="">Masukan No RM</option>
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
                    <option value="">Masukan Nama Dokter</option>
                    @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}" id="dokter_id">{{ $dokter->user->nama }}</option>
                    
                    @endforeach
                </select>
                @error('dataobat_id')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
                @enderror
            </div>
                <div class="form-group col-md-6 col-12">
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
                </div>
                <div class="form-group col-md-6 col-12">
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
                    <input type="number" placeholder="Masukkan Jumlah" name="jumlah_keluar" class="form-control @error('jumlah_keluar') is-invalid @enderror" onkeyup="autofill()" required value="{{ old('jumlah_keluar',$obat_keluars->jumlah_keluar) }}" >
                    @error('jumlah_keluar')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="tgl_keluar" class="sr-only">Tanggal Keluar</label>
                    <input type="date" placeholder="Masukkan Tanggal Keluar" id="startdateId" name="tgl_keluar" class="form-control @error('tgl_keluar') is-invalid @enderror" required value="{{ old('tgl_keluar',$obat_keluars->tgl_keluar) }}">
                    @error('tgl_keluar')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                
        </div>
        <button class="btn btn-primary mt-2">Simpan</button>
        
    </form>
</div>
</div>

    <script type="text/javascript">
        function autofill(){
            var dataobat_id = $("#dataobat_id").val();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            
            $.ajax({
            url: '/data/' + dataobat_id,
            method: "get",
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                 $("#kode_obat").val(response.kode_obat)
                $("#satuan").val(response.satuan)
                $("#jumlah").val(response.jumlah)
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
    </script>
    @endsection