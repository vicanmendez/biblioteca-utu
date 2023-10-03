<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use App\Http\Requests\changePasswordRequest;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => "required",
            'password' => "required",
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->withErrors(['username' => 'Usuario o contraseña incorrectos']);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function changePassword(changePasswordRequest $request)
    {
        $user = Auth::user();
        if (Auth::attempt(['username' => $user->username, 'password' => $request->c_password])) {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Contraseña cambiada con éxito');
        } else {
            return redirect()->back()->withErrors(['c_password' => 'Contraseña incorrecta']);
        }
    }
}
