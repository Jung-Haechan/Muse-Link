<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function showLoginForm()
    {
        $client_id = "xs1acNPCxz4rjqkIeI85";
        $redirectURI = urlencode("http://127.0.0.1:8000/naver_login");
        $state = md5(microtime().mt_rand());
        $apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".$client_id."&redirect_uri=".$redirectURI."&state=".$state;

        return view('auth.login', [
            'apiURL' => $apiURL,
        ]);
    }

    public function naver_login()
    {
        $client_id = "xs1acNPCxz4rjqkIeI85";
        $client_secret = "39Y472PDTQ";
        $code = $_GET["code"];
        $state = $_GET["state"];
        $redirectURI = urlencode("http://127.0.0.1:8000/naver_login");
        $url = "https://nid.naver.com/oauth2.0/token?grant_type=authorization_code&client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirectURI."&code=".$code."&state=".$state;
        $access_token = json_decode(file_get_contents($url));
        var_dump($access_token);
    }
}
