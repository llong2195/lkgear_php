<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once(__DIR__ . '/layout/header.php') ?>
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    $data_bill = [
        "userName" => $_POST['userName'] ? $_POST['userName'] : "",
        "sdt" => $_POST['sdt'] ? $_POST['sdt'] : "",
        "email" => $_POST['email'] ? $_POST['email'] : "",
        "addr" => $_POST['addr'] ? $_POST['addr'] : "",
        "date" => date("Y-m-d"),
        "qty" => $_POST['qty'] ? $_POST['qty'] : "",
        "total" => $_POST['total'] ? $_POST['total'] : "",
    ];
    $insert = $db->insert('bill', $data_bill);
    if ($insert > 0) {
        $arrCart = [];
        foreach ($_SESSION['cart'] as $key => $value) {
            $arrCart[$key] = $value;
            $sql_prd = "SELECT * FROM `prdchill` WHERE id = $key";
            $prdChill = $db->fetchOne($sql_prd);

            $data_prd = [
                "billID" => $insert,
                "prdChillID" => $prdChill['id'],
                "qty" => $value,
                "price" => $prdChill['price'],
                "priceSale" => $prdChill['priceSale'],
                "total" => $prdChill['priceSale'] * $value,
            ];
            $insert_billinfor = $db->insert('billinfor', $data_prd);
        }
        
        unset($_SESSION['cart']);
        unset($_SESSION['qty']);
        header("Location:./modules/sendMail.php?billID=$insert");
    }
}
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
        $prd_cart;
        if(count($arr_id)>0)
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

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4>Thông Tin Đơn Hàng</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Họ Tên<span>*</span></p>
                                        <input required name="userName" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số Điện Thoại<span>*</span></p>
                                        <input required name="sdt" type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input required name="email" type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Địa Chỉ<span>*</span></p>
                                <input required name="addr" type="text">
                            </div>


                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>Giỏ Hàng</h4>
                                <div class="checkout__order__products">Tên <span>Thành Tiền</span></div>
                                <ul>
                                    <?php if(count($_SESSION['cart']) > 0) : ?>
                                        <?php foreach ($prd_cart as $key => $item) : ?>
                                        <?php $total_price += $item['priceSale'] * $arr_qty[$item['prdchillID']] ?>
                                        <li><?php echo $item['name'] ?> <span><?php echo number_format($item['priceSale'] * $arr_qty[$item['prdchillID']]) ?></span></li>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </ul>
                                <input type="number" value="<?php echo $_SESSION['qty'] ?>" hidden name="qty" id="">
                                <input type="number" value="<?php echo $total_price ?>" hidden name="total" id="">
                                <div class="checkout__order__total">Thành Tiền <span><?php echo number_format($total_price) ?></span></div>


                                <button type="submit" class="site-btn"> Xác Nhận Đặt Hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <?php require_once(__DIR__ . '/layout/footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once(__DIR__ . '/layout/script.php') ?>


</body>

</html>