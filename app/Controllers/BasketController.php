<?php

namespace App\Controllers;

use App\Models\Product;

class BasketController extends AppController
{

    public function add_basket_product()
    {
        if ($this->isGet()) {
            $id = $this->PostDataJson()['id'];
            if (!array_key_exists('basket_list', $_SESSION)) {
                $_SESSION['basket_list'] = $id;
            } else {
                $list_basket = explode(',', $_SESSION['basket_list']);
                array_push($list_basket, $id);
                $_SESSION['basket_list'] = implode(',', $list_basket);
            }
        }

        return $this->render('login_user/product_in');
    }

    public function list_basket_page()
    {
        return $this->render('login_user/basket');
    }

    public function list_basket_request()
    {
        $product = new Product();
        $list_basket = explode(',', $_SESSION['basket_list']);
        return $this->returnInfo($product->getProductBasket($list_basket));
    }

    public function delete_basket_request()
    {
        if ($this->isGet()) {
            $id = $this->PostDataJson()['id'];
            $list_basket = explode(',', $_SESSION['basket_list']);

            $new_array = array_combine($list_basket,$list_basket);
            unset($new_array[$id]);
            $_SESSION['basket_list'] = implode(',', $new_array);
        }
        return $this->render('login_user/basket');
    }


}