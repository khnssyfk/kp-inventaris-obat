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
        <h3>Edit Riwayat Obat Masuk</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/obat-masuk">Data Obat Masuk</a></li>
                <li class="breadcrumb-item active">Edit Riwayat Obat Masuk</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Riwayat Obat Masuk</h4>
    </div>
    <div class="card-body">
        <form action="/obat-masuk/{{ $obatmasuk->id }}" method="post">
            @csrf 
            @method('PUT')
        <div class="row" id="obatMasuk">
                <div class="form-group col-md-6 col-12">
                    <label for="data_obat_id" class="sr-only ">Nama Obat</label>
                    <select class="form-select @error('data_obat_id') is-invalid @enderror" name="data_obat_id" required id="data_obat_id" onclick="autofill()">
                        <option value="">Masukan Nama Obat</option>
                        @foreach($data_obats as $data_obat)
                            @if(old('data_obat_id', $data_obat->kode_obat)==$obatmasuk->data_obat_id)
                                <option value="{{ $data_obat->kode_obat}}" selected id="data_obat_id" onclick="autofill()">{{ $data_obat->nama_obat }}</option>
                            @else
                            <option value="{{ $data_obat->kode_obat}}" id="data_obat_id" onclick="autofill()">{{ $data_obat->nama_obat }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('data_obat_id')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="kode_obat_id" class="sr-only">Kode Obat</label>
                    <input type="text" disabled placeholder="Masukkan Kode Obat" name="kode_obat_id" id="kode_obat" class="form-control @error('kode_obat_id') is-invalid @enderror" required value="{{ old('kode_obat_id',$obatmasuk->dataobat->kode_obat) }}" onkeyup="autofill()">
                    @error('kode_obat_id')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="jumlah" class="sr-only">Jumlah</label>
                    <input type="number" placeholder="Masukkan Jumlah" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" required value="{{ old('jumlah',$obatmasuk->jumlah) }}" >
                    @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="satuan" class="sr-only">Satuan</label>
                    <select class="form-select @error('satuan') is-invalid @enderror" disabled id="satuan" onclick="autofill()" name="satuan" required onkeyup="autofill()">
                        @foreach($data_obats as $data_obat)
                            @if(old('data_obat_id', $data_obat->satuan)==$obatmasuk->dataobat->satuan)
                                <option value="{{ $data_obat->satuan}}" selected id="data_obat_id" onclick="autofill()">{{ $data_obat->satuan }}</option>
                            @else
                                <option value="Strip" id="satuan" onclick="autofill()">Strip</option>
                                <option value="Tablet" id="satuan" onclick="autofill()">Tablet</option>
                                <option value="Botol" id="satuan" onclick="autofill()">Botol</option>
                                <option value="Ampul" id="satuan" onclick="autofill()">Ampul</option>
                                <option value="Vial" id="satuan" onclick="autofill()">Vial</option>
                            @endif
                        @endforeach

                    </select>
                    @error('satuan')
                    <div class="invalid-feedback">
                        Masukkan Satuan
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="nama_apotek" class="sr-only">Supplier</label>
                    <input type="text" placeholder="Masukkan Supplier" name="nama_apotek" class="form-control @error('nama_apotek') is-invalid @enderror" required value="{{ old('nama_apotek',$obatmasuk->nama_apotek) }}">
                    @error('nama_apotek')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="harga" class="sr-only">Harga</label>
                    <input type="number" placeholder="Masukkan Harga" name="harga" class="form-control @error('harga') is-invalid @enderror" required value="{{ old('harga',$obatmasuk->harga) }}">
                    @error('harga')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="tgl_masuk" class="sr-only">Tanggal Masuk</label>
                    <input type="date" placeholder="Masukkan Nama Obat" id="startdateId" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror" required value="{{ old('tgl_masuk',$obatmasuk->tgl_masuk) }}">
                    @error('tgl_masuk')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="expired" class="sr-only">Expired</label>
                    <input type="date" placeholder="Masukkan Nama Obat" name="expired" autocomplete="off" class="form-control @error('expired') is-invalid @enderror" required value="{{ old('expired',$obatmasuk->expired) }}">
                    @error('expired')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                
                
        </div>
        <button class="btn btn-primary mt-2" name="action" value="add" id="add">Simpan</button>
        
    </form>
    {{-- <button class="btn btn-primary mt-2" name="action" value="add" id="add"><a href="/"></a>Tambah</button> --}}
    
    </div>
</div>
<script type="text/javascript">
    function autofill(){
        var data_obat_id = $("#data_obat_id").val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
        url: '/data/' + data_obat_id,
        method: "get",
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response) {
             $("#kode_obat").val(response.kode_obat)
            $("#satuan").val(response.satuan)
            }
        });
    }
</script>
@endsection
