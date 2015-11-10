<?php include_once(ROOT . '/view/layouts/header_admin.php'); ?>

<section>
    <div class="container">
        <div class="row">

                <h2>Панель администратора</h2>
                <h4><?php print 'Добро пожаловать, Администратор'; ?></h4>
                <ul>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                </ul>


        </div>
    </div>
</section>

<?php include_once(ROOT . '/view/layouts/footer_admin.php'); ?>
