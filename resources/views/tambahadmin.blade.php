@extends('layouts.app')
@section('content')
{{-- JUDUL --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Data Admin</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ Route('admin') }}">Data Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Admin</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-1 bg-primary w-100 mb-5"></div>
</div>

    <div class="card-content">
        <div class="card-body">
            {{-- menampilkan error validasi --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form form-vertical" action="{{ url('admin/submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="name">Nama Admin</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Masukan nama admin"
                                        id="first-name-icon" name="name" value="{{ old('name') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="username">Username</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="username"
                                        id="first-name-icon" name="username" value="{{ old('username') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-blockquote-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="email">Email</label>
                                <div class="position-relative">
                                    <input type="email" class="form-control"
                                        placeholder="Email" id="email-id-icon" name="email" value="{{ old('email') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {{-- <label for="akses">Akses</label> --}}
                                <div class="position-relative">
                                    <input type="hidden" class="form-control"
                                        placeholder="" id="email-id-icon" name="akses" value="admin" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="foto_user">Foto User</label>
                                <div class="position-relative">
                                    <input type="file" class="form-control"
                                        placeholder="" id="email-id-icon" name="foto_user" value="{{ old('foto_user') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="telepon">Telepon</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Nomor telepon" id="email-id-icon" name="telepon" minlength="10" maxlength="13" value="{{ old('telepon') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                                <div class="position-relative">
                                    <input type="hidden" class="form-control"
                                        placeholder="password" id="email-id-icon" name="password" value="admin123">
                                </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="position-relative">
                                    <select class="form-select form-control select2" name="status" value="{{ old('status') }}">
                                        <option value="">-- Pilih Status Akun --</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit"
                                class="btn btn-primary me-1 mb-1 col-12">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection