@extends('layouts.app')
@section('content')
    <div class="page-heading">
        {{-- JUDUL --}}
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Posyandu</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Posyandu</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="p-1 bg-primary w-100 mb-5"></div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('posyandu/tambah', []) }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                    <table class="table table-hover text-center" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">ID Posyandu</th>
                                <th class="text-center">Nama Posyandu</th>
                                {{-- <th class="text-center">Nama Kader</th> --}}
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Telepon</th>
                                {{-- <th class="text-center">Detail</th> --}}
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($dataposyandu as $row)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $row->idposyandu }}</td>
                                <td class="align-middle">{{ $row->namaposyandu }}</td>
                                <td class="align-middle">{{ $row->alamatposyandu }}</td>
                                <td class="align-middle">{{ $row->teleponposyandu }}</td>
                                {{-- <td class="align-middle">
                                    <a href="/detailposyandu/{{ $row->idposyandu}}" type="button" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                                </td> --}}
                                <td class="align-middle">
                                    <a href="/posyandu/edit/{{ $row->idposyandu}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/posyandu/delete/{{ $row->idposyandu}}" type="button" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="bi bi-trash"></i></a>
                                    {{-- <a href="/tambahdetailposyandu/{{ $row->idposyandu}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-plus"></i></a> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="align-middle" colspan="7">Data tidak ada</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection