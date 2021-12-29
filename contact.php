<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once(__DIR__ . '/layout/header.php') ?>
</head>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // upload file
        $data =
            [
                "name" => $_POST['name'] ? $_POST['name'] : '',
                "mail" => $_POST['mail'] ? $_POST['mail'] : '',
                "content" => $_POST['content'] ? $_POST['content'] : '',
                
            ];
        $insert = $db->insert('contact', $data);
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
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?php require_once(__DIR__ . '/layout/nav_header.php') ?>
    <?php require_once(__DIR__ . '/layout/menu.php') ?>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>SDT</h4>
                        <p>0961955201</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa Chỉ</h4>
                        <p>123 - Trần Duy Hưng - Hà Nội</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>8:00 am to 21:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>lkgear@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6646412529376!2d105.79174441476287!3d21.006075986010675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca5f64f829f%3A0xcb4a80cd1b0490dc!2zMTIzIFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIFRoYW5oIFh1w6JuLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1639567382665!5m2!1svi!2s" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Hà Nội</h4>
                <ul>
                    <li>Phone: 0961955201</li>
                    <li>Add: 123 - Trần Duy Hưng - Hà Nội</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
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
                        <input type="text" required name="name" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="email" required name="mail" placeholder="Your Email">
                    </div>
                    
                    <div class="col-lg-12 text-center">
                        <textarea name="content" required placeholder="Your message"></textarea>
                        <button type="submit" class="site-btn">Gửi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

    <!-- Footer Section Begin -->
    <?php require_once(__DIR__ . '/layout/footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once(__DIR__ . '/layout/script.php') ?>




</body>

</html>