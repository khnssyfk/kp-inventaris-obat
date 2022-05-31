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
        <h3>Tambah User Baru</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/data-user">Data User</a></li>
                <li class="breadcrumb-item active">Tambah User Baru</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Data Obat</h4>
    </div>
    <div class="card-body">
        <form action="/nama-obat" method="post" id="namaobat-form">
            @csrf 
            {{-- @method('PUT') --}}
                <div class="row">

                
                <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="nama_obat" class="sr-only">Nama Obat</label>
                    <input type="text" placeholder="Masukkan Nama Obat" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror" required value="{{ old('nama_obat') }}">
                    @error('nama_obat')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-12">

            
                <div class="form-group">
                    <label for="satuan" class="sr-only">Satuan</label>
                    <select class="form-select @error('satuan') is-invalid @enderror" name="satuan" required>
                        <option value="Strip">Strip</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Botol">Botol</option>
                        <option value="Ampul">Ampul</option>
                        <option value="Vial">Vial</option>

                      </select>
                      @error('satuan')
                      <div class="invalid-feedback">
                          Masukan Satuan
                      </div>
                      @enderror
                </div>
            </div>
        </div>
                <button class="btn btn-primary float-end mt-2 new-user-btn">Simpan</button>

        
        </form>
    </div>
</div>
<script>

</script>
@endsection