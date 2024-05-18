<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('Auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, check if the user is an admin
            if (Auth::user()->isAdmin) {
                return redirect()->route('dashboard')->with('success', 'You are logged in as admin!');
            } else {
                return redirect()->route('home')->with('success', 'You are logged in!');
            }
        }

        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'email' => 'required|email|unique:users',
            'tel' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
    
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->adresse = $request->adresse;
        $user->ville = $request->ville;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->password = Hash::make($request->password);
    
        // Check if email and password match admin credentials
        if ($this->isAdmin($request->email, $request->password)) {
            $user->isAdmin = true;
            return redirect('/dashboard')->with('success', 'User registered successfully!');
            // Set user as admin
        }
    
        $user->save();
    
        return redirect('/')->with('success', 'User registered successfully!');
    }
    
    private function isAdmin($email, $password)
    {
        // Check if entered credentials match admin credentials
        return $email === 'admin@gmail.com' && $password === '123456789';
    }

    public function logout()
    {
    Auth::logout(); // Logout the user
    return redirect()->route('login')->with('success', 'You have been logged out.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
