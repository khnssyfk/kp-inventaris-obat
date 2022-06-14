@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Obat Masuk</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data Obat Masuk</li>
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
                                <a href="obat-masuk/create" class="btn btn-primary mb-3 mt-1 ms-1 "><i class="bi bi-plus-lg"></i> Tambah Riwayat Obat Masuk</a>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tgl Masuk</th>
                                    <th scope="col">Kode Transaksi</th>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Jumlah</th> 
                                    <th scope="col">Satuan</th> 
                                    <th scope="col">Apotek</th>
                                    <th scope="col">Expired</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($obatmasuks as $obatmasuk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $obatmasuk->tgl_masuk }}</td>
                                    <td>{{  $obatmasuk->kode_transaksi }}</td>
                                    <td>{{  $obatmasuk->dataobat->nama_obat }}</td>
                                    <td>{{  $obatmasuk->jumlah}}</td>
                                    <td>{{  $obatmasuk->dataobat->satuan}}</td>
                                    <td>{{  $obatmasuk->nama_apotek}}</td>
                                    <td>{{  $obatmasuk->expired}}</td>
                                    <td>
                                        <a href="/obat-masuk/{{ $obatmasuk->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/obat-masuk/{{ $obatmasuk->id }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
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
@endsection


