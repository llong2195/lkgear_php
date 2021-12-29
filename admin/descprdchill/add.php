<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../layout/header.php'); ?>
    <title>Admin</title>

</head>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "prdChillID" => $_POST['prdChillID'] ? $_POST['prdChillID'] : '',
            "name" => $_POST['name'] ? $_POST['name'] : '',
            "slug" => slugify($_POST['name']),
            "detail" => $_POST['detail'] ? $_POST['detail'] : '',
            "description" => $_POST['description'] ? $_POST['description'] : '',

        ];
    $insert = $db->insert('descprdchill', $data);
    if ($insert > 0) {
        $_SESSION['error'] = "Thêm thành công";
        header('Location: ./index.php?id='.$id);
    } else {
        $_SESSION['error'] = "không thành công";
        header('Location: ./add.php?id='.$id);
    }
} else {
    $sql = "select * from prdchill";
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
                                            <label>Tên</label>
                                            <input type="text" required name="name" class="form-control" placeholder="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Sản Phẩm Cha</label>
                                            <select id="inputState" name="prdChillID" required class="form-control">
                                                <?php foreach ($prdchill as $item) : ?>
                                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Mô Tả</label>
                                            <input type="text" required name="detail" class="form-control" placeholder="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Chi Tiết</label>
                                            <input type="text" required name="description" class="form-control" placeholder="name">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-dark">Tạo Mô Tả</button>
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