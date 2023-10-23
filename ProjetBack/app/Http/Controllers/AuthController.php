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

        // $user->attach()

        return response()->json([
            "success" => "true",
            "data" => $user,
            "message" => "Utilisateur créé avec succés"

        ]);
    }

    public function login(Request $request)
    {
    //   $user=User::where(['email'=>$request->email,'password'=>$request->password])->get();
    //   return $user;
        if (!Auth::attempt($request->only("email", "password"))) {

            return response()->json([
                "success" => "true",
                "message" => "Invalid credentials"

            ]);
        }
        $user = Auth::user();
        $token = $user->createToken("token")->plainTextToken;

        $tok=cookie('myToken',$token);
        
        return response([
            "token" => $token,
            "name" => $user->name,
            "role" => $user->role,
            "email" => $user->email
           
        ])->withCookie($tok);
    }

    public function logout(Request $request)
    {
        
        $tokenDel = Auth::user()->tokens()->delete();
        return response([
            "message" => "Deconnexion réussie",
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
