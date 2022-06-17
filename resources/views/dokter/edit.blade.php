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
        <h3>Edit Data Dokter</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/data-dokter">Data Dokter</a></li>
                <li class="breadcrumb-item active">Edit Data Dokter</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Data Obat</h4>
    </div>
    <div class="card-body">
        <form action="/data-dokter/{{ $dokter->id }}" method="post">
            @csrf 
            @method('PUT')
        <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label for="nama" class="sr-only">Nama</label>
                    <input type="text" placeholder="Masukkan Nama Obat" name="nama" class="form-control @error('nama') is-invalid @enderror" readonly value="{{ old('nama', $dokter->user->nama) }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="no_hp" class="sr-only">No Hp</label>
                    <input type="text" placeholder="Masukkan Nama Obat" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" readonly value="{{ old('no_hp', $dokter->user->no_hp) }}">
                    @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="tgl_lahir" class="sr-only">Tanggal Lahir</label>
                    <input type="date" placeholder="Masukkan Tanggal Lahir" name="tgl_lahir" autocomplete="off" class="form-control @error('tgl_lahir') is-invalid @enderror" required value="{{ old('tgl_lahir') }}">
                    @error('tgl_lahir')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="sip" class="sr-only">SIP</label>
                    <input type="text" placeholder="Masukkan SIP" name="sip" class="form-control @error('sip') is-invalid @enderror" required value="{{ old('sip', $dokter->sip) }}">
                    @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="spesialis" class="sr-only">Spesialis</label>
                    <input type="text" placeholder="Masukkan Spesialis" name="spesialis" class="form-control @error('spesialis') is-invalid @enderror" required value="{{ old('spesialis', $dokter->spesialis) }}">
                    @error('spesialis')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="alamat" class="sr-only">Alamat</label>
                    <input type="text" placeholder="Masukkan Alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" required value="{{ old('alamat', $dokter->alamat) }}">
                    @error('alamat')
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
