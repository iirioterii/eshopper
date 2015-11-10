<?php

class User
{

    public static function register($name, $email, $pass)
    {
        $db = Db::getConnection();
        var_dump($pass);
        $pass=md5($pass);
        var_dump($pass);
        $sql = 'INSERT INTO user (name, email, password) VALUES (:name, :email, :pass)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function  edit($userId, $name, $pass)
    {
        $db = Db::getConnection();
        $pass=md5($pass);

        $sql = 'UPDATE user SET name=:name, password=:pass WHERE id=:id';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);

        return $result->execute();
    }



    public static function checkName($name)
    {
        if(strlen($name)>2){
            return true;
        }
        return false;

    }

    public static function checkPhone($phone)
    {
        if(strlen($phone)>8){
            return true;
        }
        return false;

    }

    public static function checkPassword($pass)
    {
        if(strlen($pass)>6){
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function checkEmailExist($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        $result= $db->prepare($sql);

        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        //var_dump($result->fetchColumn());
        if($result->fetchColumn())
            return false;
        return true;
    }

    public static function checkUserData($email, $pass)
    {
        $db = Db::getConnection();
        var_dump($pass);
        $pass=md5($pass);
        var_dump($pass);
        $sql = 'SELECT * FROM user WHERE email=:email AND password=:pass';

        $result=$db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);
        $result->execute();
        $user=$result->fetch();
        if($user){
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user']=$userId;
    }
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function checkLogged()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location: /user/login/");
    }

    public static function isAuth()
    {
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;
    }

    public static function getUserById($userId)
    {
        if($userId) {
            $db = Db::getConnection();

            $sql = 'SELECT * FROM user WHERE id=:id';

            $result=$db->prepare($sql);
            $result->bindParam(':id', $userId, PDO::PARAM_INT) ;
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }

    public static function checkAdmin()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if($user['role'] == 'admin'){
            return true;
        }
       return false;
    }

}