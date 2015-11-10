<?php

class Product
{
    const SHOW_BY_DEFAULT=6;

    public static function getProductsList()
    {
        $db=Db::getConnection();

        $result=$db->query("SELECT id, name, code, price FROM product
                            WHERE status=1 ORDER BY id ASC");

        $i=0;
        while($row=$result->fetch()){
            $productList[$i]['id']=$row['id'];
            $productList[$i]['name']=$row['name'];
            $productList[$i]['code']=$row['code'];
            $productList[$i]['price']=$row['price'];
            $i++;
        }

        return $productList;
    }

    public static function getLatestProduct($count=self::SHOW_BY_DEFAULT)
    {
        $count=intval($count);

        $db=Db::getConnection();

        $result=$db->query("SELECT id, name, image, price, is_new FROM product
                            WHERE status=1 ORDER BY id DESC LIMIT $count");

        $i=0;
        while($row=$result->fetch()){
            $productList[$i]['id']=$row['id'];
            $productList[$i]['name']=$row['name'];
            $productList[$i]['image']=$row['image'];
            $productList[$i]['price']=$row['price'];
            $productList[$i]['is_new']=$row['is_new'];
             $i++;
        }

        return $productList;
    }

    public static function getRecommendedProducts()
    {

        $db=Db::getConnection();

        $result=$db->query("SELECT id, name, image, price, is_new FROM product
                            WHERE status=1 AND is_recommended=1 ORDER BY id DESC");

        $i=0;
        while($row=$result->fetch()){
            $productList[$i]['id']=$row['id'];
            $productList[$i]['name']=$row['name'];
            $productList[$i]['image']=$row['image'];
            $productList[$i]['price']=$row['price'];
            $productList[$i]['is_new']=$row['is_new'];
            $i++;
        }

        return $productList;
    }

    public static function getProductsByCategory($categoryId=false, $page=1, $count=self::SHOW_BY_DEFAULT)
    {
        if($categoryId){
            $page=intval($page);
            $offset=($page-1)*$count;

            $db=Db::getConnection();

            $result=$db->query("SELECT id, name, image, price, is_new FROM product
                            WHERE status='1' AND category_id='$categoryId' ORDER BY id DESC LIMIT $count OFFSET $offset");

            $i=0;
            $products=array();
            while($row=$result->fetch()){
                $products[$i]['id']=$row['id'];
                $products[$i]['name']=$row['name'];
                $products[$i]['image']=$row['image'];
                $products[$i]['price']=$row['price'];
                $products[$i]['is_new']=$row['is_new'];
                $i++;
            }
        }
        return $products;
    }

    public static function getProductByIdStatus($productId)
    {
        $db=Db::getConnection();
        if($productId) {
            $result = $db->query("SELECT * FROM product WHERE status=1 AND id=$productId");
            $result->setFetchMode(PDO::FETCH_ASSOC);

        }
        return $result->fetch();
    }

    public static function getProductById($productId)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM product WHERE id = :id';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $productId, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        return $result->fetch();
    }

    public static function createProduct($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product (name, code, price, category_id, brand, avaliability,
                description, is_new, is_recommended, status)
                VALUES (:name, :code, :price, :category_id, :brand, :avaliability,
                :description, :is_new, :is_recommended, :status)';

        $result=$db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':avaliability', $options['avaliability'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if($result->execute()){
            return $db->lastInsertId();
        }
        return false;
    }

    public static function updateProductById($id, $options)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE product SET name=:name, code=:code, price=:price, category_id=:category_id,
                brand=:brand, avaliability=:avaliability, description=:description, is_new=:is_new,
                is_recommended=:is_recommended, status=:status WHERE id=:id';

        $result=$db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':avaliability', $options['avaliability'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if($result->execute()){
            return true;
        }
        return false;
    }

    public static function deleteProductById($productId)
    {
        $db=Db::getConnection();

        $sql='DELETE FROM product WHERE id=:productId';
        $result=$db->prepare($sql);
        $result->bindParam(':productId', $productId, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getProductsByIds($idsArray)
    {
        $db=Db::getConnection();

        $ids=implode(',', $idsArray);

        $result=$db->query("SELECT * FROM product WHERE status=1 AND id IN ($ids)");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;
        while($row=$result->fetch()) {
            $products[$i]['id']=$row['id'];
            $products[$i]['name']=$row['name'];
            $products[$i]['code']=$row['code'];
            $products[$i]['price']=$row['price'];
            $i++;
        }
        return $products;
    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(id) AS count FROM product WHERE status=1 AND category_id=$categoryId");

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $total=$result->fetch();

        return $total['count'];
    }

    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/upload/images/products/';
        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }
        // Возвращаем путь изображения-пустышки

        return $path . $noImage;
    }

}