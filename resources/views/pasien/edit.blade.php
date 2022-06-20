@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3> Edit Data Pasien</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/data-pasien">Data Pasien</a></li>
                <li class="breadcrumb-item active"> Edit Data Pasien</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="/data-pasien/{{ $pasien->no_rekam_medis }}" method="post">
                        @csrf 
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nama">No RM</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="First Name" readonly name="no_rekam_medis" value="{{ $pasien->no_rekam_medis }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nama">NIK</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="Masukan NIK" name="nik" value="{{ $pasien->nik }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="first-name-column" class="form-control"
                                        placeholder="First Name" name="nama" value="{{ $pasien->nama }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" id="last-name-column" class="form-control"
                                         name="tanggal_lahir"  value="{{ $pasien->tanggal_lahir }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city-column">Jenis Kelamin</label>
                                    <input type="text" id="city-column" class="form-control" placeholder="City"
                                        name="jenis_kelamin"value="{{ $pasien->jenis_kelamin }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city-column">Agama</label>
                                    <input type="text" id="city-column" class="form-control" placeholder="City"
                                        name="agama"value="{{ $pasien->agama }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city-column">Pekerjaan</label>
                                    <input type="text" id="city-column" class="form-control" placeholder="Masukan Pekerjaan"
                                        name="pekerjaan"value="{{ $pasien->pekerjaan }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city-column">Alamat</label>
                                    <input type="text" id="city-column" class="form-control" placeholder="City"
                                        name="alamat"value="{{ $pasien->alamat }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city-column">Email</label>
                                    <input type="text" id="city-column" class="form-control" placeholder="City"
                                        name="email"value="{{ $pasien->email }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city-column">No HP</label>
                                    <input type="number" id="city-column" class="form-control" placeholder="City"
                                        name="no_hp"value="{{ $pasien->no_hp }}">
                                </div>
                            </div>
                           
                            
                            
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



