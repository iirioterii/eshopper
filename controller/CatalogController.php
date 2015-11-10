<?php

class CatalogController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();
        $latestProducts = Product::getLatestProduct(6);


        require_once(ROOT . '/view/catalog/index.php');

    }

    public function actionCategory($categoryId, $page=1)
    {
        //Получаем категории
        $categories = array();
        $categories = Category::getCategoryList();

        //Получаем все продукты заданной категории
        $products = array();
        $products = Product::getProductsByCategory($categoryId, $page);

        //Получаем количетво всех товаров из заданной категории
        $total = Product::getTotalProductsInCategory($categoryId);

        //Создаем объект пагинации, во вьюхе потом вызывает метод get, который генерирует код для пагинаци
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');


        require_once(ROOT . '/view/catalog/category.php');
    }

}