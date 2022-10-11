<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');


}


public function update(Request $request)
{
    $validated = $request->validate( [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255',],
        'old-password' => ['required', 'string', 'min:8'],
        'new-password' => ['required', 'string', 'min:8'],
    ]);
    if ( !Hash::check($validated['old-password'], Auth::user()->password) ) {
    }
       
     else{User::where('id', Auth::user()->id)
        ->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['new-password']),

        ]);}
    return redirect()->route('profile');
    }
}