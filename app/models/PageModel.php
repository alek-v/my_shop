<?php

class PageModel {
    /**
     * Return homepage data in array
     *
     * @return array
     */
    public function index(): array
    {
        $data['page_view'] = 'index';
        $data['content'] = array(
            'title' => 'My Shop'
        );

        return $data;
    }
}