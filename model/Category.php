<?php


class Category
{
    public static function getCategoryList()
    {
        $db=Db::getConnection();
        $catList=array();

        $result = $db->query( "SELECT id, name FROM category WHERE status=1 ORDER BY sort_order ASC " );

        $i=0;
        while($row = $result->fetch()){
            $catList[$i]['id']=$row['id'];
            $catList[$i]['name']=$row['name'];
            $i++;

        }
        return $catList;
    }

    public static function getCategoriesListAdmin()
    {
        $db=Db::getConnection();
        $categoriesList=array();

        $result = $db->query( "SELECT * FROM category ORDER BY sort_order ASC " );

        $i=0;
        while($row = $result->fetch()){
            $categoriesList[$i]['id']=$row['id'];
            $categoriesList[$i]['name']=$row['name'];
            $categoriesList[$i]['status']=$row['status'];
            $categoriesList[$i]['sort_order']=$row['sort_order'];
            $i++;

        }
        return $categoriesList;
    }

    public static function getCategoryById($categoryId)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM category WHERE id = :id';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $categoryId, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение команды
        $result->execute();
        // Получение и возврат результатов
        return $result->fetch();
    }

    public static function deleteCategoryById($categoryId)
    {
        $db=Db::getConnection();

        $sql='DELETE FROM category WHERE id=:categoryId';
        $result=$db->prepare($sql);
        $result->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function createCategory($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO category (name, sort_order, status)
                VALUES (:name, :sort_order, :status)';

        $result=$db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if($result->execute()){
            return $db->lastInsertId();
        }
        return false;
    }

    public static function updateCategoryById($id, $options)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE category SET name=:name, sort_order=:sort_order, status=:status WHERE id=:id';

        $result=$db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if($result->execute()){
            return true;
        }
        return false;
    }

}