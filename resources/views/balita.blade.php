@extends('layouts.app')
@section('content')
    <div class="page-heading">
        {{-- JUDUL --}}
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Balita</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Balita</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="p-1 bg-primary w-100 mb-5"></div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    @if (Auth::check() && Auth::user()->akses == 'kader')
                    <a href="{{ url('balita/tambah', []) }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                    @endif
                    <table class="table table-hover text-center" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Posyandu</th>
                                <th class="text-center">Ibu</th>
                                <th class="text-center">NIK Ibu</th>
                                <th class="text-center">Alamat Ibu</th>
                                <th class="text-center">Ayah</th>
                                <th class="text-center">NIK Ayah</th>
                                <th class="text-center">Alamat Ayah</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Tanggal Lahir</th>
                                <th class="text-center">JK</th>
                                <th class="text-center">Status ASI</th>
                                <th class="text-center">Berat Lahir (ONS)</th>
                                <th class="text-center">Panjang Lahir (CM)</th>
                                <th class="text-center">Status Sosial</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Detail</th>
                                @if (Auth::check() && Auth::user()->akses == 'kader')
                                <th class="text-center">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($databalita as $row)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $row->namaposyandu }}</td>
                                <td class="align-middle">{{ $row->namaibu }}</td>
                                <td class="align-middle">{{ $row->nikibu }}</td>
                                <td class="align-middle">{{ $row->alamatibu }}</td>
                                <td class="align-middle">{{ $row->namaayah }}</td>
                                <td class="align-middle">{{ $row->nikayah }}</td>
                                <td class="align-middle">{{ $row->alamatayah }}</td>
                                <td class="align-middle">{{ $row->namabalita }}</td>
                                <td class="align-middle">{{ $row->tanggal_lahir }}</td>
                                <td class="align-middle">{{ $row->jeniskelamin }}</td>
                                <td class="align-middle">{{ $row->statusasi }}</td>
                                <td class="align-middle">{{ $row->beratlahir }}</td>
                                <td class="align-middle">{{ $row->tinggilahir }}</td>
                                <td class="align-middle">{{ $row->statussosial }}</td>
                                <td class="align-middle">{{ $row->alamatbalita }}</td>
                                <td class="align-middle">
                                    <a href="/lihatdetail/{{$row->idbalita}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                                </td>
                                @if (Auth::check() && Auth::user()->akses == 'kader')
                                <td class="align-middle">
                                    <a href="/balita/edit/{{ $row->idbalita}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/balita/delete/{{ $row->idbalita}}" type="button" class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="bi bi-trash"></i></a>
                                    <a href="{{ url('tambahdetailbalita/'.$row->idbalita) }}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-plus"></i></a>
                                </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td class="align-middle" colspan="18">Data tidak ada</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection