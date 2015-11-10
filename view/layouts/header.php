<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Интернет магазин E-shopper</title>
    <link href="/view/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/view/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/view/assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="/view/assets/css/price-range.css" rel="stylesheet">
    <link href="/view/assets/css/animate.css" rel="stylesheet">
    <link href="/view/assets/css/main.css" rel="stylesheet">
    <link href="/view/assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/view/assets/js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +38 050 400 10 03</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> yuriyreva@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-vk"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/view/assets/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="/cart/"><i class="fa fa-shopping-cart"></i> Корзина (<span id="cart-count"><?php echo Cart::countProducts(); ?></span>)</a></li>
                            <?php if(User::isAuth()){
                                if(User::checkAdmin()){
                                    echo '<li><a href="/admin/"><i class="fa fa-cog"></i> Администрирование</a></li>';
                                }
                                echo '<li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                                <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>';

                            } else{
                                echo '<li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/">Главная</a></li>
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/catalog/">Каталог товаров</a></li>
                                    <li><a href="/cart/">Корзина</a></li>
                                </ul>
                            </li>
                            <li><a href="/about/">О магазине</a></li>
                            <li><a href="/contacts/">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->

</header><!--/header-->