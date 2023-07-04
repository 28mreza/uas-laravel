@extends('layouts.app')
@section('content')
{{-- JUDUL --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Data Balita</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ Route('balita') }}">Data Balita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Balita</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-1 bg-primary w-100 mb-5"></div>
</div>

    <div class="card-content">
        <div class="card-body">
            {{-- menampilkan error validasi --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form form-vertical" action="{{ url('balita/submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                
                                <label for="name">Nama Posyandu</label>
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
                                <label for="namaibu">Nama Ibu</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Masukan nama ibu"
                                        id="first-name-icon" name="namaibu" value="{{ old('namaibu') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nikibu">NIK Ibu</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="first-name-icon" name="nikibu" value="{{ old('nikibu') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamatibu">Alamat Ibu</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="first-name-icon" name="alamatibu" value="{{ old('alamatibu') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="namaayah">Nama Ayah</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Masukan nama ayah"
                                        id="first-name-icon" name="namaayah" value="{{ old('namaayah') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nikayah">NIK Ayah</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="first-name-icon" name="nikayah" value="{{ old('nikayah') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamatayah">Alamat Ayah</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        id="first-name-icon" name="alamatayah" value="{{ old('alamatayah') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="namabalita">Nama Balita</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Masukan nama"
                                        id="first-name-icon" name="namabalita" value="{{ old('namabalita') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tanggallahir">Tanggal Lahir</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Pilih Tanggal Lahir" id="datepicker" name="tanggallahir" value="{{ old('tanggallahir') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="jeniskelamin">Jenis Kelamin</label>
                                <div class="position-relative">
                                    <select class="form-select form-control select2" name="jeniskelamin" value="{{ old('jeniskelamin') }}">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="laki-laki">laki-laki</option>
                                        <option value="perempuan">perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="statusasi">Status ASI</label>
                                <div class="position-relative">
                                    <select class="form-select form-control select2" name="statusasi" value="{{ old('statusasi') }}">
                                        <option value="">-- Pilih Status ASI --</option>
                                        <option value="asi">ASI</option>
                                        <option value="susu formula">Susu Formula</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-11">
                            <div class="form-group">
                                <label for="beratlahir">Berat Lahir</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="ONS" id="email-id-icon" name="beratlahir" value="{{ old('beratlahir') }} ">
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
                                    <input type="text" class="form-control" id="email-id-icon" name="tinggilahir" value="{{ old('tinggilahir') }}">
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
                                    <select class="form-select form-control select2" name="statussosial" value="{{ old('statussosial') }}">
                                        <option value="">-- Pilih Status Sosial --</option>
                                        <option value="kelas atas">Kelas Atas</option>
                                        <option value="kelas menengah">Kelas Menengah</option>
                                        <option value="kelas bawah">Kelas Bawah</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamatbalita">Alamat Balita</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" id="email-id-icon" name="alamatbalita" value="{{ old('alamatbalita') }}">
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