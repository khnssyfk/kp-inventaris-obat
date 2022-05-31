@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Pasien</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
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
                            {{-- <div class="btn-group"> --}}
                                <a href="data-pasien/create" class="btn btn-primary mb-3 mt-1 ms-1 "><i class="bi bi-plus-lg"></i> Tambah Pasien Baru</a>
                                {{-- <div class="col-lg-3 mb-1 float-end" >
                                    <div class="input-group mb-3 p-1">
                                        <input type="text" class="form-control" placeholder="Cari Pasien...">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                                    </div>
                                </div> --}}
                            {{-- </div> --}}
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No RM</th>
                                    <th scope="col">No KTP</th>
                                    <th scope="col">No BPJS</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>xxxx</td>
                                    <td>xxx</td>
                                    <td>xxx</td>
                                    <td>Miko</td>
                                    <td>Austin,Taxes</td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm"><i class="bi bi-eye-fill"></i></a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                        <a href="" class="btn btn-success btn-sm"><i class="bi bi-printer-fill"></i></a>
                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



