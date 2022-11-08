@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Supplier</h3>
        {{-- <p class="text-subtitle text-muted">This is the main page.</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data Supplier</li>
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
                                <a href="/supplier-obat/create" class="btn btn-primary mb-3 mt-1 ms-1"><i class="bi bi-plus-lg"></i> Tambah Supplier</a>
                                <a href="/lap-supplier-obt" target="_blank" class="btn btn-success mb-3  mx-3 mt-1 me-2"><i class="bi bi-printer-fill"></i> Cetak Data</a>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Supplier</th>
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($supplier_obats as $supplier_obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $supplier_obat->kode_supplier }}</td>
                                    <td>{{ $supplier_obat->nama_supplier }}</td>
                                    <td>{{ $supplier_obat->alamat }}</td>
                                    <td>{{ $supplier_obat->no_hp }}</td>
                                    <td>
                                        <a href="/supplier-obat/{{ $supplier_obat->kode_supplier }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/supplier-obat/{{ $supplier_obat->kode_supplier }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
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
            <h5 class="modal-title" id="exampleModalToggleLabel">Detail Data Supplier</h5>
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



