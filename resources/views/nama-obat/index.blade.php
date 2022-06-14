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
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Obat</th>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_obats as $data_obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data_obat->kode_obat }}</td>
                                    <td>{{ $data_obat->nama_obat }}</td>
                                    <td>{{ $data_obat->satuan }}</td>
                                    <td>
                                        <a href="/nama-obat/{{ $data_obat->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/nama-obat/{{ $data_obat->id }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
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



