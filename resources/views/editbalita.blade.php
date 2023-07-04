@extends('layouts.app')
@section('content')
{{-- JUDUL --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Data Balita</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ Route('balita') }}">Data Balita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Balita</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-1 bg-primary w-100 mb-5"></div>
</div>

    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{ url('balita/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($result as $row)
                <div class="mb-3">
                    <input type="hidden" name="id" class="form-control" value="{{$row->idbalita}}">
                </div>
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nama Posyandu</label>
                                <div class="position-relative">
                                    <select class="form-select form-control select2" name="idposyandu">
                                        @foreach ($posyandu as $reza)
                                        <option value="{{ $reza->idposyandu }}">{{ $reza->namaposyandu }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="namaibu">Nama Ibu</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Masukan nama ibu"
                                        id="first-name-icon" name="namaibu" value="{{$row->namaibu}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nikibu">NIK Ibu</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="first-name-icon" name="nikibu" value="{{$row->nikibu}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamatibu">Alamat Ibu</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="first-name-icon" name="alamatibu" value="{{$row->alamatibu}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="namaayah">Nama Ayah</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Masukan nama ayah"
                                        id="first-name-icon" name="namaayah" value="{{$row->namaayah}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nikayah">NIK Ayah</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="first-name-icon" name="nikayah" value="{{$row->nikayah}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamatayah">Alamat Ayah</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="first-name-icon" name="alamatayah" value="{{$row->alamatayah}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="namabalita">Nama Balita</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Masukan nama"
                                        id="first-name-icon" name="namabalita" value="{{$row->namabalita}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tanggallahir">Tanggal Lahir</label>
                                <div class="position-relative">
                                    <input type="date" class="form-control"
                                        placeholder="Email" id="email-id-icon" name="tanggallahir" value="{{$row->tanggallahir}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="jeniskelamin">Jenis Kelamin</label>
                                <div class="position-relative">
                                    <select class="form-select form-control select2" name="jeniskelamin" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="laki-laki" {{ $row->jeniskelamin == 'laki-laki' ? 'selected' : '' }}>laki-laki</option>
                                        <option value="perempuan" {{ $row->jeniskelamin == 'perempuan' ? 'selected' : '' }}>perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="statusasi">Status ASI</label>
                                <div class="position-relative">
                                    <select class="form-select form-control select2" name="statusasi" required>
                                        <option value="">-- Pilih Status ASI --</option>
                                        <option value="asi" {{ $row->statusasi == 'asi' ? 'selected' : '' }}>ASI</option>
                                        <option value="susu formula" {{ $row->statusasi == 'susu formula' ? 'selected' : '' }}>Susu Formula</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-11">
                            <div class="form-group">
                                <label for="beratlahir">Berat Lahir</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control" placeholder="KG" id="email-id-icon" name="beratlahir" value="{{$row->beratlahir}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="tanggallahir"></label>
                                <input type="text" class="form-control" id="email-id-icon" placeholder="ONS" readonly>
                            </div>
                        </div>
                        <div class="col-11">
                            <div class="form-group">
                                <label for="tinggilahir">Panjang Lahir</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control" id="email-id-icon" name="tinggilahir" value="{{$row->tinggilahir}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="tanggallahir"></label>
                                <input type="text" class="form-control" id="email-id-icon" placeholder="CM" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="statussosial">Status Sosial</label>
                                <div class="position-relative">
                                    <select class="form-select form-control select2" name="statussosial" required>
                                        <option value="">-- Pilih Status Sosial --</option>
                                        <option value="kelas atas" {{ $row->statussosial == 'kelas atas' ? 'selected' : '' }}>Kelas Atas</option>
                                        <option value="kelas menengah" {{ $row->statussosial == 'kelas menengah' ? 'selected' : '' }}>Kelas Menengah</option>
                                        <option value="kelas bawah" {{ $row->statussosial == 'kelas bawah' ? 'selected' : '' }}>Kelas Bawah</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamatbalita">Alamat Balita</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" id="email-id-icon" name="alamatbalita" value="{{ $row->alamatbalita }}" required>
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