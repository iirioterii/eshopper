<?php include_once(ROOT . '/view/layouts/header.php'); ?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
            <?php if($result):?>
            <p>Данные успешно изменены</p>
            <?php else: ?>

                <?php
                    if(isset($errors) && is_array($errors)){
                    foreach ($errors as $error){
                        echo "<br> $error";
                    }
                } ?>
                <div class="signup-form">
                    <h2>Изменение данных</h2>
                    <form method="post" action="#">
                        <p>Новое имя</p>
                        <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>" />
                        <p>Новый пароль</p>
                        <input type="password" name="password" placeholder="Пароль" />
                        <button type="submit" name="submit" class="btn btn-default">Изменить</button>
                    </form>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section><!--/form-->

<?php include_once(ROOT . '/view/layouts/footer.php'); ?>