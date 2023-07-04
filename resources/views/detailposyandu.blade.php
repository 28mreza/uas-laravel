@extends('layouts.app')
@section('content')
    <div class="page-heading">
        {{-- JUDUL --}}
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Detail Posyandu</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('posyandu') }}">Posyandu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Detail Posyandu</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="p-1 bg-primary w-100 mb-5"></div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover text-center" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">ID Detail</th>
                                <th class="text-center">Nama Posyandu</th>
                                <th class="text-center">Nama Kader</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($detailposyandu as $row)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $row->iddetailposyandu }}</td>
                                <td class="align-middle">{{ $row->namaposyandu }}</td>
                                <td class="align-middle">{{ $row->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="align-middle" colspan="8">Data tidak ada</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <a href="{{ url('posyandu', []) }}" class="btn btn-primary btn-sm mb-2">Kembali</a>
                </div>
            </div>
        </section>
    </div>
@endsection