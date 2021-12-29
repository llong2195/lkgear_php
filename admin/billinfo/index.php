<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../layout/header.php'); ?>
    <title>Admin</title>

</head>
<?php
if (isset($_GET['billID'])) {
    $billID = $_GET['billID'];
    $sql = "SELECT billinfor.*, prdchill.name as `prdchillName`, product.name as `productName` FROM billinfor, prdchill, product WHERE billinfor.prdChillID = prdchill.id and prdchill.prdid = product.id and billID=$billID ";
    $billinfor = $db->fetchAll($sql);
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
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><a href="./add.php?billID=<?php echo $billID ?>">Thêm mô tả</a></h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mã Hóa Đơn</th>
                                                <th scope="col">Tên Sản Phẩm Cha</th>
                                                <th scope="col">Tên Sản Phẩm Con</th>
                                                <th scope="col">Số Lượng</th>
                                                <th scope="col">Giá Gốc</th>
                                                <th scope="col">Giá Sale</th>
                                                <th scope="col">Thành Tiền</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($billinfor as $item) : ?>
                                                <tr>
                                                    <td><?php echo $item['billID'] ?></td>
                                                    <td><?php echo $item['productName'] ?></td>
                                                    <td><?php echo $item['prdchillName'] ?></td>
                                                    <td><?php echo $item['qty'] ?></td>
                                                    <td><?php echo number_format($item['price']) ?> vnd</td>
                                                    <td><?php echo number_format($item['priceSale']) ?> vnd</td>
                                                    <td><?php echo number_format($item['total']) ?> vnd</td>

                                                    </td>
                                                    <td>
                                                        <span>
                                                            <a href="./edit.php?billID=<?php echo $billID ?>&prdChillID=<?php echo $item['prdChillID'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                                            </a>
                                                            <a href="./delete.php?billID=<?php echo $billID ?>&prdChillID=<?php echo $item['prdChillID'] ?>" onclick="if(!confirm('Delete ?')) return false; " data-toggle="tooltip" data-placement="top" title="" data-original-title="Close">
                                                                <i class="fa fa-close color-danger"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
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