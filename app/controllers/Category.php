<?php

use App\Classes\Controller;

class Category extends Controller {
    public function index()
    {
        // Instantiate the model
        $model = $this->model('CategoryModel');

        // Pass data from the model to the view
        return $this->view($model->index());
    }
}