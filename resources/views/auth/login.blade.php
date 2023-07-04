<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('aceng') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('aceng') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('aceng') }}/assets/css/app.css">
    <link rel="stylesheet" href="{{ asset('aceng') }}/assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        @include('sweetalert::alert')
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('aceng') }}/assets/images/logo/poscandu.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Login</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative mb-4">
                            <input id="email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative mb-2">
                            <input id="password" type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label class="mb-1"><a href="{{ route('password.request') }}"class="font-bold">Lupa Password?</a></label>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Tidak Memiliki akun? 
                            <a href="{{ route('register') }}"class="font-bold">Registrasi</a>
                        </p>
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