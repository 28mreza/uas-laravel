@extends('layouts.app')
@section('content')
    <div class="page-heading">
        {{-- JUDUL --}}
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Grafik Gizi</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Grafik Gizi</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="p-1 bg-primary w-100 mb-5"></div>
        </div>
        {{-- <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Grafik Gizi Balita</h4>
                            </div>
                            <div class="card-body">
                                {!! $GiziChart->container() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </div>
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Grafik</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">Berat Badan Menurut Tinggi Badan</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">Tinggi Badan Menurut Umur</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                aria-selected="false">Status Gizi</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut
                                nulla neque.
                                Ut hendrerit nulla a euismod pretium.
                                Fusce venenatis sagittis ex efficitur suscipit. In tempor mattis
                                fringilla. Sed
                                id tincidunt orci, et volutpat ligula.
                                Aliquam sollicitudin sagittis ex, a rhoncus nisl feugiat quis. Lorem
                                ipsum dolor
                                sit amet, consectetur adipiscing elit.
                                Nunc ultricies ligula a tempor vulputate. Suspendisse pretium mollis
                                ultrices
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                Integer interdum diam eleifend metus lacinia, quis gravida eros
                                mollis. Fusce
                                non sapien sit amet magna dapibus
                                ultrices. Morbi tincidunt magna ex, eget faucibus sapien bibendum
                                non. Duis a
                                mauris ex. Ut finibus risus sed massa
                                mattis porta. Aliquam sagittis massa et purus efficitur ultricies.
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Grafik Gizi Balita</h4>
                                    </div>
                                    <div class="card-body">
                                        {!! $GiziChart->container() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ $GiziChart->cdn() }}"></script>

    {{ $GiziChart->script() }}
@endsection