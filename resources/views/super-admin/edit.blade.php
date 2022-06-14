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
        <h3>Edit User Baru</h3>
        {{-- <p class="text-subtitle text-muted">Data Pasien</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first mb-3">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/data-user">Data User</a></li>
                <li class="breadcrumb-item active">Edit User Baru</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Akun User</h4>
    </div>
    <div class="card-body">
        <form action="/data-user/{{ $user->id }}" method="post" id="createuser-form">
            @csrf 
            @method('PUT')
            <div class="form-body">
                <div class="form-group">
                    <label for="nama" class="sr-only">Nama</label>
                    <input type="text" placeholder="Masukkan Nama" name="nama" class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama', $user->nama) }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp" class="sr-only">Nomor Hp</label>
                    <input type="number" placeholder="Masukkan Nomor Hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" required value="{{ old('no_hp', $user->no_hp) }}">
                    @error('no_hp')
                    <div class="invalid-feedback">
                        Nomor Hp telah digunakan
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" placeholder="Masukkan Email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email', $user->email) }}">
                    @error('email')
                    <div class="invalid-feedback">
                        Email telah digunakan
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role_id" class="sr-only">Role</label>
                    <select class="form-select @error('role_id') is-invalid @enderror" name="role_id" required>
                        @foreach($roles as $role)
                          @if(old('role_id', $role->id)==$user->role_id)
                            <option value="{{ $role->id }}" selected>{{ $role->rolename }}</option>
                          @else
                            <option value="{{ $role->id }}">{{ $role->rolename }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('role_id')
                      <div class="invalid-feedback">
                          {{ $message}}
                      </div>
                      @enderror
                </div>
                <button class="btn btn-primary float-end mt-2 new-user-btn">Simpan</button>
            </div>
            
        </form>
    </div>
</div>
<script>

</script>
@endsection