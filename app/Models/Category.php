<?php

namespace App\Models;

use PDO;

class Category extends Models
{
    public function getCategories()
    {
        $stmt = $this->database->prepare('SELECT * FROM category');

        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($categories == false) {
            return null;
        }

        return $categories;
    }
}