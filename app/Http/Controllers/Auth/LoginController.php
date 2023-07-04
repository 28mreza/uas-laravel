<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view ('login');
    }

    // public function registrasi()
    // {
    //     return view ('auth.register');
    // }

    public function authenticated(Request $request, $user)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if ($user->akses && $user->status=='aktif') {
                Alert::success( 'Anda Berhasil Login');
                return redirect()->route('dashboard');
            }else {
                Alert::warning('status akun anda tidak aktif, untuk mengaktifkan kembali hubungi admin');
                Auth::logout();
                return redirect()->route('login');
            }
        }else{
            Alert::warning('email dan password tidak sesuai');
            Auth::logout();
            return redirect()->route('login');
        }
    }

    Public function logout(){
        Auth::logout(); 
        request()->session()->invalidate(); 
        request()->session()->regenerateToken();
        return redirect('login');
    }
}
