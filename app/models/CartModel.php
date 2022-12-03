<?php

use App\Classes\Model;
use App\Classes\Cart;
use Pimple\Container;

class CartModel extends Model {
    private Cart $cart;

    public function __construct(protected Container $container)
    {
        parent::__construct($container);

        $this->cart = new Cart();
    }

    /**
     * Return cart object to make it possible to manipulate with cart data in this class
     *
     * @return object
     */
    public function cart(): object
    {
        return $this->cart;
    }

    /**
     * Add item to the cart
     *
     * @return string
     */
    public function add(): string
    {
        // Receive json object
        $cart_item = json_decode(file_get_contents("php://input"), true);

        // Receive item data and create array with a data
        $product_id = $cart_item['product_id'];
        $product_quantity = isset($cart_item['product_quantity']) && !empty($cart_item['product_quantity']) ? $cart_item['product_quantity'] : 1;

        $item = [
            'product_id' => $product_id,
            'product_quantity' => $product_quantity
        ];

        // Add to the cart
        if ($this->cart()->add($item)) return 'Added to the cart successfully';

        return 'Error adding to the cart';
    }

    /**
     * Shopping cart main page
     *
     * @return array
     */
    public function index(): array
    {
        $page_data['page_view'] = 'cart';
        $page_data['content'] = array(
            'cart_items' => json_encode($this->cart->show())
        );

        return $page_data;
    }
}