@extends('layouts.app')
@section('content')
    <div class="page-heading">
        {{-- JUDUL --}}
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Hasil</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Hasil</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="p-1 bg-primary w-100 mb-5"></div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    {{-- <a href="{{ url('admin/tambah', []) }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a> --}}
                    <table class="table table-hover text-center" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Tanggal Timbang</th>
                                <th class="text-center">Tinggi (CM)</th>
                                <th class="text-center">Berat (KG)</th>
                                <th class="text-center">Status BB/U</th>
                                <th class="text-center">Status TB/U</th>
                                <th class="text-center">Status Gizi</th>
                                {{-- <th class="text-center">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($gizi as $row)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $row->namabalita }}</td>
                                <td class="align-middle">{{ $row->tanggaltimbang }}</td>
                                <td class="align-middle">{{ $row->tinggibadan }}</td>
                                <td class="align-middle">{{ $row->beratbadan }}</td>
                                <td class="align-middle">{{ $row->statusbb }}</td>
                                <td class="align-middle">{{ $row->statustb }}</td>
                                <td class="align-middle">{{ $row->status }}</td>
                                {{-- <td class="align-middle">
                                    <a href="/admin/jurusan/edit/{{ $row->idgizi}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/admin/jurusan/delete/{{ $row->idgizi}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td class="align-middle" colspan="6">Data tidak ada</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('balita', []) }}" class="btn btn-primary btn-sm mb-2">Kembali</a>
                </div>
            </div>

        </section>
    </div>
@endsection