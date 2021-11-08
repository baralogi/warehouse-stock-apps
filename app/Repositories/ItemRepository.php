<?php

namespace App\Repositories;

use App\Item;

class ItemRepository
{
    protected $permit;


    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function getAll()
    {
        return $this->item->get();
    }

    public function getById($id)    
    {
        return $this->item->where('id', $id)->first();
    }

    public function store($data)
    {
        return $this->item->create($data);
    }

    public function update($data, $id)
    {
        return $this->item->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return $this->item->where('id', $id)->delete();
    }
}
