<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Providers\RouteServiceProvider;
use App\Traits\AuthTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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
    use AuthTrait;

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

    public function social_login($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function social_login_callback($driver)
    {
        $user = Socialite::driver($driver)->stateless()->user();
        if ($this->isRegisteredUser($user)) {
            $registered_user = User::where('email', $user->getEmail())->first();
            auth()->login($registered_user, true);
            return redirect()->route('home');
        } else {
            User::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'resource_server' => $driver,
                'profile_img' => $user->getAvatar(),
            ]);
            $newUser = User::where('email', $user->getEmail())->first();
            auth()->login($newUser, true);
            return redirect()->route('register');
        }
    }
}
