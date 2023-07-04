@extends('layouts.app')
@section('content')
    <div class="page-heading">
        {{-- JUDUL --}}
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Admin</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="p-1 bg-primary w-100 mb-5"></div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('admin/tambah', []) }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                    <table class="table table-hover text-center" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                {{-- <th class="text-center">Akses</th> --}}
                                <th class="text-center">Telepon</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($dataadmin as $row)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $row->id }}</td>
                                <td class="align-middle">{{ $row->name }}</td>
                                <td class="align-middle">{{ $row->email }}</td>
                                {{-- <td class="align-middle">{{ $row->akses }}</td> --}}
                                <td class="align-middle">{{ $row->telepon }}</td>
                                <td class="align-middle">
                                    <img src="{{ url('foto_user/'.$row->foto_user) }}" width='150px' height='150px' class="rounded"/>
                                </td>
                                <td class="align-middle">
                                    @if ($row->status == 'aktif')
                                    <a href="statusadmin-update/{{ $row->id}}" type="button" class="btn btn-success btn-sm">Aktif</a>
                                    @else
                                    <a href="statusadmin-update/{{ $row->id}}" type="button" class="btn btn-danger btn-sm">Non Aktif</a>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="/admin/edit/{{ $row->id}}" type="button" class="btn btn-info btn-sm" title="edit"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/resetpassword-admin/{{ $row->id}}" type="button" class="btn btn-danger btn-sm" title="reset password" onclick="konfirmasi(event)"><i class="bi bi-key"></i></a>
                                    {{-- <a href="/admin/delete/{{ $row->id}}" class="btn btn-danger btn-sm" title="hapus" onclick="confirmation(event)"><i class="bi bi-trash"></i></a> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="align-middle" colspan="8">Data tidak ada</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection