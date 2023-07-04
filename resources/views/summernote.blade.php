@extends('layouts.app')
@section('content')
    <div class="page-heading">
        {{-- JUDUL --}}
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Summernote</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Summernote</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="p-1 bg-primary w-100 mb-5"></div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('summernote/tambah', []) }}" class="btn btn-primary btn-sm mb-2">Posting</a>
                    @foreach ($summernote as $row)
                        <hr>
                        <h3>{{ $row->judul }}</h3>
                        <div>{!! $row->deskripsi !!}</div>
                        <hr>
                    @endforeach
                </div>
            </div>

        </section>
    </div>
@endsection