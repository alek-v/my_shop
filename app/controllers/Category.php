<?php

use App\Classes\Controller;

class Category extends Controller {
    /**
     * Return page content
     *
     * @param array|null $params
     * @return string
     */
    public function index(?array $params): string
    {
        // Instantiate the model
        $model = $this->model('CategoryModel');

        // Pass data from the model to the view
        return $this->view($model->index($params[0]));
    }
}