@extends('layouts.app')
@section('content')
{{-- JUDUL --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Data Posyandu</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ Route('posyandu') }}">Data Posyandu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Posyandu</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-1 bg-primary w-100 mb-5"></div>
</div>

    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{ url('/posyandu/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($result as $reza)
                <div class="mb-3">
                    <input type="hidden" name="id" class="form-control" value="{{$reza->idposyandu}}">
                </div>
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="namaposyandu">Nama Posyandu</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Masukan nama posyandu"
                                        id="first-name-icon" name="namaposyandu" value="{{ $reza->namaposyandu }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamatposyandu">Alamat Posyandu</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="alamat"
                                        id="first-name-icon" name="alamatposyandu" value="{{ $reza->alamatposyandu }}">
                                    <div class="form-control-icon">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="teleponposyandu">Telepon Posyandu</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control"
                                        placeholder="Nomor telepon" id="email-id-icon" name="teleponposyandu" value="{{ $reza->teleponposyandu }}" minlength="10" maxlength="13">
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