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
        <h3>Tambah Riwayat Obat Masuk</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/obat-masuk">Data Obat Masuk</a></li>
                <li class="breadcrumb-item active">Tambah Riwayat Obat Masuk</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Riwayat Obat Masuk</h4>
    </div>
    <div class="card-body">
        <form action="/obat-masuk" method="post">
            @csrf 
        <div class="row" id="obatMasuk">
                <div class="form-group col-md-6 col-12">
                    <label for="dataobat_id" class="sr-only ">Nama Obat</label>
                    <select class="form-select @error('dataobat_id') is-invalid @enderror" name="dataobat_id" required id="dataobat_id" onclick="autofill()">
                        <option value="">Masukan Nama Obat</option>
                        @foreach($data_obats as $data_obat)
                        <option value="{{ $data_obat->kode_obat }}" id="dataobat_id" onclick="autofill()">{{ $data_obat->nama_obat }}</option>
                        
                        @endforeach
                    </select>
                    @error('dataobat_id')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="kode_obat_id" class="sr-only">Kode Obat</label>
                    <input type="text" readonly placeholder="Masukkan Kode Obat" name="kode_obat_id" id="kode_obat" class="form-control @error('kode_obat_id') is-invalid @enderror" required value="{{ old('kode_obat_id') }}" onkeyup="autofill()">
                    @error('kode_obat_id')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="jumlah" class="sr-only">Jumlah</label>
                    <input type="number" placeholder="Masukkan Jumlah" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" required value="{{ old('jumlah') }}" >
                    @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="satuan" class="sr-only">Satuan</label>
                    <select class="form-select @error('satuan') is-invalid @enderror" disabled id="satuan" onclick="autofill()" name="satuan" required onkeyup="autofill()">
                        <option value="Tablet" id="satuan" onclick="autofill()">Tablet</option>
                        <option value="Botol" id="satuan" onclick="autofill()">Botol</option>
                        <option value="Ampul" id="satuan" onclick="autofill()">Ampul</option>
                        <option value="Vial" id="satuan" onclick="autofill()">Vial</option>

                    </select>
                    @error('satuan')
                    <div class="invalid-feedback">
                        Masukkan Satuan
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="nama_apotek" class="sr-only">Supplier</label>
                    <input type="text" placeholder="Masukkan Supplier" name="nama_apotek" class="form-control @error('nama_apotek') is-invalid @enderror" required value="{{ old('nama_apotek') }}">
                    @error('nama_apotek')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">

                    <label class="sr-only" for="inlineFormInputGroupUsername2">Harga Beli</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="number" placeholder="Masukkan Harga" name="harga" class="form-control @error('harga') is-invalid @enderror" required value="{{ old('harga') }}">
                    @error('harga')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                    </div>                    
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="tgl_masuk" class="sr-only">Tanggal Masuk</label>
                    <input type="date" placeholder="Masukkan Nama Obat" id="startdateId" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror" required value="{{ old('tgl_masuk') }}">
                    @error('tgl_masuk')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="expired" class="sr-only">Expired</label>
                    <input type="date" placeholder="Masukkan Nama Obat" name="expired" autocomplete="off" class="form-control @error('expired') is-invalid @enderror" required value="{{ old('expired') }}">
                    @error('expired')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                
                
        </div>
        <button class="btn btn-primary mt-2" name="action" value="add" id="add"><a href="/"></a>Tambah</button>
        
    </form>
    {{-- <button class="btn btn-primary mt-2" name="action" value="add" id="add"><a href="/"></a>Tambah</button> --}}
    
    </div>
    <div class="card-body">
        
    </div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive mb-2 p-2">
                <table class="table table-striped  ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tgl Masuk</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Jumlah</th> 
                            <th scope="col">Satuan</th> 
                            <th scope="col">Apotek</th>
                            <th scope="col">Expired</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obat_masuks as $obat_masuk)
                        <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y', strtotime($obat_masuk->tgl_masuk)) }}</td>
                                <td>{{ $obat_masuk->dataobat->nama_obat }}</td>
                                <td>{{ $obat_masuk->jumlah}}</td>
                                <td>{{ $obat_masuk->dataobat->satuan}}</td>
                                <td>{{ $obat_masuk->nama_apotek}}</td>
                                <td>{{ date('d-m-Y', strtotime($obat_masuk->expired))}}</td>
                                <td>
                                    <form action="/obat-masuk-temp/{{ $obat_masuk->id }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
                                        @method("delete")
                                        @csrf
                                        <button class="btn btn-danger btn-sm border-0"><i class="bi bi-trash-fill" ></i></button>
                                    </form>                         
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <a href="/datatemp" class="btn btn-success mt-2 float-end">Simpan</a>
                {{-- <button class="btn btn-primary mt-2 float-end" name="action" value="submit" id="submit"><a href="/datatemp"></a>Simpan</button> --}}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function autofill(){
        var dataobat_id = $("#dataobat_id").val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
        url: '/data/' + dataobat_id,
        method: "get",
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response) {
             $("#kode_obat").val(response.kode_obat)
            $("#satuan").val(response.satuan)
            }
        });
    }
</script>
@endsection
