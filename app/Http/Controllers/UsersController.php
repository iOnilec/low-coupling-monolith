<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::all();

            return response()->json([
                'status' => 200,
                'message' => 'Requisição feita com sucesso.',
                'data' => $users,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Erro interno do servidor.',
                'exception' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersRequest $request)
    {
        try {
            $validated = $request->validated();

            $user = User::create($validated);

            return response()->json([
                'status' => 201,
                'message' => 'Usuário registrado com sucesso.',
                'data' => $user,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Erro interno do servidor.',
                'data' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $users_id)
    {
        try {
            $id = User::where('users_id', $users_id)->first();

            if (!$id) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Usuário não encontrado.'
                ], 404);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Requisição feita com sucesso.',
                'data' => $id,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Erro interno do servidor.',
                'exception' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersRequest $request, string $users_id)
    {
        try {
            $validated = $request->validated();

            $id = User::where('users_id', $users_id)->first();

            if (!$id) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Usuário não encontrado.'
                ], 404);
            }

            $id->update($validated);

            return response()->json([
                'status' => 200,
                'message' => 'Usuário atualizado com sucesso.',
                'data' => $id,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Erro interno do servidor.',
                'exception' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $users_id)
    {
        try {
            $id = User::where('users_id', $users_id)->first();

            if (!$id) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Usuário não encontrado.'
                ], 404);
            }

            $id->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Usuário deletado com sucesso.',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Erro interno do servidor.',
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
}
