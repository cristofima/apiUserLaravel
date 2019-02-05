<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'cedula_us' => 'required|string|size:10|unique:users',
            'nombres_us' => 'required|string|min:3|max:25',
            'apellidos_us' => 'required|string|min:3|max:25',
            'fecha_nacimiento_us' => 'required|date',
            'telefono_us' => 'required|string|size:10',
            'codigo_postal_us' => 'required|string|min:3|max:8',
            'pais_us' => 'required|string|min:3|max:20',
            'provincia_us' => 'required|string|min:3|max:25',
            'ciudad_us' => 'required|string|min:3|max:25',
            'calle_uno_us' => 'required|string|min:3|max:40',
            'calle_dos_us' => 'required|string|min:3|max:40',
            'referencia_us' => 'required|string|min:3|max:30',
            'numero_casa_us' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user = new User($request->all());
        $user->save();
        return response()->json([
            'message' => 'Usuario creado satisfactoriamente'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Usuario y/o contraseña incorrectos'], 401);
        }

        $user = $request->user();

        return response()->json([
            'message' => 'Login satisfactorio', 'user' => $user]);

    }
}
