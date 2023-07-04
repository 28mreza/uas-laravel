@extends('layouts.app')
@section('content')
{{-- JUDUL --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Data Kader</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ Route('kader') }}">Data Kader</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Kader</li>
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
            <form class="form form-vertical" action="{{ url('kader/submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="idposyandu">Nama Posyandu</label>
                                <div class="position-relative">
                                    <select class="form-select form-control select2" name="idposyandu" required>
                                        @foreach ($posyandu as $row)
                                        <option value="{{ $row->idposyandu }}">{{ $row->namaposyandu }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nama Kader</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Masukan nama kader"
                                        id="first-name-icon" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="username">Username</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="username"
                                        id="first-name-icon" name="username" value="{{ old('username') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="email">Email</label>
                                <div class="position-relative">
                                    <input type="email" class="form-control"
                                        placeholder="Email" id="email-id-icon" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                {{-- <label for="akses">Akses</label> --}}
                                <div class="position-relative">
                                    <input type="hidden" class="form-control"
                                        placeholder="" id="email-id-icon" name="akses" value="kader" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="foto_user">Foto kader</label>
                                <div class="position-relative">
                                    <input type="file" class="form-control"
                                        placeholder="" id="email-id-icon" name="foto_user" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="telepon">Telepon</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control"
                                        placeholder="Nomor telepon" id="email-id-icon" name="telepon" value="{{ old('telepon') }}" minlength="10" maxlength="13">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <div class="position-relative">
                                    <input type="hidden" class="form-control"
                                        placeholder="password" id="email-id-icon" name="password" value="kader123">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="pendidikankader">Pendidikan terakhir</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="email-id-icon" name="pendidikankader" value="{{ old('pendidikankader') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="alamatkader">Alamat</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="email-id-icon" name="alamatkader" value="{{ old('alamatkader') }}">
                                </div>
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