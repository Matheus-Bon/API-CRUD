<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $val = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $request->email)->with('Roles')->firstOrFail();

        if ($user && Hash::check($request->password, $user->password)) {

            $data['token_type'] = 'Bearer';
            $data['access_token'] = $user->createToken('auth_token')->accessToken;
            $data['user'] = $user;

            return response()->json($data, 200);

        }else {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

    }

    public function register(Request $request) 
    {
        $val = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $val['name'],
            'email' => $val['email'],
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->accessToken;
            
        return response()->json(['message' => 'Usuário registrado com sucesso', "tk" => $token], 201);

        
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        
        return response()->json(['message' => 'Desconectado.']);
    }
}
