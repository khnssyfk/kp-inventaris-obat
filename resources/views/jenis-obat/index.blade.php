@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Jenis Obat</h3>
        {{-- <p class="text-subtitle text-muted">This is the main page.</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Jenis Obat</li>
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
                                <a href="/jenis-obat/create" class="btn btn-primary mb-3 mt-1 ms-1"><i class="bi bi-plus-lg"></i> Tambah Jenis Obat</a>
                                <a href="/lap-jenis-obt" target="_blank" class="btn btn-success mb-3  mx-3 mt-1 me-2"><i class="bi bi-printer-fill"></i> Cetak Data</a>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Jenis</th>
                                    <th scope="col">Jenis Obat</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jenis_obats as $jenis_obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jenis_obat->kode_jenis }}</td>
                                    <td>{{ $jenis_obat->jenis_obat }}</td>
                                    <td>{{ $jenis_obat->keterangan }}</td>
                                    <td>
                                        <a href="/jenis-obat/{{ $jenis_obat->kode_jenis }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/jenis-obat/{{ $jenis_obat->kode_jenis }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
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



