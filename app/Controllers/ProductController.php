<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductController extends AppController
{
    protected function checkLogin() : bool
    {
        if (array_key_exists('user', $_SESSION)) {
            return true;
        }

        return false;
    }

    public function product_list()
    {
        $product = new Product();
        $data = $product->getProductsForCard();
        $data['checkLogin'] = $this->checkLogin();
        return $this->returnInfo($data);
    }

    public function product_list_by_category_id()
    {
        $data = $this->PostDataJson();
        $product = new Product();
        if(!array_key_exists('category_id',$data))
        {
            return $this->product_list();
        }

        $result = $product->getProductByCategories($data['category_id']);

        return $this->returnInfo($result);
    }

    public function category_list()
    {
        $category = new Category();
        $data = $category->getCategories();

        return $this->returnInfo($data);
    }

}