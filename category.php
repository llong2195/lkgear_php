<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once(__DIR__ . '/layout/header.php') ?>
</head>
<?php
$sql = "SELECT * FROM category";
$category = $db->fetchAll($sql);
$sql = "SELECT * FROM brand";
$brand = $db->fetchAll($sql);
$param = [];
$cat_slug = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET)) {
        foreach ($_GET as $key => $value) {
            $param[$key] = $value;
        }

        if (isset($param['category'])) {
            $cat_slug = $param['category'];
            if ($cat_slug == 'laptop') {
                // desc laptop : ram, cpu ...
                /*
            $descprdchillName = "SELECT DISTINCT `descprdchill`.`name` \n"
                . "FROM `descprdchill`, `category`, `prdchill`, `product`\n"
                . "WHERE `descprdchill`.`prdChillID` = `prdchill`.`id` \n"
                . "    and `prdchill`.`prdID` = `product`.`id`\n"        
            */
            }
            // $sql_desc = "select * from category where slug like '%$cat_slug%'";
            $sql_prdChill = "and category.slug like '%$cat_slug%' ";
        }
        $sql_prd = "SELECT `product`.* , `prdchill`.`price`, `prdchill`.`priceSale` , `prdchill`.`id` as `prdchillID` FROM `prdchill` , `product`, `category` WHERE `prdchill`.`prdID` = `product`.`id` and `category`.`id` = `product`.`categoryID` and category.slug like '%$cat_slug%' \n";

        if (isset($param['sort']) && $param['sort'] == 1)
            $sql_prd .= "GROUP BY prdchill.priceSale DESC \n";
        if(isset($param['sort']) && $param['sort'] == 0){
            $sql_prd .= "GROUP BY prdchill.priceSale ASC \n";
        }
        $sql_prd .= "limit 15;";

        $prdChill = $db->fetchAll($sql_prd);
    }
}


?>
<style>
    .active__pagination {
        background: #e93434;
        color: #e93434;
        color: #ffffff;
    }
</style>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?php require_once(__DIR__ . '/layout/nav_header.php') ?>
    <?php require_once(__DIR__ . '/layout/menu.php') ?>
    <!-- Humberger End -->



    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="./public/site/img/twitter_header_photo_2.png" style="background-position: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color:white">LK GEAR GAMING</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh Mục</h4>
                            <ul>
                                <?php foreach ($category as $item) : ?>
                                    <li>
                                        <a href="./category.php?category=<?php echo $item['slug'] ?>"><?php echo $item['name'] . ' - ' . $item['description'] ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>

                        <?php if (isset($param['category']) && $param['category'] == '1') : ?>
                            <div class="sidebar__item">
                                <h4>Loại</h4>

                                <div class="sidebar__item__size">
                                    <label for="tiny">
                                        ram 8gb
                                        <input type="radio" id="tiny">
                                    </label>
                                </div>
                            </div>
                        <?php endif ?>


                    </div>
                </div>
                <div class="col-lg-9 col-md-7">

                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sắp Xếp</span>
                                    <select onchange="location = this.value;">
                                        <option <?php if (isset($param['sort']) && $param['sort'] == 0) echo "selected"; ?> value="./category.php?<?php if (isset($param['category'])) echo 'category=' . $param['category'] . '&sort=0';
                                                                                                                                                    else echo 'sort=0' ?>">Giá Tăng Dần</option>
                                        <option <?php if (isset($param['sort']) && $param['sort'] == 1) echo "selected"; ?> value="./category.php?<?php if (isset($param['category'])) echo 'category=' . $param['category'] . '&sort=1';
                                                                                                                                                    else echo 'sort=1' ?>">Giá Giảm Dần</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span><?php echo count($prdChill); ?></span> Sản Phẩm Phù Hợp</h6>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($prdChill as $item) : ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo $base_url . $item['avatarImg1'] ?>">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="./product.php?slug=<?php echo $item['slug'] . '&prdchill=' . $item['prdchillID'] ?>"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="./modules/cart/cart_add.php?prdchillID=<?php echo $item['prdchillID'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="./product.php?slug=<?php echo $item['slug'] ?>"><?php echo $item['name'] ?></a></h6>
                                        <del>
                                            <h6><?php echo number_format($item['price']) ?> VND</h6>
                                        </del>
                                        <h5 class="text-danger"><?php echo number_format($item['priceSale']) ?> VND</h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                    <!-- <div class="product__pagination">
                        <a class="active__pagination" href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <?php require_once(__DIR__ . '/layout/footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once(__DIR__ . '/layout/script.php') ?>



</body>

</html>