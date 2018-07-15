<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/home';

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
        return view('auth/login');
    }

    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect('/');
        else
            return redirect('login');
    }

    public function ajax_login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return response()->json(['code' => 200]);
        else
            return response()->json(['code' => 400, 'message' => 'failed login']);
    }
}
