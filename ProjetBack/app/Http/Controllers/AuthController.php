<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "role" => $request->role,
            "password" => $request->password,
        ]);
        
        return response()->json([
            "success" => "true",
            "data" => $user,
            "message" => "Utilisateur créé avec succés"
        
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
