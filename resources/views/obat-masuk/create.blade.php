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
        <h4 class="card-title">Tambah Riwayat Obat Masuk</h4>
    </div>
    <div class="card-body">
        <form action="/obat-masuk" method="post">
            @csrf 
        <div class="container">
            <div class="row" id="obatMasuk">
                <div class="form-group col-md-6 col-12">
                    <label for="data_obat_id" class="sr-only ">Nama Obat</label>
                    <select class="form-select @error('data_obat_id') is-invalid @enderror" name="data_obat_id" required id="data_obat_id" onclick="autofill()">
                        <option value="">Masukan Nama Obat</option>
                        @foreach($data_obats as $data_obat)
                        <option value="{{ $data_obat->kode_obat }}" id="data_obat_id" onclick="autofill()">{{ $data_obat->nama_obat }} {{ $data_obat->berat_obat }} {{ $data_obat->satuan_berat_obat }} {{ $data_obat->merk_obat }}</option>
                        
                        @endforeach
                    </select>
                    @error('data_obat_id')
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
                    <label for="jumlah" class="sr-only">Jumlah Strip/Botol Masuk</label>
                    <input type="number" placeholder="Masukkan Jumlah Strip/Botol Masuk" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" required id='jumlah' value="{{ old('jumlah') }}"  onkeyup="totalfill()">
                    @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="kemasan" class="sr-only">Kemasan</label>
                    <input type="text" placeholder="Masukkan Kemasan" class="form-control @error('kemasan') is-invalid @enderror" disabled id="kemasan" onclick="autofill()" name="kemasan" required onkeyup="autofill()">
                    @error('kemasan')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="total" class="sr-only">Total</label>
                    <input type="text" placeholder="Masukkan Total" class="form-control @error('total') is-invalid @enderror" id="total" onclick="totalfill()" name="total" required onkeyup="totalfill()">

                    @error('total')
                    <div class="invalid-feedback">
                        Masukkan total
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="satuan" class="sr-only">Bentuk Obat</label>
                    <input type="text" placeholder="Masukkan Satuan" class="form-control @error('satuan') is-invalid @enderror" disabled id="satuan" name="satuan" required onkeyup="autofill()">

                    @error('satuan')
                    <div class="invalid-feedback">
                        Masukkan Satuan
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="supplier_obat_id" class="sr-only">Supplier</label>
                    <select class="form-select @error('supplier_obat_id') is-invalid @enderror" name="supplier_obat_id" required id="supplier_obat_id">
                    
                    <option value="">Masukan Supplier</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->kode_supplier }}" id="supplier_id">{{ $supplier->nama_supplier }}</option>
                        
                        @endforeach
                    </select>
                    @error('supplier_obat_id')
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
                    <input type="date" placeholder="Masukkan Tanggal Masuk" id="startdateId" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror" required value="{{ old('tgl_masuk') }}">
                    @error('tgl_masuk')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="expired" class="sr-only">Expired</label>
                    <input type="date" placeholder="Masukkan Expired" name="expired" autocomplete="off" class="form-control @error('expired') is-invalid @enderror" required value="{{ old('expired') }}">
                    @error('expired')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                
                
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
                            <th scope="col-2">Jum Strip/Botol Masuk</th> 
                            <th scope="col">Total</th> 
                            <th scope="col">Bentuk Obat</th> 
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
                                <td>{{ $obat_masuk->dataobat->nama_obat }} {{ $obat_masuk->dataobat->berat_obat }} {{ $obat_masuk->dataobat->satuan_berat_obat }} {{ $data_obat->merk_obat }}</td>
                                <td>{{ $obat_masuk->jumlah}}</td>
                                <td>{{ $obat_masuk->total}}</td>
                                <td>{{ $obat_masuk->dataobat->kemasan_obat->bentukobat->bentuk_obat}}</td>
                                <td>{{ $obat_masuk->supplier->nama_supplier}}</td>
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
        var data_obat_id = $("#data_obat_id").val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
        url: '/data/' + data_obat_id,
        method: "get",
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response) {
            $("#kode_obat").val(response.kode_obat)
            $("#satuan").val(response.satuan)
            $("#kemasan").val(response.sum)
            }
        });
    }
    function totalfill(){
        var data_obat_id = $("#data_obat_id").val();
        var jumlah = parseInt($("#jumlah").val());
        // var total = $("#total").val();
        // var sum = 1+1;
        // $("#total").val(sum)
        // alert(jumlah)
        $.ajax({
        url: '/data/' + data_obat_id,
        method: "get",
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response) {
            var sum = jumlah * parseInt(response.isikemasan)
            // alert(sum
            $("#total").val(sum)
            }
        });
        
    }
</script>
@endsection
