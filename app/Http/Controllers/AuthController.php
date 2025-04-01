<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login(LoginRequest $request)
    {
        $usuario = Usuario::where('email', $request->input('email'))->first();

        if (!$usuario || !Hash::check($request->input('password'), $usuario->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        // Generar token con Sanctum
        $token = $usuario->createToken('token-name')->plainTextToken;

        return response()->json([
            'token' => $token,
            'usuario' => $usuario
        ], Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); // Elimina todos los tokens del usuario

        return response()->json(['message' => 'Cierre de sesión exitoso'], Response::HTTP_OK);
    }
}
