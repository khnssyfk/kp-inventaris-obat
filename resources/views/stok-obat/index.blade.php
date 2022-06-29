@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Stok Obat</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data Stok Obat</li>
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
                        <a href="/lap-stk-obt" target="_blank" class="btn btn-success mb-3 mt-1 ms-1 "><i class="bi bi-printer-fill"></i> Cetak Data</a>
                        {{-- <a href="/lap-stk-obt"class="btn btn-white mb-3 mt-1 me-2"></a> --}}
                        <table class="table table-striped " id="myTable">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Obat</th>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Jumlah</th> 
                                    <th scope="col">Status</th> 
                                    {{-- <th scope="col">Status</th>  --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataobats as $dataobat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dataobat->kode_obat }}</td>
                                    <td>{{  $dataobat->nama_obat }}</td>
                                    <td>{{  $dataobat->jumlah}}</td>
                                    <td>
                                        @if($dataobat->jumlah >150)
                                            <label for="" class="badge bg-success">In Stock</label>
                                        @else
                                            <label for="" class="badge bg-danger">Out of Stock</label>
                                        @endif
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



