<?php include ROOT . '/view/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>
                        
            <div class="breadcrumbs">

                    <h3>Управление заказами</h3>

            </div>

            <h4>Список заказов</h4>

            <br/>

            
            <table class="table-bordered table-striped table">
                <tr>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Дата оформления</th>
                    <th>Статус</th>
                    <th>Просмотр</th>
                </tr>
                <?php if($orderList == true): ?>
                <?php foreach ($orderList as $order): ?>
                    <tr>
                        <td><?php echo $order['user_name']; ?></td>
                        <td><?php echo $order['user_email']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td><?php Order::getStatusText($order['status'])?></td>
                        <td><a href="/cabinet/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                    </tr>
                <?php  endforeach; ?>
                <?php endif ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/view/layouts/footer.php'; ?>

