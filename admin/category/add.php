<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../layout/header.php'); ?>
    <title>Admin</title>

</head>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // upload file
    if (isset($_FILES['file'])) {
        $errors = array();
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, '../../public/img/category/' . $file_name);
           
        } 
    }

    //


    $data =
        [
            "name" => $_POST['name'] ? $_POST['name'] : '',
            "slug" => slugify($_POST['name']),
            "avatarImg" => "public/img/category/" . $file_name,
            "detail" => $_POST['detail'] ? $_POST['detail'] : '',
            "description" => $_POST['description'] ? $_POST['description'] : '',
            "qty" => $_POST['qty'] ? $_POST['qty'] : '',
            "active" => $_POST['active'] ? $_POST['active'] : '',
        ];
    $insert = $db->insert('category', $data);
    if ($insert > 0) {
        $_SESSION['error'] = "Thêm thành công";
        header('Location: ./index.php');
    } else {
        $_SESSION['error'] = "không thành công";
        header('Location: ./add.php');
    }
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
                            <h4 class="card-title">Thêm Category</h4>
                            <div class="basic-form">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <input type="text" required name="name" class="form-control" placeholder="name">
                                    </div>

                                    <div class="form-group">
                                        <label>Tiêu Đề</label>
                                        <input type="text" name="detail" required class="form-control" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group">
                                        <label>Mô Tả</label>
                                        <textarea class="form-control" name="description" id="editor1" rows="10" cols="80">
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('editor1');
                                        </script>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label>Số Lượng</label>
                                            <input type="number" name="qty" required class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Active</label>
                                            <select id="inputState" name="active" required class="form-control">
                                                <option value="1">Hiển Thị</option>
                                                <option selected="selected" value="0">Ẩn</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <input type="file" required name="file" class="form-control-file">
                                    </div>

                                    <button type="submit" class="btn btn-dark">Tạo Category</button>
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