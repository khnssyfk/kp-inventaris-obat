@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Obat Keluar</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data Obat Keluar</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive mb-4">
                        <table class="table table-striped " id="myTable">
                                <a href="obat-keluar/create" class="btn btn-primary mb-3 mt-1 ms-1 "><i class="bi bi-plus-lg"></i> Tambah Riwayat Obat Keluar</a>
                                <button type="button" class="btn btn-success mb-3 mt-1 ms-2" data-bs-toggle="modal" data-bs-target="#cetakModal">
                                    <i class="bi bi-printer-fill"></i> Cetak Data
                                  </button>
                                {{-- <a href="/lap-obt-msk" target="_blank" class="btn btn-success mb-3 mt-1 me-2 mx-3"><i class="bi bi-printer-fill"></i> Cetak Data</a> --}}

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tgl Keluar</th>
                                    <th scope="col">No Resep</th>
                                    <th scope="col">No RM</th>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Jumlah</th> 
                                    <th scope="col">Satuan</th> 
                                    {{-- <th scope="col">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($obatkeluars as $obatkeluar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date('d-m-Y', strtotime($obatkeluar->tgl_keluar))}}</td>
                                    <td>{{  $obatkeluar->no_resep }}</td>
                                    <td>{{  $obatkeluar->pasien_id }}</td>
                                    <td>{{  $obatkeluar->dataobat->nama_obat }}</td>
                                    <td>{{  $obatkeluar->jumlah_keluar}}</td>
                                    <td>{{  $obatkeluar->dataobat->satuan}}</td>
                                   
                                    {{-- <td>
                                            <a href="/obat-keluar/{{ $obatkeluar->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill d-inline"></i></a>
                                            <form action="/obat-keluar/{{ $obatkeluar->id }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
                                                @method("delete")
                                                @csrf
                                                <button class="btn btn-danger btn-sm border-0"><i class="bi bi-trash-fill" ></i></button>
                                            </form>
                                    </td> --}}
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
  <div class="modal fade" id="cetakModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Cetak Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form action="/lap-obt-klr" enctype="multipart/form-data" method="GET" target="_blank">
            <div class="modal-body">
                <div class="form-group">
                    <label>Tgl Mulai</label>
                    <input type="date" class="form-control" name="tgl_mulai" required>
                </div>
                <div class="form-group">
                    <label>Tgl Selesai</label>
                    <input type="date" class="form-control" name="tgl_selesai" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="bi bi-printer-fill"></i> Cetak Data</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection



