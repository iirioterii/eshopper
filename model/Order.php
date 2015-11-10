<?php

class Order
{
    public static function orderSave($userName, $userPhone, $userEmail, $userComment, $userId, $products )
    {
        $db = Db::getConnection();
        $products=json_encode($products);

        $sql='INSERT INTO product_order (user_name, user_phone, user_email, user_comment, user_id, products)
            VALUES (:user_name, :user_phone, :user_email, :user_comment, :user_id, :products)';
        $result =$db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getOrderList()
    {
        $db=Db::getConnection();
        $orderList=array();

        $result = $db->query( "SELECT * FROM product_order ORDER BY date DESC " );

        $i=0;
        while($row = $result->fetch()){
            $orderList[$i]['id']=$row['id'];
            $orderList[$i]['user_name']=$row['user_name'];
            $orderList[$i]['user_email']=$row['user_email'];
            $orderList[$i]['user_phone']=$row['user_phone'];
            $orderList[$i]['user_id']=$row['user_id'];
            $orderList[$i]['date']=$row['date'];
            $orderList[$i]['status']=$row['status'];
            $i++;
        }
        return $orderList;
    }

    public static function getOrderById($orderId)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM product_order WHERE id = :orderId';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':orderId', $orderId, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение команды
        $result->execute();
        // Получение и возврат результатов
        return $result->fetch();
    }

    public static function getOrdersByUser($userId)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM product_order WHERE user_id = :userId';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->execute();

            $i = 0;
            while ($row = $result->fetch()) {
                $orderList[$i]['id'] = $row['id'];
                $orderList[$i]['user_name'] = $row['user_name'];
                $orderList[$i]['user_email'] = $row['user_email'];
                $orderList[$i]['user_phone'] = $row['user_phone'];
                $orderList[$i]['user_id'] = $row['user_id'];
                $orderList[$i]['date'] = $row['date'];
                $orderList[$i]['status'] = $row['status'];
                $i++;
            }
        if(!empty($orderList)){
            return $orderList;
        }
        return false;



    }

    public static function deleteOrderById($orderId)
    {
        $db=Db::getConnection();

        $sql='DELETE FROM product_order WHERE id=:orderId';
        $result=$db->prepare($sql);
        $result->bindParam(':orderId', $orderId, PDO::PARAM_INT);

        return $result->execute();
    }


    public static function updateOrderById($orderId, $options)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE product_order SET user_name=:userName, user_email=:userEmail,
                user_phone=:userPhone, user_comment=:userComment, date=:date,
                status=:status WHERE id=:orderId';

        $result=$db->prepare($sql);
        $result->bindParam(':orderId', $orderId, PDO::PARAM_INT);
        $result->bindParam(':userName', $options['userName'], PDO::PARAM_STR);
        $result->bindParam(':userEmail', $options['userEmail'], PDO::PARAM_STR);
        $result->bindParam(':userPhone', $options['userPhone'], PDO::PARAM_STR);
        $result->bindParam(':userComment', $options['userComment'], PDO::PARAM_STR);
        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        if($result->execute()){
            return true;
        }
        return false;
    }

    public static function getStatusText($status)
    {
        switch($status){
            case '1': print 'Новый заказ'; break;
            case '2': print 'В обработке'; break;
            case '3': print 'Доставляется'; break;
            case '4': print 'Выполнен'; break;
        }
    }

}