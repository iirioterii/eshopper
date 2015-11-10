<?php

class UserController
{
    //Логин, если юзер - в личный кабинет, если админ - в панель администратора
    public function actionLogin()
    {
        if(isset($_POST['submit'])){
            $email=$_POST['email'];
            $pass=$_POST['password'];

            $error=false;
            var_dump($pass);
            $userId = User::checkUserData($email, $pass);

            if($userId == false){
                $error='Неверные данные';
            } else{
                $userData=User::getUserById($userId);
                if($userData['role']=='admin'){
                    User::auth($userId);
                    header("Location: /admin/");
                } else {
                    User::auth($userId);
                    header("Location: /cabinet/");
                }
            }

        }

        include_once(ROOT . '/view/user/login.php');
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }


    public function actionRegister()
    {
        $name='';
        $email='';
        $pass='';
        $result = false;

        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $pass=$_POST['password'];

            $errors=false;

            if(!User::checkName($name)){
                $errors[] = 'Имя должно быть не менее 2 символов';
            }
            if(!User::checkEmail($email)){
                $errors[] = 'Неправильный email';
            }

            if(!User::checkPassword($pass)){
                $errors[] = 'Пароль должен быть не менее 6 символов';
            }

            if(!User::checkEmailExist($email)){
                $errors[] = 'Email уже существует';
            }

            if($errors==false){
                $result = User::register($name, $email, $pass);


            }
        }





        include_once(ROOT . '/view/user/register.php');
    }
}