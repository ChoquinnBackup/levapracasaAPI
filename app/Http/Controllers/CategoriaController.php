<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $categoria = Categoria::create([
            'name' => $request->input('name'),
        ]);
    
        return response()->json($categoria, 201);
    }
}