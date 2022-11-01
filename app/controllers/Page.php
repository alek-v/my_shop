<?php

use App\Classes\Controller;

class Page extends Controller {
    public function index()
    {
        // Instantiate the model
        $model = $this->model('PageModel');

        // Pass data from the model to the view
        return $this->view($model->index());
    }
}