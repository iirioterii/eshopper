<?php

class AdminCategoryController extends BaseAdmin
{
    public function actionIndex(){
        //проверка на админа
        self::checkAdmin();

        //получаем список категорий
        $categoriesList = Category::getCategoriesListAdmin();

        require_once(ROOT . '/view/admin_category/index.php');
    }

    public function actionDelete($categoryId){
        //проверка на админа
        self::checkAdmin();
        //получаем инф. о категории для вывода во вьюху
        $category = Category::getCategoryById($categoryId);

        if(isset($_POST['submit'])){
            Category::deleteCategoryById($categoryId);
            header("Location: /admin/category");
        }

        require_once(ROOT . '/view/admin_category/delete.php');
    }

    public function actionCreate(){
        //проверка на админа
        self::checkAdmin();

        //Список всех категорий
        $categoriesList = Category::getCategoriesListAdmin();

        //если нажали сохранить
        if(isset($_POST['submit'])){
            $options['name']=$_POST['name'];
            $options['sort_order']=$_POST['sort_order'];
            $options['status']=$_POST['status'];

            $errors=false;
            if(!isset($options['name']) || (empty($options['name']))){
                $errors[]='Заполните имя, не менее 3 символов';
            }

            if(!is_numeric($options['sort_order'])){
                $errors[]='Поле сортировка должно быть целым числом';
            }

            if($errors == false) {
                $id = Category::createCategory($options);
                header("location: /admin/category");
            }

        }

        require_once(ROOT . '/view/admin_category/create.php');
    }


    public function actionUpdate($id){
        //проверка на админа
        self::checkAdmin();


        $category = Category::getCategoryById($id);

        //если нажали сохранить
        if(isset($_POST['submit'])){
            $options['name']=$_POST['name'];
            $options['sort_order']=$_POST['sort_order'];
            $options['status']=$_POST['status'];

            $errors=false;
            if(!isset($options['name']) || (strlen($options['name'])<3) || (empty($options['name']))){
                $errors[]='Заполните имя, не менее 3 символов';
            }

            if(!is_numeric($options['sort_order'])){
                $errors[]='Поле сортировка должно быть целым числом';
            }

            if($errors == false) {
                $updateCategory=Category::updateCategoryById($id, $options);
                header("location: /admin/category");
            }

        }

        require_once(ROOT . '/view/admin_category/update.php');
    }
}