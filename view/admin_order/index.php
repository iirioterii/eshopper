<?php include ROOT . '/view/layouts/header_admin.php'; ?>

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
                    <th>ID заказа</th>
                    <th>Имя покупателя</th>
                    <th>Email покупателя</th>
                    <th>Телефон покупателя</th>
                    <th>ID покупателя</th>
                    <th>Дата оформления</th>
                    <th>Статус</th>
                    <th>Просмотр</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($orderList as $order): ?>
                    <tr>
                        <td>
                            <a href="/admin/order/view/<?php echo $order['id']; ?>">
                                <?php echo $order['id']; ?>
                            </a>
                        </td>
                        <td><?php echo $order['user_name']; ?></td>
                        <td><?php echo $order['user_email']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>
                        <td><?php echo $order['user_id']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td><?php Order::getStatusText($order['status'])?></td>
                        <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                        <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/view/layouts/footer_admin.php'; ?>

