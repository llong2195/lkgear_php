<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="<?php echo $base_url ?>public/site/img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>

    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./index.php">Home</a></li>
            <li><a href="./buildcase.php">Build Cấu Hình</a></li>
            <li><a href="./tuyendung.php">Tuyển Dụng</a></li>
            <li><a href="./contact.php">Liên Hệ</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.php"><img src="<?php echo $base_url ?>public/site/img/header--logo.png" alt="" style="width:150px;height:150px;margin-left: 50px;"></a>
                </div>
            </div>
            <div class="col-lg-6" style="margin-top:40px">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="./index.php">Home</a></li>

                        <li><a href="./tuyendung.php">Tuyển Dụng</a></li>
                        <li><a href="./contact.php">Liên Hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3" style="margin-top:40px">
                <div class="header__cart">
                    <ul>
                        <li>
                            <?php
                            if (isset($_SESSION['user'])) : ?>

                                <div class="header__top__right__auth">
                                    <a href="<?php echo $base_url ?>/logout.php"><i class="fa fa-user"></i><?php echo $_SESSION['user'] ?></a> </a>
                                </div>

                            <?php endif ?>

                            <?php
                            if (!isset($_SESSION['user'])) : ?>

                                <div class="header__top__right__auth">
                                    <a href="./login.php"><i class="fa fa-user"></i>Login</a> </a>
                                </div>

                            <?php endif ?>

                        </li>
                        <?php
                        if (!isset($_SESSION['user'])) : ?>

                            <li>
                                <a href="./register.php">Đăng Ký</a>
                            </li>

                        <?php endif ?>

                        <li><a href="./cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo $_SESSION['qty'] ?></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->