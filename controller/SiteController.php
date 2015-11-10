<?php

class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();
        $latestProducts = Product::getLatestProduct(6);
        $recommendedProducts = Product::getRecommendedProducts();


        require_once(ROOT . '/view/site/index.php');

    }

    public function actionContacts()
    {
        $userEmail = '';
        $name = '';
        $message = '';
        $subject = '';
        $result = false;
        $adminEmail = 'yuriyreva@gmail.com';

        if(isset($_POST['submit'])){
            $userEmail = $_POST['userEmail'];
            $name = $_POST['name'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $errors=false;

            if(!User::checkName($name)){
                $errors[]='Имя должно быть не менее 2 символов';
            }

            if(!User::checkEmail($userEmail)){
                $errors[]='Неверный email';
            }

            if($errors==false){
                $fullMessage = "Текст: $message \n От: $name  Email: $userEmail";
                $result = mail($adminEmail, $subject, $fullMessage);
            }
        }

        require_once(ROOT . '/view/site/contacts.php');
    }

    public function actionAbout()
    {
        require_once(ROOT . '/view/site/about.php');
    }

}