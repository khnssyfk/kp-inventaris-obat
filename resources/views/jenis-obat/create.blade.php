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
        <h3>Tambah Jenis Obat</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/jenis-obat">Jenis Obat</a></li>
                <li class="breadcrumb-item active">Tambah Jenis Obat</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Jenis Obat</h4>
            <a  class="btn btn-primary mt-1 ms-1" onclick=JenisObatBaru(event)><i class="bi bi-plus-lg"></i> Tambah Data</a>

    </div>
    <div class="card-body">
        <form action="/jenis-obat" method="post" id="jenisobat-form">
            @csrf 
        <div class="row" id="fieldjenis">
            {{-- <div class="col-md-6 col-12"> --}}
                <div class="form-group col-md-6 col-12">
                    <label for="jenis_obat" class="sr-only">Jenis Obat</label>
                    <input type="text" placeholder="Masukkan jenis Obat" name="jenis_obat[]" class="form-control @error('jenis_obat') is-invalid @enderror" required value="{{ old('jenis_obat') }}">
                    @error('jenis_obat')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="keterangan" class="sr-only">Keterangan</label>
                    <input type="text" placeholder="Masukkan Keterangan" name="keterangan[]" class="form-control @error('keterangan') is-invalid @enderror" required value="{{ old('keterangan') }}">
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
            {{-- </div> --}}
            {{-- <input type="hidden" name="jumlah"  required value=0> --}}

        </div>
                <button class="btn btn-success float-end mt-2 new-user-btn">Simpan</button>

        
        </form>
    </div>
</div>
<script>

</script>
@endsection