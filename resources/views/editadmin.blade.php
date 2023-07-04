@extends('layouts.app')
@section('content')
{{-- JUDUL --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Data Admin</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ Route('admin') }}">Data Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Admin</li>
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
            <form class="form form-vertical" action="{{ url('/admin/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($result as $reza)
                <div class="mb-3">
                    <input type="hidden" name="id" class="form-control" value="{{$reza->id}}">
                </div>
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="name">Nama Admin</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Masukan nama"
                                        id="first-name-icon" name="name" value="{{$reza->name}}" required>
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
                                        placeholder="Username"
                                        id="first-username-icon" name="username" value="{{$reza->username}}" required>
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
                                    <input type="text" class="form-control"
                                        placeholder="Email" id="email-id-icon" name="email" value="{{$reza->email}}" required>
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
                                    <input type="hidden" class="form-control" id="email-id-icon" name="akses" value="{{$reza->akses}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="telepon">Telepon</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" id="email-id-icon" name="telepon" value="{{$reza->telepon}}" minlength="10" maxlength="14" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="password">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="email-id-icon" name="password" value="{{$reza->password}}" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="foto_user">Foto</label>
                                <div class="position-relative">
                                    <input type="file" class="form-control" id="email-id-icon" name="foto_user" value="{{$reza->foto_user}}">
                                    <button type="button" class="btn btn-outline-primary block btn-sm mt-2"
                                    data-bs-toggle="modal" data-bs-target="#border-less">
                                    Lihat Gambar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade text-left modal-borderless" id="border-less"
                        tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Foto User</h5>
                                    <button type="button" class="close rounded-pill"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        <img src="{{ asset('foto_user/'.$reza->foto_user) }}" alt="Logo Sekolah" style="width: 100%;">
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Tutup</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit"
                                class="btn btn-primary me-1 mb-1 col-12">
                                Edit Data
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </form>
        </div>
    </div>
@endsection