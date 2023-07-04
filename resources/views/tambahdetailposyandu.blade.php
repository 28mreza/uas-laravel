@extends('layouts.app')
@section('content')
{{-- JUDUL --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Detail Posyandu</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ Route('posyandu') }}">Posyandu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Detail Posyandu</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-1 bg-primary w-100 mb-5"></div>
</div>

    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{ url('detailposyandu/submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="namaposyandu">Nama Posyandu</label>
                                <div class="position-relative">
                                    <select class="form-select form-control" name="idposyandu" readonly>
                                        @foreach ($dataposyandu as $reza)
                                        <option value="{{ $reza->idposyandu }}">{{ $reza->namaposyandu }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="namakader">Nama Kader</label>
                                <div class="position-relative">
                                    <select class="form-select form-control select2" name="id">
                                        <option value="">-- Pilih Kader --</option>
                                        @foreach ($datakader as $reza)
                                        <option value="{{ $reza->id }}">{{ $reza->name }}</option>
                                        @endforeach
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