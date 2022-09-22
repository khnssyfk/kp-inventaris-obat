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
                <li class="breadcrumb-item"><a href="/satuan-obat">Satuan & Kemasan Obat</a></li>
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
                <div class="form-group col-md-6 col-12">
                    <label for="keterangan" class="sr-only">Kemasan Obat</label>
                    <input type="text" placeholder="Masukkan Kemasan Obat" name="keterangan[]" class="form-control @error('keterangan') is-invalid @enderror" required value="{{ old('keterangan') }}">
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="jumlah" class="sr-only">Jumlah Butir/Botol</label>
                    <input type="text" placeholder="Masukkan Jumlah Butir/Botol" name="jumlah[]" class="form-control @error('jumlah') is-invalid @enderror" required value="{{ old('jumlah') }}">
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

</script>
@endsection