<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Services\ItemService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // protected $itemService;

    // public function __construct(ItemService $itemService)
    // {
    //     $this->itemService = $itemService;
    // }

    public function index()
    {
        // $items = $this->itemService->getItems();
        $users= User::with('roles')->get();
        return view('pages.user', [
            'users' => $users,
        ]);
    }


}