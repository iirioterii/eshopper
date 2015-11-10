<?php include_once(ROOT . '/view/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <h2>Личный кабинет</h2>
            <h4><?php echo 'Добро пожаловать, ' .$user['name']; ?></h4>
            <ul>
                <li><a href="/cabinet/edit/">Редактировать данные</a></li>
                <li><a href="/cabinet/history/">История покупок</a></li>
            </ul>
        </div>
    </div>
</section>

<?php include_once(ROOT . '/view/layouts/footer.php'); ?>
