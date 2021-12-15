<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once(__DIR__ . './layout/header.php') ?>
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
        $sql_prd = "SELECT `product`.* , `prdchill`.`price`, `prdchill`.`priceSale` FROM `prdchill` , `product`, `category` WHERE `prdchill`.`prdID` = `product`.`id` and `category`.`id` = `product`.`categoryID` and category.slug like '%$cat_slug%' \n";
    
        if (isset($param['sort']) && $param['sort'] == 1)
            $sql_prd .= "GROUP BY prdchill.priceSale DESC \n";
    
        $sql_prd .= "limit 15;";
    
        $prdChill = $db->fetchAll($sql_prd);
    }
}


?>


<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?php require_once(__DIR__ . './layout/nav_header.php') ?>
    <?php require_once(__DIR__ . './layout/menu.php') ?>
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
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-1.jpg" alt="">
                                        <h5>Vegetable’s Package</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $55.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $110.00
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-2.jpg" alt="">
                                        <h5>Fresh Garden Vegetable</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $39.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $39.99
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-3.jpg" alt="">
                                        <h5>Organic Bananas</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $69.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $69.99
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
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
                            <li>Subtotal <span>$454.98</span></li>
                            <li>Total <span>$454.98</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <?php require_once(__DIR__ . './layout/footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once(__DIR__ . './layout/script.php') ?>



</body>

</html>