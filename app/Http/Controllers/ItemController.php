<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $items = $this->itemService->getItems();
        return view('pages.item', [
            'items' => $items,
        ]);
    }

    public function show(Request $request)
    { 
        $item = $this->itemService->getItemById($request->item);
        return new ItemResource($item);
    }

    public function store(Request $request)
    {
        $item = $this->itemService->storeItem($request->only(['item_code','name','unit']));
        return redirect()->route('items.index');
    }

    public function update(Request $request)
    {   
        $item = $this->itemService->updateItem($request->only(['item_code','name','unit']), $request->item);
        return redirect()->route('items.index');
    }

    public function destroy(Request $request)
    {
        $item = $this->itemService->destroyItem($request->item);
        return redirect()->route('items.index');
    }


}