<?php


class CartController
{
    public function actionIndex()
    {
        $categories=array();
        $categories=Category::getCategoryList();

        $productsInCart=false;

        $productsInCart=Cart::getProducts();

        if($productsInCart){
            $productsId = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsId);

            $summary= Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/view/cart/index.php');
    }

    public function actionAdd($id)
    {
        Cart::addProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function actionDelete($id)
    {
        Cart::delProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function actionAjaxAdd($id)
    {
        print Cart::addProduct($id);
        return true;


    }

    public function actionCheckout()
    {
        // Получием данные из корзины
        $productsInCart = Cart::getProducts();
        // Если товаров нет, отправляем пользователи искать товары на главную
        if ($productsInCart == false) {
            header("Location: /");
        }
        // Список категорий для левого меню
        $categories = Category::getCategoryList();
        // Находим общую стоимость
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);
        // Количество товаров
        $totalQuantity = Cart::countProducts();
        // Поля для формы
        $userName = false;
        $userPhone = false;
        $userComment = false;
        $userEmail = false;
        // Статус успешного оформления заказа
        $result = false;
        // Проверяем является ли пользователь гостем
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
            $userEmail = $user['email'];
        } else {
            // Если гость, поля формы останутся пустыми
            $userId = false;
        }
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $userName = $_POST['username'];
            $userPhone = $_POST['userphone'];
            $userComment = $_POST['usercomment'];
            $userEmail = $_POST['useremail'];
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный Email';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $result = Order::orderSave($userName, $userPhone, $userEmail, $userComment, $userId, $productsInCart);
                if ($result) {
                    // Если заказ успешно сохранен
                    // Оповещаем администратора о новом заказе по почте
                    $adminEmail = 'yuriyreva@gmail.ru';
                    $message = '<a href="study/admin/orders">Список заказов</a>';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);
                    // Очищаем корзину
                    Cart::cartClear();
                }
            }
        }
        // Подключаем вид
        require_once(ROOT . '/view/cart/checkout.php');
        return true;
    }
}