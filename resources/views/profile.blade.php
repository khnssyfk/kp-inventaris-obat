@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Profile</h3>
        {{-- <p class="text-subtitle text-muted">Edit your profile.</p> --}}
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-3">Ganti Password</h4>
            <form action="/profile/edit" method="get" id="updatepass-form">
                @method('PUT')
                <div class="form-body">
                    <div class="form-group">
                        <label for="currentpassword" class="sr-only">Password Lama</label>
                        <input type="password" placeholder="Masukan Password Lama" name="currentpassword" class="form-control  @error('currentpassword') is-invalid @enderror">
                        @error('currentpassword')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newpassword" class="sr-only">Password Baru</label>
                        <input type="password" placeholder="Masukan Password Baru" name="newpassword" class="form-control @error('newpassword') is-invalid @enderror" value="{{ old('newpassword') }}" required>
                        @error('newpassword')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword" class="sr-only">Konfirmasi Password</label>
                        <input type="password" placeholder="Masukan Sama Dengan Password Baru" name="confirmpassword" class="form-control @error('confirmpassword') is-invalid @enderror" value="{{ old('confirmpassword') }}" required>
                        @error('confirmpassword')
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary float-end mt-2">Ganti Password</button>
                </div>
            
            </form>
        </div>
    </div>


@endsection