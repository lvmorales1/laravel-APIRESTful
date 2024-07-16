<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

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
