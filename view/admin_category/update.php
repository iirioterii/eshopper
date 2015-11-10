<?php include ROOT . '/view/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ul>
                    <li><a href="/admin/category">Управление категориями</a></li>
                </ul>
            </div>


            <h4>Редактировать категорию</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название категории</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $category['name']?>">

                        <p>Сортировка</p>
                        <input type="number" name="sort_order" placeholder="" value="<?php echo $category['sort_order']?>" >

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if($category['status'] == 1) echo 'selected="selected"'; ?> >Отображается</option>
                            <option value="0"  <?php if($category['status'] == 0) echo 'selected="selected"'; ?> >Скрыта</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/view/layouts/footer_admin.php'; ?>

