<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string|min:6',
        ]);

        $usuario = Usuario::where('email', $validated['email'])->first();

        if ($usuario && Hash::check($validated['senha'], $usuario->senha)) {
            $token = JWTAuth::fromUser($usuario);
            return response()->json([
                'message' => 'Login realizado com sucesso!',
                'token' => $token,
                'user' => $usuario
            ], 200);
        }

        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6',
            'role' => 'required|string|max:255',
        ]);

        $validated['senha'] = Hash::make($validated['senha']);

        $usuario = Usuario::create($validated);

        return response()->json($usuario, 201);
    }


    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'senha' => 'nullable|string|min:6',
            'role' => 'required|string|max:255',
        ]);

        $usuario->update($validated);

        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(['message' => 'Usuário deletado com sucesso']);
    }
}
