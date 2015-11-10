<?php include_once(ROOT . '/view/layouts/header.php') ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach($categories as $categoryItem): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="/category/<?php echo $categoryItem['id']; ?>">
                                        <?php echo $categoryItem['name']; ?>
                                    </a></h4>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    <?php foreach($latestProducts as $productItem): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="<?php echo Product::getImage($productItem['id']);?>" height="249" alt="" />
                                    <h2><?php echo $productItem['price'] . ' грн'; ?></h2>
                                    <p><a href="/product/<?php echo $productItem['id']?>"><?php echo $productItem['name']?></a></p>
                                    <a href="#" data-id="<?php echo $productItem['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                </div>
                                <?php if($productItem['is_new']): ?>
                                <img src="/view/assets/images/home/new.png" class="new" alt=""/>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div><!--features_items-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div class="cycle-slideshow"
                         data-cycle-fx=carousel
                         data-cycle-timeout=3000
                         data-cycle-carousel-visible=3
                         data-cycle-carousel-fluid=true
                         data-cycle-slides="div.item"
                         data-cycle-prev="#prev"
                         data-cycle-next="#next"
                        >
                            <?php foreach($recommendedProducts as $recProduct):?>
                            <div class="item">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo Product::getImage($recProduct['id']);?>" height="249" alt="" />
                                            <h2><?php echo $recProduct['price'] . ' грн'; ?></h2>
                                            <p><a href="/product/<?php echo $recProduct['id']?>"><?php echo $recProduct['name'] ?></a></p>
                                            <a href="#" data-id="<?php echo $recProduct['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if($recProduct['is_new']): ?>
                                            <img src="/view/assets/images/home/new.png" class="new" alt=""/>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <a class="left recommended-item-control" id="next" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

<?php include_once(ROOT . '/view/layouts/footer.php'); ?>
