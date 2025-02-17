<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*   $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "email" => "required|email|unique:users",
            "to_paye" => "required|numeric",
        ]);
       $user = User::create(
            [
                "nom" => $request->nom,
                "prenom" => $request->prenom,
                "email" => $request->email,
                "to_paye" => $request->to_paye,
                "password" => "123456"
            ]
        );

        if ($user) { */
        return response()->json(true, 200);
        // }

        return response()->json($request, 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => true]) ){
            $user = Auth::user();
            return response()->json($user, 200);
        }
        return response()->json($request, 500);
    }
}
