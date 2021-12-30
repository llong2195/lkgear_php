<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../layout/header.php'); ?>
    <title>Admin</title>

</head>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM bill WHERE id=$id ";
    $bill = $db->fetchOne($sql);
    $sql2 = "select * from user";
    $user = $db->fetchAll($sql2);
    $sql3 = "select * from account";
    $account = $db->fetchAll($sql3);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data =
        [
            "userName" => $_POST['userName'] ? $_POST['userName'] : '',
            "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
            "email" => $_POST['email'] ? $_POST['email'] : '',
            "addr" => $_POST['addr'] ? $_POST['addr'] : '',
            "qty" => $_POST['qty'] ? $_POST['qty'] : '',
            "total" => $_POST['total'] ? $_POST['total'] : '',
            "accID" => $_POST['accID'] ? $_POST['accID'] : '',
            "status" => $_POST['status'] ? $_POST['status'] : '',
        ];
    $update = $db->update('bill', $data, array('id' => $id));
    if ($update > 0) {
        $sql_update_bill = "UPDATE `bill` 
                            SET `qty`= (SELECT sum(billinfor.qty) FROM billinfor WHERE billinfor.billID = $id),
                                `total` = (SELECT sum(billinfor.total) FROM billinfor WHERE billinfor.billID = $id)
                            WHERE `id` = $id";
        $update = $db->query($sql_update_bill);

        $_SESSION['error'] = "Thêm thành công";
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
                            <h4 class="card-title">Sửa Bill</h4>
                            <div class="basic-form">
                                <form method="POST" action="">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tên</label>
                                            <input type="text" value="<?php echo $bill['userName'] ?>" name="userName" required class="form-control" placeholder="userName">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>số điện thoại</label>
                                            <input type="number" value="<?php echo $bill['sdt'] ?>" name="sdt" required class="form-control">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="text" value="<?php echo $bill['email'] ?>" name="email" required class="form-control" placeholder="userName">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Địa Chỉ</label>
                                            <input type="text" value="<?php echo $bill['addr'] ?>" name="addr" required class="form-control">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Ngày Hóa Đơn</label>
                                            <input type="date" value="<?php echo $bill['date'] ?>" name="date" required class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Số Lượng</label>
                                            <input type="number" value="<?php echo $bill['qty'] ?>" name="qty" required class="form-control" placeholder="userName">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Thành Tiền</label>
                                            <input type="number" value="<?php echo $bill['total'] ?>" name="total" required class="form-control" placeholder="userName">
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label>Nhân Viên </label>
                                            <select id="inputState" name="accID" required class="form-control">
                                                <?php foreach ($account as $item) : ?>
                                                    <?php if ($item['id'] == $bill['accID']) : ?>
                                                        <option selected value="<?php echo $item['id'] ?>"><?php echo $item['displayName'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?php echo $item['id'] ?>"><?php echo $item['displayName'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Trạng Thái Thanh Toán</label>
                                            <select id="inputState" name="status" required class="form-control">
                                                <?php if ($bill['status'] == 1) :  ?>
                                                    <option selected value="1">Đã Thanh Toán</option>
                                                    <option value="0">Chưa Thanh Toán</option>
                                                <?php else : ?>
                                                    <option value="1">Đã Thanh Toán</option>
                                                    <option selected value="0">Chưa Thanh Toán</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-dark">Sửa Thông Tin Hóa Đơn</button>
                                    <a class="btn btn-info" href="./../billinfo/index.php?billID=<?php echo $bill['id'] ?>">Chi Tiết Hóa ĐƠn</a>
                                    <a class="btn btn-info" href="./../bill/print_bill.php?billID=<?php echo $bill['id'] ?>">In Hoá Đơn</a>
                                    <a class="btn btn-info" href="./../bill/export_excel.php?billID=<?php echo $bill['id'] ?>">Excel</a>
                                    <a class="btn btn-info" href="./../bill/sendMail.php?billID=<?php echo $bill['id'] ?>">Gửi Mail</a>
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