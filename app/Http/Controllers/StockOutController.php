<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $item = $this->itemService->getItems();
        return view('pages.stock-out', [
            'items' => $item,
        ]);
    }

    public function stockOut(Request $request)
    {
        $stockItem = $this->itemService->stockOut($request->only(['amount']), $request->item);
        return $stockItem;
    }
}
