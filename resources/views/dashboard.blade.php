@extends('layouts.app')
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last mb-5">
            <h3>Dashboard</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard', []) }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard
                    </li>
                </ol>
            </nav>

            
        </div>
    </div>
</div>
@if (Auth::check() && Auth::user()->password == '$2y$10$WqkqVM1snk5MEAkTH7uhnOVOKL1/2uLsJVlzBBvng46xKw7PafGGO' || Auth::user()->password == '$2y$10$sSrMoKiLs1SqETlIMvJ/teCawJKlGHAYGU/hSacZj93vibd3MtzQm')
<div class="alert alert-light-danger color-danger">
    <i class="bi bi-exclamation-triangle"></i>
    Password anda masih default, segera ganti password!
</div>
@endif
    @if (Auth::check() && Auth::user()->akses == 'admin')
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Posyandu</h6>
                                    <h6 class="font-extrabold mb-0">{{ $posyandu }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Kader</h6>
                                    <h6 class="font-extrabold mb-0">{{ $kader }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Balita</h6>
                                    <h6 class="font-extrabold mb-0">{{ $balita }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Hasil</h6>
                                    <h6 class="font-extrabold mb-0">{{ $gizi }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- <div class="px-2 ">
            <marquee class="py-3" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="10" behavior="alternate">
                <h1>
                    Selamat datang <strong>{{Auth::user()->name}}</strong>
                    
                </h1>
            </marquee>
        </div> --}}
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <img class="img-error" src="{{ asset('aceng') }}/assets/images/samples/bg.png" alt="Not Found" width="100%"> 
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection