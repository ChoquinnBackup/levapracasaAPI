<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriasRequest;


class CategoriaController extends Controller
{
    public function index(int $id): JsonResponse
    {
        $cat = Item::where('category_id', $id)->get();

    if (!$cat) {
        return response()->json(['message' => 'Categoria não encontrada'], 404);
    }

    return response()->json($cat);
    }
}