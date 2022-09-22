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
        <h3>Tambah Satuan Obat</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/satuan-obat">Satuan Obat</a></li>
                <li class="breadcrumb-item active">Tambah Satuan Obat</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Satuan Obat</h4>
            <a  class="btn btn-primary mt-1 ms-1" onclick=SatuanObatBaru(event)><i class="bi bi-plus-lg"></i> Tambah Data</a>

    </div>
    <div class="card-body">
        <form action="/satuan-obat" method="post" id="satuanobat-form">
            @csrf 
        <div class="row" id="fieldsatuan">
            {{-- <div class="col-md-6 col-12"> --}}
                <div class="form-group col-md-6 col-12">
                    <label for="satuan_obat" class="sr-only">Satuan Obat</label>
                    <input type="text" placeholder="Masukkan Satuan Obat" name="satuan_obat[]" class="form-control @error('satuan_obat') is-invalid @enderror" required value="{{ old('satuan_obat') }}">
                    @error('satuan_obat')
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