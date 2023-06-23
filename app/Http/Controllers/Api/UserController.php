<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ])->save();

        return response()->json('User criado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Request $request)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Request $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json('User att. !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json('User deletado!');
    }
}
