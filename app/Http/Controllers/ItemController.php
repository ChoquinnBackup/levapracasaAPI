<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;

use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
    public function index(): JsonResponse{
        $items = Item::all();
        return response()->json(ItemResource::collection($items));
    }

    public function store(StoreItemRequest $request): JsonResponse{

        \Log::info('Dados recebidos:', $request->all());
        
        $item = Item::create($request->validated());

        return response()->json($item, 201);
    }

    public function show(Item $item): JsonResponse{
        return response()->json(new ItemResource($item));
    }

    public function update(UpdateItemRequest $request, Item $item): JsonResponse{
        $item->update($request->validated());
        return response()->json(new ItemResource($item));
    }

    public function destroy(Item $item): JsonResponse{
        $item->delete();
        return response()->json(null, 204);
    }
}
