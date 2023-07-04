@extends('layouts.app')
@section('content')
{{-- JUDUL --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Hasil Timbang</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ Route('balita') }}">Balita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Hasil Timbang</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="p-1 bg-primary w-100 mb-5"></div>
</div>

    <div class="card-content">
        <div class="card-body">
            @foreach ($databalita as $row)
            <form class="form form-vertical" action="{{ url('detailbalita/submit/'.$row->idbalita) }}" method="POST" enctype="multipart/form-data">
            @endforeach
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="namabalita">Nama Balita</label>
                                <div class="position-relative">
                                    <select class="form-select form-control" name="idbalita" readonly>
                                        @foreach ($databalita as $reza)
                                        <option value="{{ $reza->idbalita }}">{{ $reza->namabalita }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-11">
                            <div class="form-group">
                                <label for="tanggallahir">Umur</label>
                                <div class="position-relative">
                                    {{-- @foreach ($databalita as $reza) --}}
                                    <input type="text" class="form-control" id="email-id-icon" name="umur" value="{{ $umur }} " placeholder="tahun" readonly>
                                    {{-- @endforeach --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="tanggallahir"></label>
                                <input type="text" class="form-control" id="email-id-icon" placeholder="bulan" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tanggallahir">Jenis Kelamin</label>
                                <div class="position-relative">
                                    {{-- @foreach ($databalita as $reza) --}}
                                    <input type="text" class="form-control" id="email-id-icon" name="jeniskelamin" value="{{ $jk }} " placeholder="tahun" readonly>
                                    {{-- @endforeach --}}
                                </div>
                            </div>
                        </div>
                        @if ($umur <= 59)
                        {{-- <div class="col-12">
                            <div class="form-group">
                                <label for="tanggaltimbang">Bulan Timbang</label>
                                <div class="position-relative">
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tanggaltimbang">Tanggal Timbang</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Pilih Tanggal" id="datepicker"  name="tanggaltimbang" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-11">
                            <div class="form-group">
                                <label for="tinggibadan">Tinggi Badan</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" id="tinggi"  name="tinggi"  minlength="1" maxlength="5" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="tanggallahir"></label>
                                <input type="text" class="form-control"  id="email-id-icon" placeholder="CM" readonly>
                            </div>
                        </div>
                        <div class="col-11">
                            <div class="form-group">
                                <label for="beratbadan">Berat Badan</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" id="berat" name="berat" minlength="1" maxlength="5" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="tanggallahir"></label>
                                <input type="text" class="form-control" id="email-id-icon" placeholder="KG" readonly>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit"
                                class="btn btn-primary me-1 mb-1 col-12">
                                Tambah Data
                            </button>
                        </div>
                        @endif
                        @if ($umur > 59)
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ url('balita') }}" class="btn btn-primary me-1 mb-1 col-12">Kembali</a>
                        </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection