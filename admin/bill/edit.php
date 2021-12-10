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
            "userID" => $_POST['userID'] ? $_POST['userID'] : '',
            "accID" => $_POST['accID'] ? $_POST['accID'] : '',
            "date" => $_POST['date'] ? $_POST['date'] : '',
            "qty" => $_POST['qty'] ? $_POST['qty'] : '',
            "total" => $_POST['total'] ? $_POST['total'] : '',
            "active" => $_POST['active'] ? $_POST['active'] : '',
        ];

    $update = $db->update('bill', $data, array('id' => $id));
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
                            <h4 class="card-title">Sửa Bill</h4>
                            <div class="basic-form">
                                <form method="POST" action="">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <select id="inputState" name="userID" required class="form-control">
                                                <?php foreach ($user as $item) : ?>
                                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['displayName'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-row col-md-6">
                                            <select id="inputState" name="accID" required class="form-control">
                                                <?php foreach ($account as $item) : ?>
                                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['displayName'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <select id="inputState" name="status" required class="form-control">
                                                <option value="1">Đã Thanh Toán</option>
                                                <option selected="selected" value="0">Chưa Thanh Toán</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Tạo Bill</button>
                                    <a class="btn btn-info" href="./../billinfo/index.php?billID=<?php echo $bill['id'] ?>">Chi Tiết Hóa ĐƠn</a>
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
    <script src="./../../public/ckeditor/ckeditor.js"></script>
</body>

</html>