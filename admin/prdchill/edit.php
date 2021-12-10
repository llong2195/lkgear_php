<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../layout/header.php'); ?>
    <title>Admin</title>

</head>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select prdchill.*, brand.name as `brandName`, product.name as `productName` from product, prdchill, brand where prdchill.prdID = product.id and prdchill.brandID = brand.id and prdchill.id = $id";
    $prdchill = $db->fetchOne($sql);
    $sql1 = "select * from brand";
    $brand = $db->fetchAll($sql1);
    $sql2 = "select * from product";
    $product = $db->fetchAll($sql2);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // upload file



    $data =
        [
            "prdID" => $_POST['prdID'] ? $_POST['prdID'] : '',
            "name" => $_POST['name'] ? $_POST['name'] : '',
            "slug" => slugify($_POST['name']),
            "detail" => $_POST['detail'] ? $_POST['detail'] : '',
            "brandID" => $_POST['brandID'] ? $_POST['brandID'] : '',
            "price" => $_POST['price'] ? $_POST['price'] : '',
            "priceSale" => $_POST['priceSale'] ? $_POST['priceSale'] : '',
            "qty" => $_POST['qty'] ? $_POST['qty'] : '',
            "active" => $_POST['active'] ? $_POST['active'] : '',
        ];
    $update = $db->update('prdchill', $data, array('id' => $id));
    if ($update > 0) {
        $_SESSION['error'] = "sửa thành công";
        header('Location: ./index.php');
    } else
        $_SESSION['error'] = "không thành công";
}
?>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php require_once(__DIR__ . '/../layout/nav_header.php') ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php require_once(__DIR__ . '/../layout/side_bar.php') ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm Sản Phẩm</h4>
                            <div class="basic-form">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tên</label>
                                            <input type="text" required name="name" value="<?php echo $prdchill['name'] ?>" class="form-control" placeholder="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Sản Phẩm Cha</label>
                                            <select id="inputState" name="prdID" required class="form-control">
                                                <?php foreach ($product as $item) : ?>
                                                    <?php if ($item['id'] == $prdchill['prdID']) : ?>
                                                        <option selected value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Chi Tiết</label>
                                            <input type="text" required name="detail" value="<?php echo $prdchill['detail'] ?>" class="form-control" placeholder="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Hãng</label>
                                            <select id="inputState" name="brandID" required class="form-control">
                                                <?php foreach ($brand as $item) : ?>
                                                    <?php if ($item['id'] == $prdchill['brandID']) : ?>
                                                        <option selected value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Giá Gốc</label>
                                            <input type="number" required name="price" value="<?php echo $prdchill['price'] ?>" class="form-control" placeholder="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Giá Sale</label>
                                            <input type="number" required name="priceSale" value="<?php echo $prdchill['priceSale'] ?>" class="form-control" placeholder="name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Số Lượng</label>
                                            <input type="number" required name="qty" value="<?php echo $prdchill['qty'] ?>" class="form-control" placeholder="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Active</label>
                                            <select id="inputState" name="active" required class="form-control">
                                                <?php if ($prdchill['active'] == 1) :  ?>
                                                    <option selected value="1">Hiển Thị</option>
                                                    <option value="0">Ẩn</option>
                                                <?php else : ?>
                                                    <option value="1">Hiển Thị</option>
                                                    <option selected value="0">Ẩn</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-dark">Sửa Sản Phẩm Con</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <!-- <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div> -->
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <?php require_once(__DIR__ . '/../layout/script.php') ?>

</body>

</html>