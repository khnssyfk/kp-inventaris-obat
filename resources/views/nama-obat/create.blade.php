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
            <a  class="btn btn-primary mt-1 ms-1" onclick="dataObatBaru(event)"><i class="bi bi-plus-lg"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <form action="/nama-obat" method="post" id="namaobat-form">
            @csrf 
        <div class="container" id="container">
            <div class="row" id="fieldobat">
                <div class="form-group col-4">
                    <label for="nama_obat" class="sr-only">Nama Obat</label>
                    <input type="text" placeholder="Masukkan Nama Obat" name="nama_obat[]" class="form-control @error('nama_obat') is-invalid @enderror" required value="{{ old('nama_obat') }}">
                    @error('nama_obat')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="berat_obat" class="sr-only">Dosis</label>
                    <input type="number" placeholder="Masukkan Dosis" name="berat_obat[]" class="form-control @error('berat_obat') is-invalid @enderror" required value="{{ old('berat_obat') }}">
                    @error('berat_obat')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="satuan_berat_obat" class="sr-only">Unit</label>
                    <select name="satuan_berat_obat[]" id="" class="form-select @error('satuan') is-invalid @enderror">
                        <option value="gr">gr</option>
                        <option value="ml">ml</option>
                        <option value="mg">mg</option>
                        <option value="µg">µg</option>
                    </select>
                    @error('satuan_berat_obat')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="merk_obat" class="sr-only">Merk</label>
                    <input type="text" placeholder="cth: (YUSIMOX)" name="merk_obat[]" formnovalidate class="form-control @error('merk_obat') is-invalid @enderror" value="{{ old('merk_obat') }}">
                    @error('merk_obat')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>

        </div>
        <div class="row" id="fieldobat">
            {{-- <div class="form-group col-5">
                <label for="bentuk_obat_id" class="sr-only">Bentuk Obat</label>
                <select class="form-select @error('bentuk') is-invalid @enderror" name="bentuk_obat_id[]" required>
                    @foreach($bentuks as $bentuk)
                      @if(old('bentuk_obat_id')== $bentuk->kode_bentuk)
                        <option value="{{ $bentuk->kode_bentuk }}" selected>{{ $bentuk->bentuk_obat }}</option>
                      @else
                        <option value="{{ $bentuk->kode_bentuk }}">{{ $bentuk->bentuk_obat }}</option>
                      @endif
                    @endforeach
                </select>
                @error('bentuk')
                <div class="invalid-feedback">
                    Masukan Bentuk Obat
                </div>
                @enderror
            </div> --}}
            <div class="form-group col">
                <label for="kemasan_obat_id" class="sr-only">Kemasan Obat</label>
                <select class="form-select @error('kemasan_obat_id') is-invalid @enderror" name="kemasan_obat_id[]" required>
                    @foreach($kemasan_obats as $kemasan_obat)
                      @if(old('kemasan_obat_id')== $kemasan_obat->kode_kemasan)
                        <option value="{{ $kemasan_obat->kode_kemasan }}" selected>{{ $kemasan_obat->keterangan }} {{$kemasan_obat->bentukobat->bentuk_obat}}</option>
                      @else
                        <option value="{{ $kemasan_obat->kode_kemasan }}">{{ $kemasan_obat->keterangan }} {{$kemasan_obat->bentukobat->bentuk_obat}}</option>
                      @endif
                    @endforeach

                </select>
                @error('kemasan_obat_id')
                <div class="invalid-feedback">
                    Masukan Kemasan
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="jenis_obat_id" class="sr-only">Jenis</label>
                <select class="form-select @error('jenis_obat_id') is-invalid @enderror" name="jenis_obat_id[]" required>
                    @foreach($jenis_obats as $jenis_obat)
                      @if(old('jenis_obat_id')== $jenis_obat->kode_jenis)
                        <option value="{{ $jenis_obat->kode_jenis }}" selected>{{ $jenis_obat->jenis_obat }}</option>
                      @else
                        <option value="{{ $jenis_obat->kode_jenis }}">{{ $jenis_obat->jenis_obat }}</option>
                      @endif
                    @endforeach

                </select>
                @error('jenis_obat_id')
                <div class="invalid-feedback">
                    Masukan Jenis Obat
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
    function dataObatBaru(event){
        // alert('loop')
        var divRow1 = document.createElement('div')
        divRow1.classList.add('row');
        var divRow2 = document.createElement('div')
        divRow2.classList.add('row');

        var divNama = document.createElement('div');
        divNama.className ='form-group col-5';
        divNama.innerHTML = '<label for="nama_obat" class="sr-only">Nama Obat</label> <input type="text" placeholder="Masukkan Nama Obat" name="nama_obat[]" class="form-control @error("nama_obat") is-invalid @enderror" required>';
        divBerat = document.createElement('div');
        divBerat.className = 'form-group col'
        divBerat.innerHTML = `<label for="berat_obat" class="sr-only">Dosis</label><input type="number" placeholder="Masukkan Dosis" name="berat_obat[]" class="form-control @error('berat_obat') is-invalid @enderror" required value="{{ old('berat_obat') }}"> @error('berat_obat') <div class="invalid-feedback">{{ $message}}</div>@enderror`
       
        divSatuanBerat = document.createElement('div');
        divSatuanBerat.className = 'form-group col'
        divSatuanBerat.innerHTML = `<label for="satuan_berat_obat" class="sr-only">Unit</label><select name="satuan_berat_obat[]" id="" class="form-select @error('satuan') is-invalid @enderror"><option value="gr">gr</option><option value="ml">ml</option><option value="mg">mg</option><option value="µg">µg</option></select>@error('satuan_berat_obat')<div class="invalid-feedback">{{ $message}}</div>@enderror`

        divMerk = document.createElement('div');
        divMerk.className = 'form-group col'
        divMerk.innerHTML = `<label for="merk_obat" class="sr-only">Merk</label><input type="text" placeholder="cth: (YUSIMOX)"  name="merk_obat[]" class="form-control @error('merk_obat') is-invalid @enderror" value="{{ old('merk_obat') }}">@error('merk_obat')<div class="invalid-feedback">{{ $message}}</div>@enderror`

        var divKemasan = document.createElement('div');
        divKemasan.className ='form-group col'
        divKemasan.innerHTML = `<label for="kemasan_obat_id" class="sr-only">Kemasan Obat</label><select class="form-select @error('kemasan_obat_id') is-invalid @enderror" name="kemasan_obat_id[]" required>@foreach($kemasan_obats as $kemasan_obat) @if(old('kemasan_obat_id') == $kemasan_obat->id)<option value="{{ $kemasan_obat->id }}" selected>{{ $kemasan_obat->keterangan }} {{ $kemasan_obat->bentukobat->bentuk_obat }} </option>@else <option value="{{ $kemasan_obat->id }}">{{ $kemasan_obat->keterangan }} {{ $kemasan_obat->bentukobat->bentuk_obat }} </option>@endif @endforeach</select> @error('kemasan_obat_id') <div class="invalid-feedback">{{ $message}}</div>@enderror`
        

        var divJenis = document.createElement('div');
        divJenis.className ='form-group col'
        divJenis.innerHTML = `<label for="jenis_obat_id" class="sr-only">Jenis</label> <select class="form-select @error('jenis_obat_id') is-invalid @enderror" name="jenis_obat_id[]" required> @foreach($jenis_obats as $jenis_obat) @if(old('jenis_obat_id')== $jenis_obat->kode_jenis) <option value="{{ $jenis_obat->kode_jenis }}" selected>{{ $jenis_obat->jenis_obat }}</option>@else <option value="{{ $jenis_obat->kode_jenis }}">{{ $jenis_obat->jenis_obat }}</option>@endif @endforeach </select> @error('jenis_obat_id') <div class="invalid-feedback"> Masukan Jenis Obat </div> @enderror`

        divRow1.appendChild(divNama)
        divRow1.appendChild(divBerat)
        divRow1.appendChild(divSatuanBerat)
        divRow1.appendChild(divMerk)
        document.getElementById('container').appendChild(divRow1)
        // divRow2.appendChild(divBentuk)
        divRow2.appendChild(divKemasan)
        divRow2.appendChild(divJenis)
        document.getElementById('container').appendChild(divRow2)

    }
</script>
@endsection