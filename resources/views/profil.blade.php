@extends('layouts.app')
@section('content')
<div class="container rounded bg-white mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{ url('foto_user/'.Auth::user()->foto_user) }}"><span class="font-weight-bold mt-2">{{ Auth::user()->name }}</span><span> </span></div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-center">Edit Profil</h4>
                </div>
                <form action="{{ url('profil/update') }}" method="post">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Nama</label>
                        <input type="text" class="form-control mb-3" name="name" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Username</label>
                        <input type="text" class="form-control mb-3" name="username" value="{{ Auth::user()->username }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email</label>
                        <input type="text" class="form-control mb-3" name="email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" class="form-control mb-3" name="akses" value="{{ Auth::user()->akses }}" readonly>
                    </div>
                    {{-- <div class="col-md-12">
                        <label class="labels">Foto</label>
                        <input type="file" class="form-control mb-3" name="foto_user" value="{{ Auth::user()->foto_user }}" >
                    </div> --}}
                    <div class="col-md-12">
                        <label class="labels">Telepon</label>
                        <input type="text" class="form-control" name="telepon" value="{{ Auth::user()->telepon }}" readonly>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <a href="{{ url('profil/edit', []) }}" class="btn btn-primary me-1 mb-1 col-12">Edit Profil</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection