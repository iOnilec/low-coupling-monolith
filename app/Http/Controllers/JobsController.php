<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobsRequest;
use App\Models\Job;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $jobs = Job::all();

            return response()->json([
                'status' => 200,
                'message' => 'Requisição feita com sucesso.',
                'data' => $jobs,
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
    public function store(JobsRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $job = Job::create($data);

            return response()->json([
                'status' => 201,
                'message' => 'Cargo registrado com sucesso.',
                'data' => $job,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Erro interno do servidor.',
                'exception' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $job = Job::find($id);

            if (!$job) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Cargo não encontrado.',
                ], 404);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Requisição feita com sucesso.',
                'data' => $job
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
    public function update(JobsRequest $request, string $id): JsonResponse
    {
        try {
            $data = $request->validated();

            $job = Job::find($id);

            if (!$job) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Cargo não encontrado.',
                ], 404);
            }

            $job->update($data);

            return response()->json([
                'status' => 200,
                'message' => 'Cargo atualizado com sucesso.',
                'data' => $job,
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
    public function destroy(string $id): JsonResponse
    {
        try {
            $job = Job::find($id);

            if (!$job) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Cargo não encontrado.',
                ], 404);
            }

            $job->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Cargo deletado com sucesso.',
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
