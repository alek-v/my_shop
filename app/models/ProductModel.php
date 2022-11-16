<?php

use App\Classes\Model;

class ProductModel extends Model {
    /**
     * Return array with a product data
     *
     * @param array $params
     * @return array
     */
    public function showProduct(array $params): array
    {
        // Product id
        $product_id = $params[0];

        // Product data
        $product_data = $this->db->selectData('products', ['product_id' => $product_id])[0];

        $page_data['page_view'] = 'product';
        $page_data['content'] = array(
            'title' => $product_data['product_title'],
            'product_name' => $product_data['product_title']
        );

        return $page_data;
    }
}