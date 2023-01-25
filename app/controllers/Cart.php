<?php

use App\Classes\Controller;

class Cart extends Controller {
    /**
     * Show cart
     *
     * @return void
     */
    public function index(): void
    {
        $model = $this->model('CartModel');

        echo $this->view($model->index());
    }

    /**
     * Add item to the cart
     *
     * @return void
     */
    public function add():void
    {
        // Instantiate the model
        $model = $this->model('CartModel');

        // Add item to the cart
        echo $model->add();
    }

    /**
     * Delete items in the cart
     *
     * @return void
     */
    public function delete()
    {
        // Instantiate the model
        $model = $this->model('CartModel');

        $model->delete();
    }

    /**
     * Remove item in the cart
     *
     * @return void
     */
    public function remove(): void
    {
        // Instantiate the model
        $model = $this->model('CartModel');

        $model->remove();
    }
}