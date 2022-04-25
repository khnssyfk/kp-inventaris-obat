@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Profile</h3>
        <p class="text-subtitle text-muted">Edit your profile.</p>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>
</div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('Profile Information') }}</h4>
            <p class="card-description">{{ __('Update your account\'s profile information and email address.') }}</p>
        </div>
        <div class="card-body">
            <form action="/profile" method="post" id="updateprofile-form">
                <div class="form-body">
                    <div class="form-group">
                        <label for="nama" class="sr-only">Nama</label>
                        <input type="text" placeholder="Masukan Nama" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="text" placeholder="Masukan Email" name="email" class="form-control">
                    </div>
                    <button class="btn btn-primary float-end mt-2">Simpan</button>
                </div>
            
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Update Password</h4>
            <p class="card-description">Lorem Ipsum</p>
        </div>
        <div class="card-body">
            <form action="/profile" method="post" id="updatepass-form">
                <div class="form-body">
                    <div class="form-group">
                        <label for="pass-lama" class="sr-only">Password Lama</label>
                        <input type="password" placeholder="Masukan Password Lama" name="pass-lama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pass-baru" class="sr-only">Password Baru</label>
                        <input type="password" placeholder="Masukan Password Baru" name="pass-baru" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pass-konfirmasi" class="sr-only">Konfirmasi Password</label>
                        <input type="password" placeholder="Masukan Sama Dengan Password Baru" name="pass-konfirmasi" class="form-control">
                    </div>
                    <button class="btn btn-primary float-end mt-2">Ganti Password</button>
                </div>
            
            </form>
        </div>
    </div>


@endsection