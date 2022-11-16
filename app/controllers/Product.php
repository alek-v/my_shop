<?php

use App\Classes\Controller;

class Product extends Controller {
    /**
     * Return page content
     *
     * @param array|null $params
     * @return string
     */
    public function index(?array $params): string
    {
        // Instantiate the model
        $model = $this->model('ProductModel');

        // Pass data to the view
        return $this->view($model->showProduct($params));
    }
}