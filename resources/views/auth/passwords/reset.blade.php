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
                    <h1 class="auth-title">Reset Password</h1>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group position-relative">
                            <input id="email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative">
                            <input id="password" type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative">
                            <input id="password-confirm" type="password" class="form-control form-control-xl" name="password_confirmation" required autocomplete="new-password" placeholder="konfirmasi password">
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Kirim</button>
                    </form>
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