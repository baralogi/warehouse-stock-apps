<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Services\ItemService;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $item = $this->itemService->getItems();
        return view('pages.stock-in', [
            'items' => $item,
        ]);
    }

    public function stockIn(Request $request)
    {
        $stockItem = $this->itemService->stockIn($request->only(['amount']), $request->item);
        return $stockItem;
    }

}
