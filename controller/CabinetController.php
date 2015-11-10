<?php


class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        include_once(ROOT . '/view/cabinet/index.php');
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $name = '';
        $pass = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $pass = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя должно быть не менее 2 символов';
            }


            if (!User::checkPassword($pass)) {
                $errors[] = 'Пароль должен быть не менее 6 символов';
            }


            if ($errors == false) {
                $result = User::edit($userId, $name, $pass);


            }


        }

        include_once(ROOT . '/view/cabinet/edit.php');
    }

    public function actionHistory()
    {
        $userId = User::checkLogged();

        //получаем список заказов конкретного пользователя
        $orderList = Order::getOrdersByUser($userId);


        require_once(ROOT . '/view/cabinet/history.php');
    }



    public static function actionView($orderId)
    {
        //получаем ID пользователя
        $userId = User::checkLogged();
        //получаем инф. о заказе для вывода во вьюху
        $order = Order::getOrderById($orderId);
        if ($userId === $order['user_id']) {
            //Получаем в виде массива кол-во товаров и id
            $productsQuantity = json_decode($order['products'], true);

            //получаем Ids
            $productsIds = array_keys($productsQuantity);

            //получаем по Ids продукты
            $products = Product::getProductsByIds($productsIds);
        } else {
            die('Access Denied');
        }

        require_once(ROOT . '/view/cabinet/view.php');

    }
}