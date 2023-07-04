<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('aceng') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('aceng') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('aceng') }}/assets/css/app.css">
    <link rel="stylesheet" href="{{ asset('aceng') }}/assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('aceng') }}/assets/images/logo/poscandu.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Registrasi.</h1>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group position-relative  mb-4">
                            <select class="form-select form-control " name="idposyandu" required>
                                <option value="">--------------- Pilih Posyandu ---------------</option>
                                @foreach ($posyandu as $row)
                                <option value="{{ $row->idposyandu }}">{{ $row->namaposyandu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama kader">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <input type="text" class="form-control form-control-xl" name="username" placeholder="Username">
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <input type="text" class="form-control form-control-xl" name="email" placeholder="Email">
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <input type="hidden" class="form-control form-control-xl" name="akses" value="kader" placeholder="akses">
                        </div>
                        {{-- <div class="form-group position-relative  mb-4">
                            <input type="file" class="form-control form-control-xl" name="foto_user">
                        </div> --}}
                        <div class="form-group position-relative  mb-4">
                            <input type="number" class="form-control form-control-xl" name="telepon" placeholder="telepon">
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <input type="hidden" class="form-control form-control-xl" name="status" value="tidak aktif" placeholder="akses">
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <input type="text" class="form-control form-control-xl" name="pendidikankader" placeholder="pendidikan terakhir">
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <input type="text" class="form-control form-control-xl" name="alamatkader" placeholder="alamat">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Daftar</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah memiliki akun? <a href="{{ url('login') }}"
                                class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>