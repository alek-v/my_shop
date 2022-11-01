<?php

namespace App\Classes;

abstract class Controller {
    /**
     * Instantiate and return model object
     *
     * @param $model
     * @return object
     */
    protected function model($model): object
    {
        require BASEDIR . 'app/models/' . $model . '.php';

        // Instantiate model object
        return new $model();
    }

    /**
     * Return content of the page ready to display
     *
     * @param array $page_data
     * @return string
     */
    protected function view(array $page_data): string
    {
        $page = new ProcessPage($page_data['page_view'], $page_data['content']);

        return $page->output();
    }
}