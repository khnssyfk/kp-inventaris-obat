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
        <h3>Tambah Bentuk Obat</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/bentuk-obat">Bentuk Obat</a></li>
                <li class="breadcrumb-item active">Tambah Bentuk Obat</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Bentuk Obat</h4>
            <a  class="btn btn-primary mt-1 ms-1" onclick=BentukObatBaru(event)><i class="bi bi-plus-lg"></i> Tambah Data</a>

    </div>
    <div class="card-body">
        <form action="/bentuk-obat" method="post" id="bentukobat-form">
            @csrf 
        <div class="row" id="fieldbentuk">
            {{-- <div class="col-md-6 col-12"> --}}
                <div class="form-group col-md-6 col-12">
                    <label for="bentuk_obat" class="sr-only">Bentuk Obat</label>
                    <input type="text" placeholder="Masukkan Bentuk Obat" name="bentuk_obat[]" class="form-control @error('bentuk_obat') is-invalid @enderror" required value="{{ old('bentuk_obat') }}">
                    @error('bentuk_obat')
                    <div class="invalid-feedback">
                        Bentuk Obat Sudah Ada
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