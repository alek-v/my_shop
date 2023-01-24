<?php

use App\Classes\Model;
use App\Classes\Cart;
use App\Classes\ProcessPage;
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
        // Items from the cart
        $all_items = $this->cart->show();

        // Here we will store prepared item to show on the page
        $cart_items = '';

        foreach ($all_items as $item) {
            // Get data from the database
            $product_data = $this->db->selectData('products', ['product_id' => $item['product_id']])[0];

            // Prepare data for template
            $content['product_title'] = $product_data['product_title'];
            $content['product_quantity'] = $item['product_quantity'];

            $prepare_item = new ProcessPage('cart/cart_item', $content);
            $cart_items .= $prepare_item->output();
        }

        // Set d-none class in the page when cart is empty
        $display_items = empty($cart_items) ? ' d-none' : '';
        // Show information when cart is empty
        if (empty($cart_items)) $cart_items = 'Cart is empty';

        $page_data['page_view'] = 'cart/cart';
        $page_data['content'] = array(
            'cart_items' => $cart_items,
            'display_option' => $display_items
        );

        return $page_data;
    }

    /**
     * Delete all items in the cart
     *
     * @return void
     */
    public function delete():void
    {
        $this->cart()->delete();

        header('Location: /cart');
        exit;
    }
}