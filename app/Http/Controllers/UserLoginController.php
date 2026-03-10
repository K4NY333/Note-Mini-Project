<?php

namespace App\Http\Controllers;

use App\Models\note;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{
    public function dashboard()
    {
        $user = UserLogin::find(session('user_id'));
        return view('dashboard', compact('user'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $user = UserLogin::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'login_error' => 'Invalid email or password.'
            ])->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
    }

    public function logout(Request $request)
    {

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }

    public function CreateUser(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:UserLogin,email',
            'password' => 'required|string|min:8',
        ]);

        $user = UserLogin::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'User created successfully!');
    }

    public function ReadUsers(Request $request)
    {
        $user = UserLogin::all();

        return response()->json([
            'message' => 'Users retrieved successfully',
            'data' => $user,
        ], 200);
    }

    public function UpdateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:UserLogin,Email,' . $id,
            'password' => 'required|string|min:8',
        ]);

        $user = UserLogin::findOrFail($id);

        $user->update([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'User updated successfully',
            'User' => $user
        ], 200);
    }

    public function DeleteUser($id)
    {
        $user = UserLogin::findOrFail($id);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ], 200);
    }
}
