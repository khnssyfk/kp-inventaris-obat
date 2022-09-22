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
        <h3>Edit Satuan Obat</h3>
        {{-- <p class="text-subtitle text-muted">Satuan Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/nama-obat">Satuan Obat</a></li>
                <li class="breadcrumb-item active">Edit Satuan Obat</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Satuan Obat</h4>
    </div>
    <div class="card-body">
        <form action="/satuan-obat/{{ $satuan_obat->kode_satuan }}" method="post" id="namaobat-form">
            @csrf 
            @method('PUT')
        <div class="row" id="fieldobat">
                <div class="form-group col-md-6 col-12">
                    <label for="satuan_obat" class="sr-only">Satuan Obat</label>
                    <input type="text" placeholder="Masukkan Satuan Obat" name="satuan_obat" class="form-control @error('satuan_obat') is-invalid @enderror" required value="{{ old('satuan_obat', $satuan_obat->satuan_obat) }}">
                    @error('satuan_obat')
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