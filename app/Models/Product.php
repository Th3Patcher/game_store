<?php

namespace App\Models;

use PDO;

class Product extends Models
{
    const CHARACTER_LIMIT = 100;

    public function getProductsForCard()
    {
        $stmt = $this->database->prepare('SELECT * FROM product');

        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as &$product)
        {
            $product['description'] = $this->convertString($product['description']) ;
        }

        return $products;
    }

    public function getProductByCategories(array $id)
    {
        $str_search = "";

        for ($i = 0; $i < count($id); $i++) {
            if ($i == array_key_last($id)) {
                $str_search .= $id[$i];
            } else {
                $str_search .= $id[$i] . " OR category_id = ";
            }
        }

        $stmt = $this->database->prepare("SELECT DISTINCT * FROM product WHERE category_id = $str_search");
        $stmt->execute();

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as &$product)
        {
            $product['description'] = $this->convertString($product['description']) ;
        }

        return $products;
    }

    public function getProductBasket(array $data)
    {
        $str_search = "";

        for ($i = 0; $i < count($data); $i++) {
            if ($i == array_key_last($data)) {
                $str_search .= $data[$i];
            } else {
                $str_search .= $data[$i] . " OR id = ";
            }
        }

        $stmt = $this->database->prepare("SELECT DISTINCT * FROM product WHERE id = $str_search");
        $stmt->execute();

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as &$product)
        {
            $product['description'] = $this->convertString($product['description']) ;
        }

        return $products;
    }

    private function convertString($str) : string
    {
        return strlen($str) > self::CHARACTER_LIMIT ? substr_replace(substr($str, 0, self::CHARACTER_LIMIT), "...", -3) : $str;
    }
}