<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once(__DIR__ . '/layout/header.php') ?>
</head>
<?php
if (isset($_GET) && isset($_GET['name'])) {
    $name = $_GET['name'];
    $page = 1;
    $limit = 6;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $total_rows =  $db->countData("SELECT * FROM `prdchill`  , `product` Where `prdchill`.`prdID` = `product`.`id` and `product`.`name` like '%$name%'");
    $skip = $limit * ($page - 1);
    $total_pages = ceil($total_rows / $limit);

    //page prev
    $left = $page - 2;
    
    $right = $page + 2;
    
    $list_page =[];
    for($i = 1; $i <= $total_pages; $i++){
        if($i == 1 || $i == $total_pages || $i == $page || ($left <= $i && $i <= $right )){
            $list_page[] = $i;
        }else if($i == $left - 1 || $i == $right + 1){
            $list_page[] = "...";
        }
    }


    // load sql
    $sql_prd = "SELECT `product`.* , `prdchill`.`price`, `prdchill`.`priceSale` , `prdchill`.`id` as `prdchillID` 
                    FROM `prdchill` , `product`, `category` 
                    WHERE `prdchill`.`prdID` = `product`.`id` and `category`.`id` = `product`.`categoryID` 
                    and `product`.`name` like '%$name%' \n";

    $sql_prd .= "limit $skip , $limit ;";

    $prdChill = $db->fetchAll($sql_prd);
}
?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?php require_once(__DIR__ . '/layout/nav_header.php') ?>
    <?php require_once(__DIR__ . '/layout/menu.php') ?>
    <!-- Hero Section End -->


    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>Sản Phẩm Phù Hợp</h2>
                    <div class="filter__item">
                        <div class="row">

                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span><?php echo $total_rows ?></span> Sản Phẩm Liên Quan</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
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
                    <div class="product__pagination">
                        <?php if($page > 1) :?>
                            <a href="./search.php?name=<?php echo $name ?>&page=<?php echo $page-1 ?>"><i class="fa fa-long-arrow-left"></i></a>
                        <?php endif ?>
                        <?php foreach ($list_page as $key => $value) : ?>
                            <?php if($value == "...") :?>
                                <a onclick="return void();"><?php echo $value ?></a>
                            <?php else : ?>
                                <a href="./search.php?name=<?php echo $name ?>&page=<?php echo $value  ?>"><?php echo $value ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
                        <?php if($page > 1) :?>
                            <a href="./search.php?name=<?php echo $name ?>&page=<?php echo $page+1 ?>"><i class="fa fa-long-arrow-right"></i></a>
                        <?php endif ?>
                        
                    </div>
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