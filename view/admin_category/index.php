<?php include ROOT . '/view/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                
                    <h3>Управление категориями</h3>

            </div>

            <a href="/admin/category/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>

            <h4>Список товаров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID категории</th>
                    <th>Название категории</th>
                    <th>Сортировка категорий</th>
                    <th>Статус</th>
                    <th width="10%">Изменить</th>
                    <th width="10%">Удалить</th>
                </tr>
                <?php foreach ($categoriesList as $category): ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['sort_order']; ?></td>
                        <td><?php echo $category['status']; ?></td>
                        <td><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/view/layouts/footer_admin.php'; ?>
