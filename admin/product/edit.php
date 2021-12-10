<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../layout/header.php'); ?>
    <title>Admin</title>

</head>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select product.*, category.name as `categoryName` from product, category, brand where product.categoryID = category.ID and product.id = $id";
    $product = $db->fetchOne($sql);
    $sql1 = "select * from category";
    $category = $db->fetchAll($sql1);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // upload file
    $check1 = $check2 = $check3 = $check4 = false;

    if (isset($_FILES['file1'])) {
        $errors1 = array();
        $file_name1 = $_FILES['file1']['name'];
        $file_size1 = $_FILES['file1']['size'];
        $file_tmp1 = $_FILES['file1']['tmp_name'];
        $file_type1 = $_FILES['file1']['type'];
        $file_ext1 = strtolower(end(explode('.', $_FILES['file1']['name'])));
        $expensions1 = array("jpeg", "jpg", "png");

        if (in_array($file_ext1, $expensions1) === false) {
            $errors1[] = "Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
        }

        if (empty($errors1) == true) {
            move_uploaded_file($file_tmp1, '../../public/img/product/' . $file_name1);
            $check1 = true;
        }
    }
    if (isset($_FILES['file2'])) {
        $errors2 = array();
        $file_name2 = $_FILES['file2']['name'];
        $file_size2 = $_FILES['file2']['size'];
        $file_tmp2 = $_FILES['file2']['tmp_name'];
        $file_type2 = $_FILES['file2']['type'];
        $file_ext2 = strtolower(end(explode('.', $_FILES['file2']['name'])));
        $expensions2 = array("jpeg", "jpg", "png");

        if (in_array($file_ext2, $expensions2) === false) {
            $errors2[] = "Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
        }

        if (empty($errors2) == true) {
            move_uploaded_file($file_tmp2, '../../public/img/product/' . $file_name2);
            $check2 = true;
        }
    }
    if (isset($_FILES['file3'])) {
        $errors3 = array();
        $file_name3 = $_FILES['file3']['name'];
        $file_size3 = $_FILES['file3']['size'];
        $file_tmp3 = $_FILES['file3']['tmp_name'];
        $file_type3 = $_FILES['file3']['type'];
        $file_ext3 = strtolower(end(explode('.', $_FILES['file3']['name'])));
        $expensions3 = array("jpeg", "jpg", "png");

        if (in_array($file_ext3, $expensions3) === false) {
            $errors3[] = "Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
        }

        if (empty($errors3) == true) {
            move_uploaded_file($file_tmp3, '../../public/img/product/' . $file_name3);
            $check3 = true;
        }
    }
    if (isset($_FILES['file4'])) {
        $errors4 = array();
        $file_name4 = $_FILES['file4']['name'];
        $file_size4 = $_FILES['file4']['size'];
        $file_tmp4 = $_FILES['file4']['tmp_name'];
        $file_type4 = $_FILES['file4']['type'];
        $file_ext4 = strtolower(end(explode('.', $_FILES['file4']['name'])));
        $expensions4 = array("jpeg", "jpg", "png");

        if (in_array($file_ext4, $expensions4) === false) {
            $errors4[] = "Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
        }

        if (empty($errors4) == true) {
            move_uploaded_file($file_tmp4, '../../public/img/product/' . $file_name4);
            $check4 = true;
            
        }
    }


    $data =
        [
            "name" => $_POST['name'] ? $_POST['name'] : '',
            "slug" => slugify($_POST['name']),
            "detail" => $_POST['detail'] ? $_POST['detail'] : '',
            "categoryID" => $_POST['categoryID'] ? $_POST['categoryID'] : '',
            "active" => $_POST['active'] ? $_POST['active'] : '',
        ];
    if ($check1) {
        $data["avatarImg1"] = "public/img/product/" . $file_name1;
    }
    if ($check2) {
        $data["avatarImg2"] = "public/img/product/" . $file_name2;
    }
    if ($check3) {
        $data["avatarImg3"] = "public/img/product/" . $file_name3;
    }
    if ($check4) {
        $data["avatarImg4"] = "public/img/product/" . $file_name4;
    }
    $update = $db->update('product', $data, array('id' => $id));
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
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <input type="text" required name="name" value="<?php echo $product['name'] ?>" class="form-control" placeholder="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Chi Tiết</label>
                                        <input type="text" required name="detail" value="<?php echo $product['detail'] ?>" class="form-control" placeholder="name">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Loại SP</label>
                                            <select id="inputState" name="categoryID" required class="form-control">
                                                <?php foreach ($category as $item) : ?>
                                                    <?php if($item['id'] == $product['categoryID']) :?>
                                                        <option selected value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                    <?php else :?>
                                                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Active</label>
                                            <select id="inputState" name="active" required class="form-control">
                                                <?php if ($product['active'] == 1) :  ?>
                                                    <option selected value="1">Hiển Thị</option>
                                                    <option value="0">Ẩn</option>
                                                <?php else : ?>
                                                    <option value="1">Hiển Thị</option>
                                                    <option selected value="0">Ẩn</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="file" name="file1" class="form-control-file">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <img width="100" height="100" src="<?php echo $base_url . $product['avatarImg1'] ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="file" name="file2" class="form-control-file">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <img width="100" height="100" src="<?php echo $base_url . $product['avatarImg2'] ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="file" name="file3" class="form-control-file">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <img width="100" height="100" src="<?php echo $base_url . $product['avatarImg3'] ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="file" name="file4" class="form-control-file">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <img width="100" height="100" src="<?php echo $base_url . $product['avatarImg4'] ?>" alt="">
                                        </div>
                                    </div> 
                                    
                                    <button type="submit" class="btn btn-dark">Tạo Sản Phẩm</button>
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