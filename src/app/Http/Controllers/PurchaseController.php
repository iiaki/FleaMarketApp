<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class PurchaseController extends Controller
{
    public function show($id)
    {
        $item = Item::findOrFail($id); // 商品情報を取得
        return view('purchase', compact('item'));
    }
}
