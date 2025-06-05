<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index($id): JsonResponse
    {
         // Buscar a categoria pelo id com os itens relacionados
        $categoria = Categoria::with('items')->find($id);

    if (!$categoria) {
        return response()->json(['message' => 'Categoria não encontrada'], 404);
    }

    return response()->json($categoria);
    }
}