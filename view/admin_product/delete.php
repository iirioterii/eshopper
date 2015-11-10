<?php include_once(ROOT . '/view/layouts/header_admin.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ul>
                    <li><a href="/admin/product">Управление товарами</a></li>
                </ul>
            </div>


            <h4>Удалить товар <?php echo $product['name']; ?></h4>


            <p>Вы действительно хотите удалить этот товар?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include_once(ROOT . '/view/layouts/footer_admin.php'); ?>
