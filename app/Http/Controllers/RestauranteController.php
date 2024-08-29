<?php

namespace App\Http\Controllers;

use  App\Http\Services\RestauranteService;
use Illuminate\Http\JsonResponse;

class RestauranteController extends Controller
{
    protected $restauranteService;

    public function __construct(RestauranteService $restauranteService)
    {
        $this->restauranteService = $restauranteService;
    }

    public function index(): JsonResponse
    {
       $restaurantes = $this->restauranteService->getRestaurantes();
       return response()->json($restaurantes);
    }

    public function updateList(): JsonResponse
    {
        $this->restauranteService->apiConexion();
        $restaurantes = $this->restauranteService->getRestaurantes();
        return response()->json([
            'status' => 'success',
            'data' => $restaurantes,
            'message' => 'Lista de restaurantes actualizada'
        ]);
    }

    public function show($id): JsonResponse
    {
        $restaurante = $this->restauranteService->getRestaurante($id);
        return response()->json($restaurante);
    }
}
