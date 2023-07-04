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
                    <a href="{{ url('kader/tambah', []) }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                    <table class="table table-hover text-center" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">posyandu</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Telepon</th>
                                <th class="text-center">Pendidikan</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($datakader as $row)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $row->namaposyandu }}</td>
                                <td class="align-middle">{{ $row->name }}</td>
                                <td class="align-middle">{{ $row->email }}</td>
                                <td class="align-middle">{{ $row->telepon }}</td>
                                <td class="align-middle">{{ $row->pendidikankader }}</td>
                                <td class="align-middle">{{ $row->alamatkader }}</td>
                                <td class="align-middle">
                                    @if ($row->foto_user)
                                    <img src="{{ url('foto_user/'.$row->foto_user) }}" width='150px' height='150px' class="rounded"/>
                                    @else
                                    <img src="{{ url('aceng/assets/images/faces/aceng.jpg') }}" width='150px' height='150px' class="rounded"/>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($row->status == 'aktif')
                                    <a href="statuskader-update/{{ $row->idkader}}" type="button" class="btn btn-success btn-sm">Aktif</a>
                                    @else
                                    <a href="statuskader-update/{{ $row->idkader}}" type="button" class="btn btn-danger btn-sm">Non Aktif</a>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="/kader/edit/{{ $row->idkader}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/resetpassword-kader/{{ $row->idkader}}" type="button" class="btn btn-danger btn-sm" title="reset password" onclick="konfirmasi(event)"><i class="bi bi-key"></i></a>
                                    {{-- <a href="/kader/delete/{{ $row->emailkader}}" type="button" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="bi bi-trash"></i></a> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="align-middle" colspan="9">Data tidak ada</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection