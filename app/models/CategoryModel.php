<?php

use App\Classes\Model;

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
            $data['content']['products'] .= '<div class="product-container item">
                <p><a href="/product/' . $product['product_id'] . '">' . $product['product_title'] . '</a></p>
                </div>';
        }

        return $data;
    }
}