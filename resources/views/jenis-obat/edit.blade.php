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
        <h3>Edit Jenis Obat</h3>
        {{-- <p class="text-subtitle text-muted">Jenis Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/nama-obat">Jenis Obat</a></li>
                <li class="breadcrumb-item active">Edit Jenis Obat</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Jenis Obat</h4>
    </div>
    <div class="card-body">
        <form action="/jenis-obat/{{ $jenis_obat->kode_jenis }}" method="post" id="namaobat-form">
            @csrf 
            @method('PUT')
        <div class="row" id="fieldobat">
                <div class="form-group col-md-6 col-12">
                    <label for="jenis_obat" class="sr-only">Jenis Obat</label>
                    <input type="text" placeholder="Masukkan Jenis Obat" name="jenis_obat" class="form-control @error('jenis_obat') is-invalid @enderror" required value="{{ old('jenis_obat', $jenis_obat->jenis_obat) }}">
                    @error('jenis_obat')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="keterangan" class="sr-only">Keterangan</label>
                    <input type="text" placeholder="Masukkan Jenis Obat" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" required value="{{ old('keterangan', $jenis_obat->keterangan) }}">
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
         
                
           
        </div>
                <button class="btn btn-primary float-end mt-2 new-user-btn">Simpan</button>

        
        </form>
    </div>
</div>
<script>

</script>
@endsection