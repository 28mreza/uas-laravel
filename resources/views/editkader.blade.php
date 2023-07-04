@extends('layouts.app')
@section('content')
{{-- JUDUL --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Data Kader</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ Route('kader') }}">Data Kader</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Kader</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-1 bg-primary w-100 mb-5"></div>
</div>

    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{ url('/kader/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($result as $row)
                <div class="mb-3">
                    <input type="hidden" name="id" class="form-control" value="{{$row->idkader}}">
                </div>
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="idposyandu">Nama Posyandu</label>
                                <div class="position-relative">
                                    <select class="form-select form-control " name="idposyandu" readonly>
                                        <option value="{{ $row->idposyandu }}">{{ $row->namaposyandu }}</option>
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
                                        id="first-name-icon" name="name" value="{{ $row->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="username">Username</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="username"
                                        id="first-name-icon" name="username" value="{{ $row->username }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                {{-- <label for="email">Email</label> --}}
                                <div class="position-relative">
                                    <input type="hidden" class="form-control"
                                        placeholder="Email" id="email-id-icon" name="email" value="{{ $row->emailkader }}" readonly>
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
                                        placeholder="" id="email-id-icon" name="foto_user" value="{{ $row->foto_user }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="telepon">Telepon</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control"
                                        placeholder="Nomor telepon" id="email-id-icon" name="telepon" value="{{ $row->telepon }}" minlength="10" maxlength="13" required>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="form-group ">
                                <label for="password">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control"
                                        placeholder="password" id="email-id-icon" name="password" value="{{ $row->password }}" required>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="pendidikankader">Pendidikan terakhir</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="email-id-icon" name="pendidikankader" value="{{ $row->pendidikankader }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="alamatkader">Alamat</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="email-id-icon" name="alamatkader" value="{{ $row->alamatkader }}" required>
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