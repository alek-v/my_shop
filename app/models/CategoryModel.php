<?php

class CategoryModel {
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