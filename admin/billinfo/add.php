<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../layout/header.php'); ?>
    <title>Admin</title>

</head>
<?php
if(isset($_GET['billID'])){
    $billID = $_GET['billID'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "billID" => $billID,
            "prdChillID" => $_POST['prdChillID'] ? $_POST['prdChillID'] : '',
            "qty" => $_POST['qty'] ? $_POST['qty'] : '',
            "price" => $_POST['price'] ? $_POST['price'] : '',
            "priceSale" => $_POST['priceSale'] ? $_POST['priceSale'] : '',
            "total" => $_POST['priceSale'] ? $_POST['priceSale'] * $_POST['qty'] : '',
        ];
    $insert = $db->insert('billinfor', $data);
    if ($insert > 0) {
        $sql_update_bill = "UPDATE `bill` 
                            SET `qty`= (SELECT sum(billinfor.qty) FROM billinfor WHERE billinfor.billID = $billID),
                                `total` = (SELECT sum(billinfor.total) FROM billinfor WHERE billinfor.billID = $billID)
                            WHERE `id` = $billID";
        $update = $db->query($sql_update_bill);

        $_SESSION['error'] = "Thêm thành công";
        header('Location: ./index.php?billID='.$billID);
    } else {
        $_SESSION['error'] = "không thành công";
        header('Location: ./index.php?billID='.$billID);
    }
} else {
    $sql = "select prdchill.* , product.name as 'prdName' from prdchill, product where prdchill.prdID = product.id";
    $prdchill = $db->fetchAll($sql);
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
                            <h4 class="card-title">Thêm Sản Phẩm Con</h4>
                            <div class="basic-form">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Sản Phẩm Cha</label>
                                            <input id="prdName" type="text" required class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Sản Phẩm Con</label>
                                            <select id="prdChillIDSelect" onchange="prdchillChange()" name="prdChillID" required class="form-control">
                                                <?php foreach ($prdchill as $item) : ?>
                                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Giá Gốc</label>
                                            <input type="number" required name="price" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Giá Sale</label>
                                            <input type="number" required name="priceSale" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Số Lượng</label>
                                            <input min="1" onchange="prdchillChange()" type="number" value="1" required name="qty" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Thành Tiền</label>
                                            <input type="number" required disabled name="total" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Thêm CT Hóa Đơn</button>
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
    <script >
        const prdchill = <?php echo json_encode($prdchill) ?>;
        console.log(prdchill);
        prdchillChange()
        function prdchillChange(){
            const sel = document.getElementById("prdChillIDSelect").value;
            console.log(sel);
            const rs = prdchill.filter(i => i.id == sel);
            document.getElementsByName("price")[0].value = rs[0]['price'];
            document.getElementsByName("priceSale")[0].value = rs[0]['priceSale'];
            document.getElementsByName("total")[0].value = rs[0]['priceSale'] * parseInt(document.getElementsByName("qty")[0].value);
            document.getElementById("prdName").value = rs[0]['prdName'];

        }
        
    </script>
</body>

</html>