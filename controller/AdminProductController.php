<?php


class AdminProductController extends BaseAdmin
{
    public function actionIndex(){
        //проверка на админа
        self::checkAdmin();

        //получаем список продуктов
        $productsList = Product::getProductsList();

        require_once(ROOT . '/view/admin_product/index.php');

    }
    public function actionDelete($id){
        //проверка на админа
        self::checkAdmin();
        $product = Product::getProductById($id);
        if(isset($_POST['submit'])){
            Product::deleteProductById($id);
            header("Location: /admin/product");
        }



        require_once(ROOT . '/view/admin_product/delete.php');

    }

    public function actionCreate(){
        //проверка на админа
        self::checkAdmin();

        //Список всех категорий
        $categoriesList = Category::getCategoriesListAdmin();

        //если нажали сохранить
        if(isset($_POST['submit'])){
            $options['name']=$_POST['name'];
            $options['code']=$_POST['code'];
            $options['price']=$_POST['price'];
            $options['category_id']=$_POST['category_id'];
            $options['brand']=$_POST['brand'];
            $options['description']=$_POST['description'];
            $options['image']=$_FILES['image'];
            $options['avaliability']=$_POST['avaliability'];
            $options['is_new']=$_POST['is_new'];
            $options['is_recommended']=$_POST['is_recommended'];
            $options['status']=$_POST['status'];

            $errors=false;

            if(!isset($options['name']) || (empty($options['name']))){
                $errors[]='Заполните имя, не менее 3 символов';
            }

            if($errors == false) {
                $id = Product::createProduct($options);

                //если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "upload/images/products/{$id}.jpg");
                    }
                }

                //header("location: /admin/product");
            }

        }

        require_once(ROOT . '/view/admin_product/create.php');
    }

    public function actionUpdate($id){
        //проверка на админа
        self::checkAdmin();

        //Список всех категорий
        $categoriesList = Category::getCategoriesListAdmin();
        $product = Product::getProductById($id);

        //если нажали сохранить
        if(isset($_POST['submit'])){
            $options['name']=$_POST['name'];
            $options['code']=$_POST['code'];
            $options['price']=$_POST['price'];
            $options['category_id']=$_POST['category_id'];
            $options['brand']=$_POST['brand'];
            $options['description']=$_POST['description'];
            $options['avaliability']=$_POST['avaliability'];
            $options['is_new']=$_POST['is_new'];
            $options['is_recommended']=$_POST['is_recommended'];
            $options['status']=$_POST['status'];

            $errors=false;
            if(!isset($options['name']) || (strlen($options['name'])<3) || (empty($options['name']))){
                $errors[]='Заполните имя, не менее 3 символов';
            }

            if($errors == false) {
                $updateProduct=Product::updateProductById($id, $options);

                //если запись обновлена
                if ($updateProduct) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                }
                header("location: /admin/product");
            }

        }

        require_once(ROOT . '/view/admin_product/update.php');
    }

}