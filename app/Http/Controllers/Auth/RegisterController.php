<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showRegistrationForm()
    {
        return view('auth.register', [
            'user' => Auth::user(),
        ]);
    }

    public function register(Request $request)
    {
        $user = User::find(Auth::id());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'introduce' => 'nullable',
        ]);
        $data['is_composer'] = $request->has('is_composer');
        $data['is_editor'] = $request->has('is_editor');
        $data['is_lyricist'] = $request->has('is_lyricist');
        $data['is_singer'] = $request->has('is_singer');
        $user->update($data);
        return redirect()->route('index');
    }
}
