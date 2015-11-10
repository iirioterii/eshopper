<?php

return array(

    'product/([0-9]+)'  => 'product/view/$1', // Роут для товаров. контроллер product акшен product
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //для выборки товаров по категориям
    'category/([0-9]+)' => 'catalog/category/$1', //для выборки товаров по категориям
    'catalog'           => 'catalog/index', //каталог
    'cabinet/edit'      => 'cabinet/edit', // личный кабинет
    'cabinet/history'   => 'cabinet/history', //история заказов
    'cabinet/view'   => 'cabinet/view', //деталнее инф о заказе
    'cabinet'           => 'cabinet/index', // личный кабинет
    'user/register'     => 'user/register', //регистрация юзеров
    'user/login'        => 'user/login', //авторизация юзеров
    'user/logout'       => 'user/logout', //логаут юзеров
    //'cart/add/([0-9]+)' => 'cart/add/$1', //корзина добавить
    'cart/ajaxAdd/([0-9]+)' => 'cart/ajaxAdd/$1', //корзина добавить AJAX
    'cart/delete/([0-9]+)'  => 'cart/delete/$1', //корзина удаление
    'cart/checkout'=>'cart/checkout', //страница оформления заказа
    'cart'  => 'cart/index', // страница корзины
    //админпанель - управление категориями
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update' => 'adminCategory/update',
    'admin/category/delete' => 'adminCategory/delete',
    'admin/category'        => 'adminCategory/index',
    //админпанель - управление товарами
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update' => 'adminProduct/update',
    'admin/product/delete' => 'adminProduct/delete',
    'admin/product'        => 'adminProduct/index',
    //админпанель - управление заказами
    'admin/order/create' => 'adminOrder/create',
    'admin/order/update' => 'adminOrder/update',
    'admin/order/delete' => 'adminOrder/delete',
    'admin/order/view'   => 'adminOrder/view',
    'admin/order'        => 'adminOrder/index',

    'admin' => 'admin/index', // админпанель
    'contacts'          => 'site/contacts', //обратная связь
    'about' => 'site/about', // о магазине
    ''                  => 'site/index', //вызов контроллера site акшена index

);