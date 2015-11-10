<?php include_once(ROOT . '/view/layouts/header.php'); ?>

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <?php if($result): ?>
                        <p>Cообщение отправлено, мы с вами свяжемся!</p>
                    <?php else: ?>
                        <?php
                        if(isset($errors) && is_array($errors)){
                            foreach ($errors as $error){
                                echo "<br> $error";
                            }
                        } ?>
                        <div class="signup-form">
                            <h2>Обратная связь</h2>
                            <p>Есть вопросы? Напишите нам!</p>
                            <form method="post" action="#">
                                <input type="text" name="name" placeholder="Ваше имя" value="<?php echo $name; ?>" />
                                <input type="text" name="subject" placeholder="Тема письма" value="<?php echo $subject; ?>" />
                                <input type="email" name="userEmail" placeholder=" Ваш Email" value="<?php echo $userEmail; ?>" />
                                <input type="text" name="message" placeholder=" Сообщение" value="<?php echo $message; ?>" />
                                <button type="submit" name="submit" class="btn btn-default">Отправить</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php include_once(ROOT . '/view/layouts/footer.php'); ?>