<?php


namespace App\Traits;

use App\User;

trait AuthTrait
{
    function isRegisteredUser ($user) {
        if(User::where('email', $user->getEmail())->first()) {
            return true;
        } else {
            return false;
        }
    }
}
