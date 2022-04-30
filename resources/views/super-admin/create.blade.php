@extends('layouts.main')

@section('container')
@if(session()->has('success')) 
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Tambah User Baru</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/data-user">Data User</a></li>
                <li class="breadcrumb-item active">Tambah User Baru</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Akun User</h4>
    </div>
    <div class="card-body">
        <form action="/data-user/create" method="post" id="createuser-form">
            @csrf 
            <div class="form-body">
                <div class="form-group">
                    <label for="nama" class="sr-only">Nama</label>
                    <input type="text" placeholder="Masukkan Nama" name="nama" class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama') }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp" class="sr-only">Nomor Hp</label>
                    <input type="text" placeholder="Masukkan Nomor Hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" required value="{{ old('no_hp') }}">
                    @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" placeholder="Masukkan Email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_role" class="sr-only">Role</label>
                    <select class="form-select @error('id_role') is-invalid @enderror" name="id_role" required>
                        @foreach($roles as $role)
                          @if(old('id_role')== $role->id)
                            <option value="{{ $role->id }}" selected>{{ $role->rolename }}</option>
                          @else
                            <option value="{{ $role->id }}">{{ $role->rolename }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('id_role')
                      <div class="invalid-feedback">
                          {{ $message}}
                      </div>
                      @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" placeholder="Masukkan Password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary float-end mt-2" name="newuser">Simpan</button>
            </div>
        
        </form>
    </div>
</div>
@endsection