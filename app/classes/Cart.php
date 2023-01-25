<?php

namespace App\Classes;

class Cart {
    private Cookies $cart;

    public function __construct()
    {
        // Use cart stored in the cookies
        $this->cart = new Cookies('cart');
    }

    /**
     * Show cart content
     *
     * @return array
     */
    public function show(): array
    {
        return $this->cart()->show();
    }

    /**
     * Return cart object
     *
     * @return Object
     */
    private function cart(): Object
    {
        return $this->cart;
    }

    /**
     * Add item to the cart
     *
     * @param array $item
     * @return bool
     */
    public function add(array $item): bool
    {
        return $this->cart()->add($item);
    }

    /**
     * Delete all items in the cart
     *
     * @return void
     */
    public function delete():void
    {
        $this->cart()->delete();
    }

    /**
     * Remove item in the cart
     *
     * @param int $id
     * @return void
     */
    public function remove(int $id): void
    {
        $this->cart()->remove($id);
    }
}