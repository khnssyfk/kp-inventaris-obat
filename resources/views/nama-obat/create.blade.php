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
        <h3>Tambah Data Obat Baru</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/nama-obat">Data Obat</a></li>
                <li class="breadcrumb-item active">Tambah Data Obat Baru</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Data Obat</h4>
            <a  class="btn btn-primary mt-1 ms-1" onclick=dataObatBaru(event)><i class="bi bi-plus-lg"></i> Tambah Data</a>

    </div>
    <div class="card-body">
        <form action="/nama-obat" method="post" id="namaobat-form">
            @csrf 
        <div class="row" id="fieldobat">
            {{-- <div class="col-md-6 col-12"> --}}
                <div class="form-group col-md-6 col-12">
                    <label for="nama_obat" class="sr-only">Nama Obat</label>
                    <input type="text" placeholder="Masukkan Nama Obat" name="nama_obat[]" class="form-control @error('nama_obat') is-invalid @enderror" required value="{{ old('nama_obat') }}">
                    @error('nama_obat')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
            {{-- </div> --}}
            {{-- <input type="hidden" name="jumlah"  required value=0> --}}

                <div class="form-group col-md-6 col-12">
                    <label for="satuan" class="sr-only">Satuan</label>
                    <select class="form-select @error('satuan') is-invalid @enderror" name="satuan[]" required>
                        <option value="Botol">Botol</option>
                        <option value="Kaplet">Kapsul</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Tablet">Kaplet</option>
                        <option value="Tube">Tube</option>
                        <option value="Suppository">Suppository</option>

                    </select>
                    @error('satuan')
                    <div class="invalid-feedback">
                        Masukan Satuan
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