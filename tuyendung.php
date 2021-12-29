<!DOCTYPE html>
<html lang="vi">
<?php require_once(__DIR__ . '/lib/autoload.php') ?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LK Gear</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $base_url ?>public/site/img/header--logo.png">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/site/css/tuyendung.css">
    <link rel="stylesheet" href="./public/site/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./public/site/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./public/site/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./public/site/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./public/site/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./public/site/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./public/site/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./public/site/css/style.css" type="text/css">
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST)) {
        $name = $_POST['name'];
        $sdt = $_POST['sdt'];
        $mail = $_POST['mail'];
        $description = $_POST['description'];


        $data =
            [
                "name" => $_POST['name'] ? $_POST['name'] : '',
                "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
                "mail" => $_POST['mail'] ? $_POST['mail'] : '',
                "description" => $_POST['description'] ? $_POST['description'] : '',
            ];
        $insert = $db->insert('tuyendung', $data);
        if ($insert > 0) {
            $_SESSION['error'] = "Thêm thành công";
            header('Location: ./index.php');
        } else {
            $_SESSION['error'] = "không thành công";
            header('Location: ./add.php');
        }
    }
}
?>

<body>
    <!-- header -->
    <div id="header">
        <div>
            <a href="./index.php">
                <img src="./public/site/img/header--logo.png" alt="" class="header-logo">
            </a>
        </div>
        <div class="header__title">
            Let's Grow Together
        </div>
        <p class="header__text">
            LK Gear tin rằng nhân viên là cốt lõi của bền vững, chúng tôi luôn quan tâm đến lộ trình phát triển nghề nghiệp của bạn. Môi trường làm việc tại LK Gear được xây dựng đa dạng, đề cao sự sáng tạo và thay đổi linh hoạt theo xu thế của thị trường. Mỗi nhân viên đều được trao cơ hội như nhau, chúng tôi tin rằng dù khởi đầu ra sao thì nhiệt huyết và khát khao học hỏi vẫn sẽ quyết định vị trí cuối cùng của bạn ở LK Gear.
        </p>
    </div>

    <!-- container -->
    <div id="container">
        <div class="container__title">
            Vị Trí Tuyển Dụng
            <hr class="line">
        </div>
        <div class="container__recruit">
            <ul class="container__recruit-list">
                <li class="container__recruit-item">
                    <div class="recruit__item-text">
                        <div class="recruit__item-title">
                            Nhân Viên Kế Toán Thuế
                        </div>
                        <div class="recruit__item-subtext">
                            Toàn thời gian
                            <span class="location-text">LK Gear Trần Duy Hưng</span>
                        </div>
                    </div>
                    <div class="recruit__item-btn">
                        <a href="">
                            <input type="button" class="btn" value="Ứng Tuyển Ngay">
                        </a>
                    </div>

                </li>
                <li class="container__recruit-item">
                    <div class="recruit__item-text">
                        <div class="recruit__item-title">
                            Quản Lý Showroom
                        </div>
                        <div class="recruit__item-subtext">
                            Toàn thời gian
                            <span class="location-text">LK Gear Trần Duy Hưng</span>
                        </div>
                    </div>
                    <div class="recruit__item-btn">
                        <a href="">
                            <input type="button" class="btn" value="Ứng Tuyển Ngay">
                        </a>
                    </div>
                </li>
                <li class="container__recruit-item">
                    <div class="recruit__item-text">
                        <div class="recruit__item-title">
                            Cameraman
                        </div>
                        <div class="recruit__item-subtext">
                            Toàn thời gian
                            <span class="location-text">LK Gear Trần Duy Hưng</span>
                        </div>
                    </div>
                    <div class="recruit__item-btn">
                        <a href="">
                            <input type="button" class="btn" value="Ứng Tuyển Ngay">
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="container__recruit-list">
                <li class="container__recruit-item">
                    <div class="recruit__item-text">
                        <div class="recruit__item-title">
                            Nhân Viên Bảo Vệ
                        </div>
                        <div class="recruit__item-subtext">
                            Toàn thời gian
                            <span class="location-text">LK Gear Trần Duy Hưng</span>
                        </div>
                    </div>
                    <div class="recruit__item-btn">
                        <a href="">
                            <input type="button" class="btn" value="Ứng Tuyển Ngay">
                        </a>
                    </div>
                </li>
                <li class="container__recruit-item">
                    <div class="recruit__item-text">
                        <div class="recruit__item-title">
                            Quản Lý Sản Phẩm
                        </div>
                        <div class="recruit__item-subtext">
                            Toàn thời gian
                            <span class="location-text">LK Gear Trần Duy Hưng</span>
                        </div>
                    </div>
                    <div class="recruit__item-btn">
                        <a href="">
                            <input type="button" class="btn" value="Ứng Tuyển Ngay">
                        </a>
                    </div>
                </li>
                <li class="container__recruit-item">
                    <div class="recruit__item-text">
                        <div class="recruit__item-title">
                            Nhân Viên Kho Hàng
                        </div>
                        <div class="recruit__item-subtext">
                            Toàn thời gian
                            <span class="location-text">LK Gear Trần Duy Hưng</span>
                        </div>
                    </div>
                    <div class="recruit__item-btn">
                        <a href="">
                            <input type="button" class="btn" value="Ứng Tuyển Ngay">
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="contact-form spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__title">
                            <h2>Gửi Phản Hồi</h2>
                        </div>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <input type="text" required name="name" placeholder="Tên">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <input type="number" required name="sdt" placeholder="SDT">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <input type="mail" name="mail" required placeholder="Your mail">
                        </div>
                        <div class="col-lg-12 text-center">
                            <textarea name="description" placeholder="Mô Tả"></textarea>
                            <button type="submit" class="site-btn">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>