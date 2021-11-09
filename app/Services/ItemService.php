<?php

namespace App\Services;

use App\Repositories\ItemRepository;

class ItemService {
    
    public function __construct(ItemRepository $itemRepository) {
        $this->itemRepository = $itemRepository;
    }

    public function getItems() {
        return $this->itemRepository->getAll();   
    }

    public function getItemById($id)
    {
        return $this->itemRepository->getById($id);
    }

    public function storeItem($data) {
        return $this->itemRepository->store($data);
    }

    public function updateItem($data, $id)
    {
        return $this->itemRepository->update($data, $id);
    }

    public function destroyItem($id)
    {
        return $this->itemRepository->destroy($id);
    }

    public function stockIn($data, $id)
    {
        return $this->itemRepository->stockIn($data, $id);
    }
    
}