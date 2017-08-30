<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
use Socialite;

class SocialLoginController extends Controller
{
    /**
     * Redirect the user to the authentication page.
     *
     * @return \Illuminate\View\View
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from social login.
     *
     * @param  string $driver
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($driver)
    {
        $social_user = Socialite::driver($driver)->user();
        $user = User::findOrCreateByProvider($driver, $social_user);

        //welcome user
        if (!$user->verified) {
            try {
                \Mail::send('mails.register', ['user' => $user], function ($message) use ($user) {
                    $message->subject(config('mail.titles.register'))
                        ->to($user->email);
                });

                //update user to be verified
                $user->verified = true;
                $user->save();
            } catch (\Exception $e) {
                //DO nothing next register will send welcome message
            }
        }

        Auth::login($user);

        return redirect()->intended('/setupAccount');
    }
}
