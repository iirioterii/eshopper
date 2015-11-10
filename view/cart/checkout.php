
<?php include_once(ROOT . '/view/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php print $categoryItem['id']; ?>"
                                           class="<?php if($categoryId == $categoryItem['id']) echo 'active';?>">
                                            <?php print $categoryItem['name']; ?>
                                        </a></h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>


            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>



                <?php if ($result): ?>
                    <p>Заказ оформлен. Мы Вам перезвоним.</p>
                <?php else: ?>

                <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, грн</p><br/>

                <?php if (!$result): ?>

                <div class="col-sm-4">
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>
                <div class="login-form">
                    <h2>Оформление заказа</h2>
                    <form method="post" action="#">
                        <input type="text" name="username" placeholder="Имя" value="<?php echo $userName; ?>" />
                        <input type="email" name="useremail" placeholder="Email" value="<?php echo $userEmail; ?>" />
                        <input type="text" name="userphone" placeholder="Телефон"/>
                        <input type="text" name="usercomment" placeholder="Комментарий к заказу"/>

                        <button type="submit" name="submit" class="btn btn-default">Оформить заказ</button>
                    </form> <br><br>


                </div>
            </div>
                    <?php endif; ?>

                <?php endif; ?>
        </div>
    </div>
        </div>
    </div>
</section><!--/form-->

<?php include_once(ROOT . '/view/layouts/footer.php'); ?>


