<?php


namespace Blx32\LaravelPagHiper;


class Item
{
    protected $item;


    public function add(string $description, int $price, $quantity, $id)
    {
        $item = [
            'description' => $description,
            'quantity' => $quantity ?? 1,
            'item_id' => $id ?? 1,
            'price_cents' => $price
        ];
        array_push($this->item, $item);
        return $this;
    }

    public function get()
    {
        return $this->item;
    }
}