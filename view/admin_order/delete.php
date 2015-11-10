<?php include ROOT . '/view/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ul>
                    <li><a href="/admin/order">Управление заказами</a></li>
                </ul>
            </div>


            <h4>Удалить заказ #<?php echo $orderId; ?></h4>


            <p>Вы действительно хотите удалить этот заказ?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/view/layouts/footer_admin.php'; ?>

