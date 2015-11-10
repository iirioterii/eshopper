<?php


class AdminOrderController extends BaseAdmin
{
    public function actionIndex(){
        //проверка на админа
        self::checkAdmin();

        //получаем список категорий
        $orderList = Order::getOrderList();

        require_once(ROOT . '/view/admin_order/index.php');
    }

    public function actionDelete($orderId){
        //проверка на админа
        self::checkAdmin();

        if(isset($_POST['submit'])){
            Order::deleteOrderById($orderId);
            header("Location: /admin/order");
        }

        require_once(ROOT . '/view/admin_order/delete.php');
    }


    public function actionUpdate($orderId){
        //проверка на админа
        self::checkAdmin();

        //получаем инф. о заказе для вывода во вьюху
        $order = Order::getOrderById($orderId);

        //если нажали сохранить
        if(isset($_POST['submit'])){
            $options['userName']=$_POST['userName'];
            $options['userEmail']=$_POST['userEmail'];
            $options['userPhone']=$_POST['userPhone'];
            $options['userComment']=$_POST['userComment'];
            $options['date']=$_POST['date'];
            $options['status']=$_POST['status'];

            //Валидация
            $errors=false;
            if(!isset($options['userName']) || (strlen($options['userName'])<3) || (empty($options['userName']))){
                $errors[]='Заполните имя, не менее 2 символов';
            }
            if(!User::checkEmail($options['userEmail'])){
                $errors[]='Неверный email';
            }

//            if(!is_numeric($options['sort_order'])){
//                $errors[]='Поле статус должно быть целым числом';
//            }
            //если нет ошибок, то обновить
            if($errors == false) {
                $updateOrder=Order::updateOrderById($orderId, $options);
                header("location: /admin/order");
            }

        }

        require_once(ROOT . '/view/admin_order/update.php');
    }

    public static function actionView($orderId)
    {
        self::checkAdmin();

        //получаем инф. о заказе для вывода во вьюху
        $order = Order::getOrderById($orderId);

        //Получаем в виде массива кол-во товаров и id
        $productsQuantity = json_decode($order['products'], true);

        //получаем Ids
        $productsIds = array_keys($productsQuantity);

        //получаем по Ids продукты
        $products = Product::getProductsByIds($productsIds);

        require_once(ROOT . '/view/admin_order/view.php');

    }

}