<!DOCTYPE html>
<html lang="vi">
<head>
<?php require_once(__DIR__ . '/layout/header.php') ?>
<link rel="stylesheet" href="./public/site/css/Login.css">
</head>

<?php 
if(isset($_SESSION['user'])){
    header("location:./index.php");
}
else{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["userName"]) || empty($_POST['password'])){
            echo "<script>alert('KO dc de trong')</script>";
        }else{
            $userName  = $_POST["userName"];
            $password  = md5($_POST["password"]);

            $sql = "select * from user where userName = '$userName' and password = '$password' ";

            $rs = $db->fetchOne($sql);
            if($rs > 0){
                echo "Đăng Nhập Thành Công";
                $_SESSION['user'] =  $rs['userName'];
                header("location:./index.php");
            }else{
                echo "Đăng Nhập Thất Bại";
            }

        }
    }
}
?>

<body>

    <!-- header -->
    <div id="header">
        <div class="header__navbar-logo ">
            <a href="index.html"> <img src="./public/site/img/logo.png" alt="logo" class="header__navbar-img"></a>
            <!-- <span class="header-text">Đăng nhập</span> -->
        </div>
        
    </div>





    <!-- container -->
    <div id="container">
        <div class="container__img">
            <img src="./public/site/img/login_background.jpg" alt="" class="container__img-background">
        </div>
        <form class="mt-5 mb-5 login-input" action="" method="POST">
        <div class="container__login"  style="margin-top:92px">
            <div class="container__login-header">
                <h3 class="conatiner__login-title">Đăng nhập</h3>
                <span ><a href="reg.html" class="container__login-back"> Đăng kí </a></span>
            </div>
             <div class="container__login-form">
                <div class="container__login-form-list">
                    <input type="text" name="userName" class="login__form-input" placeholder="Nhâp username của bạn">
                </div>
                <div class="container__login-form-list">
                    <input type="password" name="password" class="login__form-input" placeholder="Nhập mật khẩu của bạn">
                </div>
            </div>
            <div class="container__login-aside">
                <div class="form__login-help">
                    <a href="" class="form__link">Quên mật khẩu</a>
                    <span class="form__link-separate"></span>
                    <a href="" class="form__link">Cần trợ giúp?</a>
                </div>
            </div>
            <div class="container__login-btn">
                <input type="submit" class="btn" value="Đăng nhập">
            </div>



        </div>
        </form>
    

    </div>


    <div id="footer">
        <div class="footer__container active_center">
            <div class="footer__container--items">
                <h4>Thông Tin Liên Hệ</h4>
                <ul>
                    <li><img src="./assets/logo/adress.svg" alt=""> Đ/c: 123 Trần Duy Hưng, Hà Nội</li>
                    <li><img src="./assets/logo/phone.svg" alt="">Hotline: 0927015206</li>
                    <li><img src="./assets/logo/phone.svg" alt="">Hotline: 0961955201</li>
                    <li><img src="./assets/logo/mail.svg" alt="">Email: kienteo1012@gmail.com</li>
                    <li><img src="./assets/logo/mail.svg" alt="">Email: nduylong9501@gmail.com</li>
                </ul>
            </div>

            <div class="footer__container--items">
                <h4>Thời Gian Mở Cửa</h4>
                <ul>
                    <li>Thứ 2 - thứ 6: 8AM - 10PM</li>
                    <li>Thứ 7: 9AM - 8PM</li>
                </ul>
            </div>
            <div class="footer__container--items">
                <h4>Hỗ Trợ Khách Hàng</h4>
                <ul>
                    <li><a href="">Liên Hệ, Góp Ý</a></li>
                    <li></li>
                    <li><a href="">Chính Sách Bảo Mật</a></li>
                    <li></li>
                </ul>
            </div>
            <div class="footer__container--items">
                <h4>Chính Sách Mua Hàng</h4>
                <ul>
                    <li><a href="pay.html" target="_blank">Hình Thức Thanh Toán</a></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            
            <ul class="footer__contact--icon">
                <li><a href=""><img src="./assets/img/fb.svg" alt=""></a></li>
                <li><a href=""><img src="./assets/img/instagram.svg" alt=""></a></li>
                <li><a href=""><img src="./assets/img/g++.svg" alt=""></a></li>
                
            </ul>
            
        </div>
        
    </div>
</body>
</html>