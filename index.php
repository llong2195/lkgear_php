<!DOCTYPE html>
<html lang="vi">
<?php require_once(__DIR__ . '/lib/autoload.php'); ?>

<head>
    <?php require_once(__DIR__ . '/layout/header.php') ?>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?php require_once(__DIR__ . '/layout/nav_header.php') ?>

    <!-- Hero Section End -->
    <?php
    $sql = "SELECT * FROM category";
    $category = $db->fetchAll($sql);
    $sql1 = "SELECT * FROM `fe` WHERE slug like '%slider%' and active = 1";
    $slider = $db->fetchOne($sql1);
    $sql2 = "SELECT * FROM `fe` WHERE slug like '%ad%' and active = 1 limit 2";
    $ad = $db->fetchAll($sql2);
    $sql3 = "SELECT `product`.*, `category`.`slug` AS 'categorySlug', `prdchill`.`priceSale`, `prdchill`.`id` as `prdchillID` FROM `product`, `category`, `prdchill` WHERE `product`.`categoryID` = `category`.`id` and `prdchill`.prdID = `product`.`id` LIMIT 30";
    $product = $db->fetchAll($sql3);
    ?>

    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All</span>
                        </div>
                        <ul>
                            <?php foreach ($category as $item) : ?>
                                <li style="list-style-position:inside; white-space: nowrap;  overflow: hidden; text-overflow: ellipsis; ">
                                    <a href="./category.php?category=<?php echo $item['slug'] ?>"><?php echo $item['name'] . ' - ' . $item['description'] ?></a>
                                </li>
                            <?php endforeach ?>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="./search.php" method="GET">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" name="name" placeholder="Tìm Tên Sản Phẩm">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0927015206</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="<?php echo $base_url . $slider['img'] ?>">
                        <div class="hero__text">
                            <!-- <span>GEAR GAMING</span>
                            <h2>GEAR <br />100% Quality</h2> -->
                            <a href="<?php echo $base_url . $slider['link'] ?>" class="primary-btn" style="margin-top:360px;margin-left:600px;">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section Begin -->



    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php foreach ($category as $item) : ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="<?php echo $base_url . $item['avatarImg'] ?>">
                                <h5><a href="<?php echo $base_url . 'category.php?category=' . $item['slug'] ?>"><?php echo $item['name'] ?></a></h5>
                            </div>
                        </div>
                    <?php endforeach ?>


                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản Phẩm</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php foreach ($category as $item) : ?>
                                <li data-filter=".<?php echo $item['slug'] ?>"><?php echo $item['name'] ?></li>

                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach ($product as $index => $item) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $item['categorySlug'] ?>">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="<?php echo $base_url . $item['avatarImg1'] ?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="./product.php?slug=<?php echo $item['slug'] . '&prdchill=' . $item['prdchillID'] ?>"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="./modules/cart/cart_add.php?prdchillID=<?php echo $item['prdchillID'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="./product.php?slug=<?php echo $item['slug'] . '&prdchill=' . $item['prdchillID'] ?>"><?php echo $item['name'] ?></a></h6>
                                <h5><?php echo number_format($item['priceSale']) ?> VND</h5>
                            </div>
                        </div>
                    </div>
                    <?php if ($index >= 30) break; ?>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <?php foreach ($ad as $item) : ?>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img width="550" height="300" src="<?php echo $base_url . $item['img'] ?>" alt="">
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-5">
                    <div class="latest-product__text">
                        <h4>Laptop</h4>
                        <div class="latest-product__slider owl-carousel">
                            
                            <?php $count = 0; ?>
                            <?php foreach ($product as $index => $item) : ?>
                                
                                <?php if ($item['categorySlug'] == 'laptop') : ?>
                                    <?php if($count == 0): ?>
                                        <div class="latest-prdouct__slider__item">
                                    <?php endif ?>
                                    <a href="./product.php?slug=<?php echo $item['slug'] . '&prdchill=' . $item['prdchillID'] ?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="<?php echo $base_url . $item['avatarImg1'] ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php echo $item['name'] ?></h6>
                                            <span><?php echo number_format($item['priceSale']) ?> VND</span>
                                        </div>
                                    </a>
                                    <?php $count++;?>
                                    <?php if($count >= 3) :?>
                                        <?php  $count = 0 ?>
                                        </div>
                                    <?php endif ?>
                                    
                                <?php endif ?>
                            <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="col-lg-5 col-md-5">
                    <div class="latest-product__text">
                        <h4>VGA</h4>
                        <div class="latest-product__slider owl-carousel">
                            
                            <?php $count = 0; ?>
                            <?php foreach ($product as $index => $item) : ?>
                                
                                <?php if ($item['categorySlug'] == 'vga') : ?>
                                    <?php if($count == 0): ?>
                                        <div class="latest-prdouct__slider__item">
                                    <?php endif ?>
                                    <a href="./product.php?slug=<?php echo $item['slug'] . '&prdchill=' . $item['prdchillID'] ?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="<?php echo $base_url . $item['avatarImg1'] ?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php echo $item['name'] ?></h6>
                                            <span><?php echo number_format($item['priceSale']) ?> VND</span>
                                        </div>
                                    </a>
                                    <?php $count++;?>
                                    <?php if($count >= 3) :?>
                                        <?php  $count = 0 ?>
                                        </div>
                                    <?php endif ?>
                                    
                                <?php endif ?>
                            <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->

    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <?php require_once(__DIR__ . '/layout/footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once(__DIR__ . '/layout/script.php') ?>

</body>

</html>