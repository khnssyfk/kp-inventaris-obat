@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data User</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data User</li>
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
                            {{-- <div class="btn-group"> --}}
                                <a href="/data-user/create" class="btn btn-primary mb-3 mt-1 ms-1"><i class="bi bi-plus-lg"></i> Tambah User Baru</a>
                                {{-- <div class="col-lg-3 float-end" >
                                    <div class="input-group mb-3 p-1">
                                        <input type="text" class="form-control" placeholder="Cari User...">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                                    </div>
                                </div> --}}
                            {{-- </div> --}}
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->no_hp }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->rolename }}</td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="{{route('data-user.destroy', $user->id) }}" onclick="swalDelete(event)" method="post" class="d-inline form-delete">
                                            @csrf
                                            @method("DELETE")
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



