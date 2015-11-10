<?php

class AdminController extends BaseAdmin
{

    public function actionIndex()
    {
        self::checkAdmin();

        require_once(ROOT . '/view/admin/index.php');
    }
}