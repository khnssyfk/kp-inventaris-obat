@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Satuan & Kemasan Obat</h3>
        {{-- <p class="text-subtitle text-muted">This is the main page.</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Satuan & Kemasan Obat</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4>Satuan Obat</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                                <a href="/satuan-obat/create" class="btn btn-primary mb-3 mt-1 ms-1"><i class="bi bi-plus-lg"></i> Tambah Satuan Obat</a>
                                <a href="/lap-satuan-obt" target="_blank" class="btn btn-success mb-3  mx-3 mt-1 me-2"><i class="bi bi-printer-fill"></i> Cetak Data</a>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Satuan</th>
                                    <th scope="col">Satuan Obat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($satuan_obats as $satuan_obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $satuan_obat->kode_satuan }}</td>
                                    <td>{{ $satuan_obat->satuan_obat }}</td>
                                    <td>
                                        <a href="/satuan-obat/{{ $satuan_obat->kode_satuan }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/satuan-obat/{{ $satuan_obat->kode_satuan }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
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
                        <table class="table table-striped" id="myTable">
                                <a href="/kemasan-obat/create" class="btn btn-primary mb-3 mt-1 ms-1"><i class="bi bi-plus-lg"></i> Tambah Kemasan Obat</a>
                                <a href="/lap-kemasan-obt" target="_blank" class="btn btn-success mb-3  mx-3 mt-1 me-2"><i class="bi bi-printer-fill"></i> Cetak Data</a>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Kemasan</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Jumlah Butir/botol</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kemasan_obats as $kemasan_obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kemasan_obat->id }}</td>
                                    <td>{{ $kemasan_obat->keterangan }}</td>
                                    <td>{{ $kemasan_obat->jumlah }}</td>
                                    <td>
                                        <a href="/kemasan-obat/{{ $kemasan_obat }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/kemasan-obat/{{ $kemasan_obat }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
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



