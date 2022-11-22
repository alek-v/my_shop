<?php

use App\Classes\Model;
use App\Classes\ProcessPage;

class CategoryModel extends Model {
    /**
     * Return homepage data in array
     *
     * @param string $category
     * @return array
     */
    public function index(string $category): array
    {
        // Retrieve category data
        $where = array('nice_name' => $category);
        $category_data = $this->db->selectData('category', $where)[0];

        $data['page_view'] = 'category';
        $data['content'] = array(
            'title' => $category_data['category_title']
        );

        // Select products
        $where = array('product_category' => $category_data['category_id']);
        $products = $this->db->selectData('products', $where);

        $data['content']['products'] = '';
        foreach ($products as $product) {
            // Data to put in category_elements/category_item template
            $product_data = [
                'product_link' => '<a href="/product/' . $product['product_id'] . '">' . $product['product_title'] . '</a>',
                'product_address' => '/product/' . $product['product_id'],
                'product_name' => $product['product_title'],
                'product_image_location' => '/upload/products/' . $product['product_image'],
                'product_price' => '$' . $product['product_price'] . ' USD'
            ];
            // Create product data from the template
            $current_product = new ProcessPage('category_elements/category_item', $product_data);

            // Add product to the list of the products
            $data['content']['products'] .= $current_product->output();
        }

        return $data;
    }
}