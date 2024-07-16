<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

/**
 * @OA\Info(title="Item API", version="1.0")
 */
class ItemController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/items",
     *     summary="List all items",
     *     @OA\Response(response="200", description="An Items list"),
     *    @OA\Response(response="404", description="No items found"),
     * )
     */
    public function index()
    {
        \Log::info('Items index route hit');
        $items = Item::all();
        return response()->json(['data' => $items], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/items/{id}",
     *     summary="Search an item by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Item details"),
     *     @OA\Response(response="404", description="Item not found"),
     * )
     */
    public function show($id)
    {
        $item = Item::find($id);
        if ($item) {
            return response()->json($item);
        } else {
            return response()->json(['error' => 'Item not found'], 404);
        }
    }
}

