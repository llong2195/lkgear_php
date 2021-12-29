<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../layout/header.php'); ?>
    <title>Admin</title>

</head>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // upload file
    $data =
        [
            "userName" => $_POST['userName'] ? $_POST['userName'] : '',
            "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
            "email" => $_POST['email'] ? $_POST['email'] : '',
            "addr" => $_POST['addr'] ? $_POST['addr'] : '',
            "date" => date("Y-m-d"),
            "accID" => $_POST['accID'] ? $_POST['accID'] : '',
        ];
    $insert = $db->insert('bill', $data);
    if ($insert > 0) {
        
        $sql_update_bill = "UPDATE `bill` 
                            SET `qty`= (SELECT sum(qty) FROM billinfor WHERE billinfor.billID = $insert)
                                `total` = (SELECT sum(total) FROM billinfor WHERE billinfor.billID = $insert)
                            WHERE `id` = $insert";
        $update = $db->query($sql_update_bill);

        $_SESSION['error'] = "Thêm thành công";
        header('Location: ./index.php');
    } else {
        $_SESSION['error'] = "không thành công";
        header('Location: ./add.php');
    }
} else {
    $sql = "select * from user";
    $user = $db->fetchAll($sql);
    $sql1 = "select * from account";
    $account = $db->fetchAll($sql1);
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
                            <h4 class="card-title">Thêm Bill</h4>
                            <div class="basic-form">
                                <form method="POST" action="">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tên</label>
                                            <input type="text" name="userName" required class="form-control" placeholder="userName">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>số điện thoại</label>
                                            <input type="number" name="sdt" required class="form-control">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="text" name="email" required class="form-control" placeholder="userName">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Địa Chỉ</label>
                                            <input type="text" name="addr" required class="form-control">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nhân Viên</label>
                                            <select id="inputState" name="accID" required class="form-control">
                                                <?php foreach ($account as $item) : ?>
                                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['displayName'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-dark">Tạo Bill</button>
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