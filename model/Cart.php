<?php

class Cart
{
    public static function addProduct($id)
    {
        $id=intval($id);

        $productsInCart=array();

        //если товар есть в сессии записываем в в массив
        if(isset($_SESSION['products'])){
            $productsInCart=$_SESSION['products'];
        }

        if(array_key_exists($id, $productsInCart)){
            $productsInCart[$id]++;
        } else {
            $productsInCart[$id]=1;
        }

        $_SESSION['products']=$productsInCart;
        return self::countProducts();
    }

    public static function delProduct($id)
    {
        $productsInCart=self::getProducts();
        unset($productsInCart[$id]);
        $_SESSION['products'] = $productsInCart;
    }

    public static function getProducts()
    {
        if(isset($_SESSION['products'])){
            return $_SESSION['products'];
        }
        return false;
    }

    public static function countProducts()
    {
        if(isset($_SESSION['products'])){
            $count=0;

            foreach($_SESSION['products'] as $id=>$quantity){
                $count += $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getTotalPrice($products)
    {
        $productsInCart= self::getProducts();
        $summary = 0;
        if ($productsInCart) {
            foreach ($products as $product){
                $summary += $product['price'] * $productsInCart[$product['id']];
            }
        }
        return $summary;
    }

    public static function cartClear()
    {
        if(isset($_SESSION['products'])){
            unset($_SESSION['products']);
        }
    }
}