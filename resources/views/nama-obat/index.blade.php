@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Obat</h3>
        {{-- <p class="text-subtitle text-muted">This is the main page.</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data Obat</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                                <a href="/nama-obat/create" class="btn btn-primary mb-3 mt-1 ms-1"><i class="bi bi-plus-lg"></i> Tambah Obat Baru</a>
                                <a href="/lap-obt" target="_blank" class="btn btn-success mb-3  mx-3 mt-1 me-2"><i class="bi bi-printer-fill"></i> Cetak Data</a>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Obat</th>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Dosis</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Merk</th>
                                    <th scope="col">Jenis Obat</th>
                                    <th scope="col">Kemasan</th>
                                    <th scope="col">Bentuk Obat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_obats as $data_obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data_obat->kode_obat }}</td>
                                    <td>{{ $data_obat->nama_obat }}</td>
                                    <td>{{ $data_obat->berat_obat }}</td>
                                    <td>{{ $data_obat->satuan_berat_obat }}</td>
                                    <td>{{ $data_obat->merk_obat }}</td>
                                    <td>{{ $data_obat->jenis_obat->jenis_obat }}</td>
                                    <td>{{ $data_obat->kemasan_obat->keterangan }} {{ $data_obat->kemasan_obat->jumlah }}</td>
                                    <td>{{ $data_obat->kemasan_obat->bentukobat->bentuk_obat }}</td>
                                    <td>
                                        {{-- <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"  data-kode ="{{ $data_obat->kode_obat }}" data-nama ="{{ $data_obat->nama_obat }}" data-jenis ="{{ $data_obat->jenis_obat->jenis_obat }}" data-obat ="{{ $data_obat->satuan_obat->satuan_obat }}" data-kemasan ="{{ $data_obat->kemasan_obat->keterangan }}" data-berat ="{{ $data_obat->berat_obat }}" data-bs-target="#view_kemasan"><i class="bi bi-eye-fill"></i></button> --}}
                                        {{-- <button type="button" class="btn btn-success mb-3 mt-1 ms-2" data-bs-toggle="modal" data-bs-target="#cetakModal">
                                            <i class="bi bi-printer-fill"></i> Cetak Data
                                          </button> --}}
                                        <a href="/nama-obat/{{ $data_obat->kode_obat }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/nama-obat/{{ $data_obat->kode_obat }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
                                            @method("delete")
                                            @csrf
                                            <button class="btn btn-danger btn-sm border-0"><i class="bi bi-trash-fill" ></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="view_kemasan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Detail Data Obat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row" id="fieldobat">
                <div class="form-group col-5">
                    <label for="nama_obat" class="sr-only">Nama Obat</label>
                    <input type="text" placeholder="Masukkan Nama Obat" id="nama" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror" required >
                </div>
                <div class="form-group col">
                    <label for="berat_obat" class="sr-only">Berat Obat</label>
                    <input type="number" placeholder="Masukkan Berat Obat" id="berat" name="berat_obat" class="form-control @error('berat_obat') is-invalid @enderror" required>
                </div>
                <div class="form-group col">
                    <label for="satuan_berat_obat" class="sr-only">Satuan Berat Obat</label>
                    <select name="satuan_berat_obat" id=""  id="obat"class="form-select @error('satuan') is-invalid @enderror">
                    </select>
                </div>

        </div>
        <div class="row" id="fieldobat">
            <div class="form-group col-5">
                <label for="satuan_obat_id" class="sr-only">Satuan Terkecil</label>
                <select class="form-select @error('satuan') is-invalid @enderror" id="satuan" name="satuan_obat_id" required>
                </select>
            </div>
            <div class="form-group col">
                <label for="kemasan_obat_id" class="sr-only">Kemasan Obat</label>
                <select class="form-select @error('kemasan_obat_id') is-invalid @enderror" name="kemasan_obat_id" id="kemasan" required>
                </select>
            </div>
            <div class="form-group col">
                <label for="jenis_obat_id" class="sr-only">Jenis</label>
                <select class="form-select @error('jenis_obat_id') is-invalid @enderror"  id="jenis" name="jenis_obat_id" required>
                </select>
                
            </div>
        </div>
        </div>
        
      </div>
    </div>
  </div>
<script type='text/javascript'>
$('#view_kemasan').on('show.bs.modal',function(event){
    var button =event.relatedTarget;
    var nama = button.data('nama');
    var kode = button.data('kode');
    var jenis = button.data('jenis');
    var obat = button.data('obat');
    var kemasan = button.data('kemasan');
    var berat = button.data('berat');
    console.log(berat)
    // var modal = $(this);

    // modal.find('.modal-body #nama').val(nama);
    // modal.find('.modal-body #kode').val(kode);
    // modal.find('.modal-body #jenis').val(jenis);
    // modal.find('.modal-body #obat').val(obat);
    // modal.find('.modal-body #kemasan').val(kemasan);
    // modal.find('.modal-body #berat').val(berat);
})

</script>

@endsection



