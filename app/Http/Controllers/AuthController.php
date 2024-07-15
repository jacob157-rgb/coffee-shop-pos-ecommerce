<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function providerView()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginView()
    {
        return view('pages.auth.login');
    }

    public function registerView()
    {
        return view('pages.auth.register');
    }

    public function login(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request): RedirectResponse
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        // dd($validator);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        flash()->option('position', 'bottom-right')->success('Akun Berhasil dibuat, Silahkan Masuk!');
        return redirect('/login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function handleProviderCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            flash()->option('position', 'bottom-right')->error('Ada yang Salah coba lagi nanti!');
            return redirect('auth.login')->withErrors(['msg' => 'There was an error logging you in with Google.']);
        }

        $userEmail = User::where('email', $googleUser->getEmail())->first();
        $userGId = User::where('google_id', $googleUser->getId())->first();

        if ($userEmail) {
            if ($userEmail->name == null) {
                $userEmail->update([
                    'google_id' => $googleUser->getId(),
                    'name' => $googleUser->getName(),
                    'email_verified_at' => now()
                ]);
            } else {
                $userEmail->update([
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now()
                ]);
            }
            Auth::login($userEmail);
        } elseif ($userGId) {
            $userGId->update([
                'email_verified_at' => now()
            ]);
            Auth::login($userGId);
        } else {
            $user = User::create([
                'google_id' => $googleUser->getId(),
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'email_verified_at' => now(),
                'password' => bcrypt(Str::random(16)),
                'avatar' => $googleUser->getAvatar()
            ]);
            Auth::login($user);
        }

        return redirect()->intended('/dashboard');
    }
}
