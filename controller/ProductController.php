<?php


class ProductController
{
    public function actionView($productId)
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $product = Product::getProductByIdStatus($productId);
        

        require_once(ROOT . '/view/product/product-details.php');
    }
}