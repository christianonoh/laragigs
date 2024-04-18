<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  public function create()
  {
    return view('users.register');
  }

  public function store(Request $request)
  {
    // Validate form fields
    $formFields = $request->validate(
      [
        'name' => ['required', 'min:3'],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => ['required', 'min:6', 'confirmed'],
      ]
    );

    //Create new User
    $user = new User();
    $user->name = $formFields['name'];
    $user->email = $formFields['email'];
    $user->password = bcrypt($formFields['password']);
    $user->save();

    // Login User
    // auth()->login($user);

    return redirect('/login')->with('message', 'User created and logged in successfully');
  }

  // Show login form 
  public function login()
  {
    return view('users.login');
  }

  // Log user out
  public function logout(Request $request)
  {
    auth()->logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/')->with('message', 'User logged out successfully');
  }

  // Authenticate user
  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => 'required'
    ]);

    if (auth()->attempt($credentials)) {
      $request->session()->regenerate();

      // dd('User logged in successfully');
      return redirect('/')->with('message', 'User logged in successfully');
    }

    // dd('User log in error');

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
  }
}
