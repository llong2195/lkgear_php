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
            "userID" => $_POST['userID'] ? $_POST['userID'] : '',
            "prdID" => $_POST['prdID'] ? $_POST['prdID'] : '',
            "content" => $_POST['content'] ? $_POST['content'] : '',
            "respone" => $_POST['respone'] ? $_POST['respone'] : '',
            "rate" => $_POST['rate'] ? $_POST['rate'] : '',
            "active" => $_POST['active'] ? $_POST['active'] : '',
        ];
    $insert = $db->insert('comment', $data);
    if ($insert > 0) {
        $_SESSION['error'] = "Thêm thành công";
        header('Location: ./index.php');
    } else {
        $_SESSION['error'] = "không thành công";
        header('Location: ./add.php');
    }
} else {
    $sql = "select * from user";
    $user = $db->fetchAll($sql);
    $sql1 = "select * from prdchill";
    $product = $db->fetchAll($sql1);
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
                            <h4 class="card-title">Thêm Comment</h4>
                            <div class="basic-form">
                                <form method="POST" action="">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tên</label>
                                            <select id="inputState" name="userID" required class="form-control">
                                                <?php foreach ($user as $item) : ?>
                                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['userName'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Sản Phẩm Cha</label>
                                            <select id="inputState" name="prdID" required class="form-control">
                                                <?php foreach ($product as $item) : ?>
                                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Content</label>
                                        <input type="text" name="content" required class="form-control" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group">
                                        <label>Respone</label>
                                        <input type="text" name="respone" class="form-control" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label>Rate</label>
                                            <input type="number" name="rate" required class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Active</label>
                                            <select id="inputState" name="active" required class="form-control">
                                                <option value="1">Hiển Thị</option>
                                                <option selected="selected" value="0">Ẩn</option>
                                            </select>
                                        </div>

                                    </div>


                                    <button type="submit" class="btn btn-dark">Tạo Comment</button>
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