<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Auth.index');
    }

    public function admin()
    {
        return view(('Auth.admin'));
    }

    public function register()
    {
        return view('Auth.register');
    }
    
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ],[
            'name.unique' => 'This username has already been used!',
            'email.email' => 'The email must be a valid email address',
            'password.min' => 'The password must be at least 8 characters long!',
            'email.unique' => 'This email has already been used!'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:8'
        ],[
            'name' => 'The provided username does not match our records.',
            'password' => 'The provided password does not match our records.'
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();

            if($user->role == 'guest')
            {
                return redirect()->route('guestDashboard');
            }
            elseif($user->role == 'supervisor')
            {
                return redirect()->route('supervisorDashboard');
            }
            else
            {
                Auth::logout();
                return back();
            }
        }
        else {
            return back();
        }
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:8'
        ],[
            'name' => 'The provided username does not match our records.',
            'password' => 'The provided password does not match our records.'
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();

            if($user->role == 'admin')
            {
                return redirect()->route('adminDashboard');
            } else {
                Auth::logout();
                return back();
            }
        }
        else {
            return back();
        }
    }

    public function logout(Request $request)
    {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login');
    }
}
