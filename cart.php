<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once(__DIR__ . '/layout/header.php') ?>
</head>
<?php
$param = [];
$total_price = 0;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

        $arr_id = [];
        $arr_qty = [];
        foreach ($_SESSION['cart'] as $key => $value) {
            $arr_id[] = $key;
            $arr_qty[$key] = $value;
        }
        // join(' , ');
        $str_sql = implode(" , ", $arr_id);
        $sql = "SELECT `product`.* , `prdchill`.`id` as `prdchillID`, `prdchill`.`price`, `prdchill`.`priceSale`, `prdchill`.`brandID` FROM `prdchill` , `product`, `category` WHERE `prdchill`.`prdID` = `product`.`id` and `category`.`id` = `product`.`categoryID` and `prdchill`.`id` IN ($str_sql)";
        $prd_cart = $db->fetchAll($sql);
    }
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
    <!-- Humberger End -->



    <!-- Breadcrumb Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Tên Sản Phẩm</th>

                                    <th>Giá Khuyến Mãi</th>
                                    <th>Số Lượng</th>
                                    <th>Thành Tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($_SESSION['cart']) > 0) :?>
                                    <?php foreach ($prd_cart as $key => $item) : ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img width="100px" src="<?php echo $base_url . $item['avatarImg1'] ?>" alt="">
                                            <h5><?php echo $item['name'] ?></h5>
                                        </td>

                                        <td class="shoping__cart__price">
                                            <?php echo number_format($item['priceSale']) ?>
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <input style="width : 50px" name="qty" class="qty_cart" type="number" prdChill = "<?php echo $item['prdchillID'] ?>" value="<?php echo $arr_qty[$item['prdchillID']] ?>">
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            <?php $total_price += $item['priceSale'] * $arr_qty[$item['prdchillID']] ?>
                                            <?php echo number_format($item['priceSale'] * $arr_qty[$item['prdchillID']]) ?> D
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a class="btn_ref" href="./modules/cart/cart_update.php?prdchillID=<?php echo $item['prdchillID'] ?>&qty=<?php echo $arr_qty[$item['prdchillID']] ?>"><i style="font-size: 20px;color: #b2b2b2;cursor: pointer;" class="fa fa-refresh" aria-hidden="true"></i></a>
                                            <a href="./modules/cart/cart_delete.php?prdchillID=<?php echo $item['prdchillID'] ?>"><span class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Số Lượng <span><?php echo $_SESSION['qty'] ?></span></li>
                            <li>Thành Tiền <span><?php echo number_format($total_price) ?> VND</span></li>
                        </ul>
                        <a href="./checkout.php" class="primary-btn">Đặt Hàng</a>
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

    <script>

        let arrQty = document.querySelectorAll('.qty_cart');
        let arr_ref = document.querySelectorAll('.btn_ref');
        arrQty.forEach(element => {
            element.addEventListener('input', updateHref);
        });
        function updateHref(){
            arr_ref.forEach((item, index) => {
                let tmp_href = arr_ref[index].attributes['href'].value;
                tmp_href = tmp_href.split('&');
                tmp_href[1] = "qty="+parseInt(arrQty[index].value);
                arr_ref[index].attributes['href'].value = tmp_href.join('&');
            });
        }
    </script>

</body>

</html>