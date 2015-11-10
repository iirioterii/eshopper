<?php include_once(ROOT . '/view/layouts/header.php'); ?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
            <?php if($result):?>
                <p>Вы успешно зарегистрировались</p>
            <?php else: ?>
                <?php
                    if(isset($errors) && is_array($errors)){
                    foreach ($errors as $error){
                        echo "<br> $error";
                    }
                } ?>
                <div class="signup-form"><!--sign up form-->
                    <h2>Регистрация на сайте</h2>
                    <form method="post" action="#">
                        <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>" />
                        <input type="email" name="email" placeholder="Email"value="<?php echo  $email; ?>" />
                        <input type="password" name="password" placeholder="Пароль" />
                        <button type="submit" name="submit" class="btn btn-default">Регистрация</button>
                    </form>
                </div><!--/sign up form-->
            <?php endif; ?>
            </div>
        </div>
    </div>
</section><!--/form-->

<?php include_once(ROOT . '/view/layouts/footer.php'); ?>