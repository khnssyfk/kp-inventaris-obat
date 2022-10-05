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
        <h3>Tambah Kemasan Obat</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/bentuk-obat">Bentuk & Kemasan Obat</a></li>
                <li class="breadcrumb-item active">Tambah Kemasan Obat</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Kemasan Obat</h4>
            <a  class="btn btn-primary mt-1 ms-1" onclick=KemasanObatBaru(event)><i class="bi bi-plus-lg"></i> Tambah Data</a>

    </div>
    <div class="card-body">
        <form action="/kemasan-obat" method="post" id="kemasanobat-form">
            @csrf 
        <div class="row" id="fieldkemasan">
            {{-- <div class="col-md-6 col-12"> --}}
                <div class="form-group col-5">
                    <label for="keterangan" class="sr-only">Kemasan Obat</label>
                    <input type="text" placeholder="cth: 1 strip isi 10" name="keterangan[]" class="form-control @error('keterangan') is-invalid @enderror" required value="{{ old('keterangan') }}">
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="bentuk_obat_id" class="sr-only">Bentuk Obat</label>
                    <select class="form-select @error('bentuk') is-invalid @enderror" name="bentuk_obat_id[]" required>
                        @foreach($bentuk_obats as $bentuk_obat)
                        @if(old('bentuk_obat_id')== $bentuk_obat->kode_bentuk)
                            <option value="{{ $bentuk_obat->kode_bentuk }}" selected>{{ $bentuk_obat->bentuk_obat }}</option>
                        @else
                            <option value="{{ $bentuk_obat->kode_bentuk }}">{{ $bentuk_obat->bentuk_obat }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('bentuk')
                    <div class="invalid-feedback">
                        Masukan Bentuk
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="jumlah" class="sr-only">Jumlah Isi Kemasan</label>
                    <input type="text" placeholder="Jumlah Isi Kemasan" name="jumlah[]" class="form-control @error('jumlah') is-invalid @enderror" required value="{{ old('jumlah') }}">
                    @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
            
        </div>
                <button class="btn btn-success float-end mt-2 new-user-btn">Simpan</button>

        
        </form>
    </div>
</div>
<script>
function KemasanObatBaru(event){
    event.preventDefault();
    var divKemasan = document.createElement('div');
    divKemasan.className ='form-group col-5'
    divKemasan.innerHTML = '<label for="keterangan" class="sr-only">Kemasan Obat</label> <input type="text" placeholder="Masukkan Kemasan Obat" name="keterangan[]" class="form-control @error("keterangan") is-invalid @enderror" required>'
    var divJumlah = document.createElement('div');
    divJumlah.className ='form-group col'
    divJumlah.innerHTML = '<label for="jumlah" class="sr-only">Jumlah Butir/Botol</label> <input type="text" placeholder="Masukkan Jumlah Butir/Botol" name="jumlah[]" class="form-control @error("jumlah") is-invalid @enderror" required>'
    var divBentuk = document.createElement('div');
        divBentuk.className ='form-group col'
        divBentuk.innerHTML = `<label for="bentuk_obat_id" class="sr-only">Bentuk Obat</label><select class="form-select" name="bentuk_obat_id[]" required> @foreach($bentuk_obats as $bentuk_obat)@if(old('bentuk_obat_id')== $bentuk_obat->kode_bentuk)<option value="{{ $bentuk_obat->kode_bentuk }}" selected>{{ $bentuk_obat->bentuk_obat }}</option>@else<option value="{{ $bentuk_obat->kode_bentuk }}">{{ $bentuk_obat->bentuk_obat }}</option>@endif @endforeach</select>`

    document.getElementById('fieldkemasan').appendChild(divKemasan)
    document.getElementById('fieldkemasan').appendChild(divBentuk)
    document.getElementById('fieldkemasan').appendChild(divJumlah)

}
</script>
@endsection