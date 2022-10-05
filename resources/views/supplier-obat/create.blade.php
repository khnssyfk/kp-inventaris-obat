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
        <h3>Tambah Supplier</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/supplier-obat">Data Supplier Obat</a></li>
                <li class="breadcrumb-item active">Tambah Supplier</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Supplier Obat</h4>
            <a  class="btn btn-primary mt-1 ms-1" onclick="dataSupplierBaru(event)"><i class="bi bi-plus-lg"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <form action="/supplier-obat" method="post" id="supplier-form">
            @csrf 
        <div class="container" id="container">
            <div class="row" id="fieldsupplier">
                <div class="form-group col-5">
                    <label for="nama_supplier" class="sr-only">Nama Supplier</label>
                    <input type="text" placeholder="Masukkan Nama supplier" name="nama_supplier[]" class="form-control @error('nama_supplier') is-invalid @enderror" required value="{{ old('nama_supplier') }}">
                    @error('nama_supplier')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="alamat" class="sr-only">Alamat</label>
                    <input type="text" placeholder="Masukkan Alamat" name="alamat[]" class="form-control @error('alamat') is-invalid @enderror" required value="{{ old('alamat') }}">
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="no_hp" class="sr-only">No Telp</label>
                    <input type="number" placeholder="Masukkan No Telp" name="no_hp[]" class="form-control @error('no_hp') is-invalid @enderror" required value="{{ old('no_hp') }}">
                    @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
        </div>
        </div>
                <button class="btn btn-success float-end mt-2 new-user-btn">Simpan</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    function dataSupplierBaru(event){
        // alert('loop')
        event.preventDefault();
        var divRow1 = document.createElement('div')
        divRow1.classList.add('row');
        var divNama = document.createElement('div');
        divNama.className ='form-group col-5'
        divNama.innerHTML = '<label for="nama_supplier" class="sr-only">Nama Supplier</label><input type="text" placeholder="Masukkan Nama supplier" name="nama_supplier[]" class="form-control @error('nama_supplier') is-invalid @enderror" required>@error('nama_supplier')<div class="invalid-feedback">{{ $message}}</div>@enderror'
        var divAlamat = document.createElement('div');
        divAlamat.className ='form-group col'
        divAlamat.innerHTML = '<label for="alamat" class="sr-only">Alamat</label><input type="text" placeholder="Masukkan Alamat" name="alamat[]" class="form-control @error('alamat') is-invalid @enderror" required >@error("alamat")<div class="invalid-feedback">{{ $message}}</div>@enderror'
        var divTelp = document.createElement('div');
        divTelp.className ='form-group col'
        divTelp.innerHTML = '<label for="no_hp" class="sr-only">No Telp</label><input type="number" placeholder="Masukkan No Telp" name="no_hp[]" class="form-control @error('no_hp') is-invalid @enderror" required>@error('no_hp')<div class="invalid-feedback">{{ $message}}</div>@enderror'
        divRow1.appendChild(divNama)
        divRow1.appendChild(divAlamat)
        divRow1.appendChild(divTelp)
        document.getElementById('container').appendChild(divRow1)

    }
</script>
@endsection