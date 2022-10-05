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
        <h3>Edit Bentuk Obat</h3>
        {{-- <p class="text-subtitle text-muted">Bentuk Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/bentuk-obat">Bentuk Obat</a></li>
                <li class="breadcrumb-item active">Edit Bentuk Obat</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Bentuk Obat</h4>
    </div>
    <div class="card-body">
        <form action="/bentuk-obat/{{ $bentuk_obat->kode_bentuk }}" method="post" id="namaobat-form">
            @csrf 
            @method('PUT')
        <div class="row" id="fieldobat">
                <div class="form-group col-md-6 col-12">
                    <label for="bentuk_obat" class="sr-only">Satuan Obat</label>
                    <input type="text" placeholder="Masukkan Satuan Obat" name="bentuk_obat" class="form-control @error('bentuk_obat') is-invalid @enderror" required value="{{ old('bentuk_obat', $bentuk_obat->bentuk_obat) }}">
                    @error('bentuk_obat')
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