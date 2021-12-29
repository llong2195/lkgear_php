<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once(__DIR__ . '/layout/header.php') ?>
</head>
<?php
$param = [];
$prd_slug = "";
$prdChillID;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET)) {
        foreach ($_GET as $key => $value) {
            $param[$key] = $value;
        }

        $prd_slug = $param['slug'];
        $prdChillID = $param['prdchill'];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "prdID" => $_POST['prdID'] ? $_POST['prdID'] : '',
            "content" => $_POST['content'] ? $_POST['content'] : '',
            "time" => date("Y-m-d"),
            "name" => $_POST['name'] ? $_POST['name'] : '',
            "email" => $_POST['email'] ? $_POST['email'] : '',
            "rate" => $_POST['rate'] ? $_POST['rate'] : '',
            "active" => '1',
        ];
    $insert = $db->insert('comment', $data);
    if ($insert > 0) {
        $_SESSION['error'] = "Thêm thành công";
        header("Refresh:0");
    } else {
        $_SESSION['error'] = "không thành công";
        header("Refresh:0");
    }
}
//
foreach ($_GET as $key => $value) {
    $param[$key] = $value;
}

$prd_slug = $param['slug'];
$prdChillID = $param['prdchill'];
//
$sql = "SELECT `product`.* , `prdchill`.`id` as `prdchillID`, `prdchill`.`price`, `prdchill`.`priceSale`, `prdchill`.`brandID` FROM `prdchill` , `product`, `category` WHERE `prdchill`.`prdID` = `product`.`id` and `category`.`id` = `product`.`categoryID` and `product`.`slug` like '%$prd_slug%' and `prdchill`.`id` = '$prdChillID'";
$product = $db->fetchOne($sql);
$prdChillID = $product['prdchillID'];
$sql1 = "SELECT * FROM `descprdchill` WHERE prdChillID = '$prdChillID'";
$desprdChill = $db->fetchAll($sql1);
//
$brandID = $product['brandID'];
$catID = $product['categoryID'];
echo $brandID . '-' . $catID;
// 
$sql2 = "SELECT `product`.*, `category`.`slug` AS 'categorySlug', `prdchill`.`price`, `prdchill`.`priceSale`, `prdchill`.`id` as `prdchillID` FROM `product`, `category`, `prdchill` WHERE `product`.`categoryID` = `category`.`id` and `prdchill`.prdID = `product`.`id` and (`prdchill`.`brandID` = $brandID or `product`.`categoryID` = $catID) limit 4";
$prdSame = $db->fetchAll($sql2);

$sql_cmt = "SELECT * FROM `comment` WHERE `prdID` = $prdChillID ORDER BY id DESC ";
$cmtPrd = $db->fetchAll($sql_cmt);
?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?php require_once(__DIR__ . '/layout/nav_header.php') ?>
    <?php require_once(__DIR__ . '/layout/menu.php') ?>
    <!-- Humberger End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="<?php echo $base_url . $product['avatarImg1'] ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="<?php echo $base_url . $product['avatarImg1'] ?>" src="<?php echo $base_url . $product['avatarImg1'] ?>" alt="">
                            <img data-imgbigurl="<?php echo $base_url . $product['avatarImg2'] ?>" src="<?php echo $base_url . $product['avatarImg2'] ?>" alt="">
                            <img data-imgbigurl="<?php echo $base_url . $product['avatarImg3'] ?>" src="<?php echo $base_url . $product['avatarImg3'] ?>" alt="">
                            <img data-imgbigurl="<?php echo $base_url . $product['avatarImg4'] ?>" src="<?php echo $base_url . $product['avatarImg4'] ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $product['name'] ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class=""><del><?php echo number_format($product['price']) ?></del></div>
                        <div class="product__details__price"><?php echo number_format($product['priceSale']) ?></div>
                        <p><?php echo $product['detail'] ?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input id="qty" onchange="qtyChange()" type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a id="addToCart" href="./modules/cart/cart_add.php?prdchillID=<?php echo $product['prdchillID'] ?>&qty=1" class="primary-btn">Thêm Giỏ Hàng</a>
                        <ul>


                            <li><b>Chia Sẻ</b>
                                <div class="share">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-instagram"></i></a>
                                    <a href=""><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Thông Tin Chi Tiết</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Bình Luận</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Chi Tiết Sản Phẩm</h6>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Giá Trị</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($desprdChill) > 0) : ?>
                                                <?php foreach ($desprdChill as $index => $item) : ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $index ?></th>
                                                        <td><?php echo $item['name'] ?></td>
                                                        <td><?php echo $item['description'] ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php endif ?>


                                        </tbody>
                                    </table>

                                    <p></p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="container">
                                    <form action="" method="POST" style="align-items: center;">
                                        <div class="form-row">
                                            <input required type="text" hidden name="prdID" value="<?php echo $prdChillID ?>">

                                            <div class="form-group col-lg-5 col-md-5">
                                                <label>Tên</label>
                                                <input required type="text" name="name" class="form-control" placeholder="Your name">
                                            </div>
                                            <div class="form-group col-lg-5 col-md-5">
                                                <label>Email</label>
                                                <input required type="email" name="email" class="form-control" placeholder="Your Email">
                                            </div>
                                            <div class="form-group col-lg-2 col-md-2">
                                                <label>Start</label>
                                                <input required type="number" name="rate" min="1" max="5" value="5" class="form-control" placeholder="">
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <label>Nội Dung</label>
                                            <textarea class="form-control" name="content" id="" cols="10" rows="2"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-dark" value="Gửi">
                                    </form>
                                </div>
                                <div class="product__details__tab__desc">
                                    <h6>Bình Luận</h6>
                                    <ul class="" style="list-style-type: none;">
                                        <?php foreach($cmtPrd as $item) : ?>
                                        <li>
                                            <ul style="list-style-type: none;">
                                                <li><b><?php echo $item['name'] ?></b>&emsp;&emsp;time : <?php echo $item['time'] ?>&emsp;&emsp;đánh giá : <?php echo $item['rate'] ?></li>
                                                
                                                <li>
                                                    <p><?php echo $item['content'] ?></p>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php endforeach ?>
                                        

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản Phẩm Tương Tự</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($prdSame as $item) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?php echo $base_url . $item['avatarImg1'] ?>">
                                <ul class="product__item__pic__hover">
                                    <li><a href="./product.php?slug=<?php echo $item['slug'] . '&prdchill=' . $item['prdchillID'] ?>"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#"><?php echo number_format($item['price']) ?> VND</a></h6>
                                <h5><?php echo number_format($item['priceSale']) ?> VND</h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    <?php require_once(__DIR__ . '/layout/footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once(__DIR__ . '/layout/script.php') ?>

    <script >

        function qtyChange(){
            console.log('change');
            const input = document.getElementById('qty');
            let qty = input.value;
            const addToCart = document.getElementById('addToCart');
            let href = addToCart.href.split('&');
            href[1] = 'qty='+qty;
            href=href.join('&');
            console.log(href);
            addToCart.href = href;

        }


    </script>
</body>

</html>