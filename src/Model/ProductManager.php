<?php


namespace App\Model;


use App\Entity\Reference\Product;

interface ProductManager
{
    public function createProduct(Product $product): ?Product;

    public function getProductById(int $p_id): ?Product;
}