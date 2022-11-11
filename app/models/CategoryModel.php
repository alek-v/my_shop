<?php

use App\Classes\Model;

class CategoryModel extends Model {
    /**
     * Return homepage data in array
     *
     * @return array
     */
    public function index(): array
    {
        $data['page_view'] = 'category';
        $data['content'] = array(
            'title' => 'Category'
        );

        return $data;
    }
}