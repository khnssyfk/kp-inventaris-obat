@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Bentuk & Kemasan Obat</h3>
        {{-- <p class="text-subtitle text-muted">This is the main page.</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Bentuk & Kemasan Obat</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4>Bentuk Obat</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                                <a href="/bentuk-obat/create" class="btn btn-primary mb-3 mt-1 ms-1"><i class="bi bi-plus-lg"></i> Tambah Bentuk Obat</a>
                                <a href="/lap-bentuk-obt" target="_blank" class="btn btn-success mb-3  mx-3 mt-1 me-2"><i class="bi bi-printer-fill"></i> Cetak Data</a>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Bentuk</th>
                                    <th scope="col">Bentuk Obat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bentuk_obats as $bentuk_obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bentuk_obat->kode_bentuk }}</td>
                                    <td>{{ $bentuk_obat->bentuk_obat }}</td>
                                    <td>
                                        <a href="/bentuk-obat/{{ $bentuk_obat->kode_bentuk }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/bentuk-obat/{{ $bentuk_obat->kode_bentuk }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
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
<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4>Kemasan Obat</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable1">
                                <a href="/kemasan-obat/create" class="btn btn-primary mb-3 mt-1 ms-1"><i class="bi bi-plus-lg"></i> Tambah Kemasan Obat</a>
                                <a href="/lap-kemasan-obt" target="_blank" class="btn btn-success mb-3  mx-3 mt-1 me-2"><i class="bi bi-printer-fill"></i> Cetak Data</a>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Kemasan</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Bentuk Obat</th>
                                    <th scope="col">Jumlah Butir/botol</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kemasan_obats as $kemasan_obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kemasan_obat->kode_kemasan }}</td>
                                    <td>{{ $kemasan_obat->keterangan }}</td>
                                    <td>{{ $kemasan_obat->bentukobat->bentuk_obat }}</td>
                                    <td>{{ $kemasan_obat->jumlah }}</td>
                                    <td>
                                        <a href="/kemasan-obat/{{ $kemasan_obat->kode_kemasan }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/kemasan-obat/{{ $kemasan_obat->kode_kemasan }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
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



