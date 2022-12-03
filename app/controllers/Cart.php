<?php

use App\Classes\Controller;

class Cart extends Controller {
    public function index()
    {
        $model = $this->model('CartModel');

        echo $this->view($model->index());
    }

    public function add()
    {
        // Instantiate the model
        $model = $this->model('CartModel');

        // Add item to the cart
        echo $model->add();
    }
}