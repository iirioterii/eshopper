<?php include_once(ROOT . '/view/layouts/header.php'); ?>

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php
                    if(isset($error) && is_string($error)){
                           echo "<br> $error";
                    }
                    ?>
                    <div class="signup-form"><!--sign up form-->
                        <h2>Авторизация</h2>
                        <form method="post" action="#">
                            <input type="email" name="email" placeholder="Email"/>
                            <input type="password" name="password" placeholder="Пароль"/>
                            <button type="submit" name="submit" class="btn btn-default">Вход</button>
                        </form>
                    <p><a href="/user/register">Зарегистрироваться?</p>

                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php include_once(ROOT . '/view/layouts/footer.php'); ?>


