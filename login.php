<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once(__DIR__ . './layout/header.php') ?>
</head>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST")

?>

<body>

    <!-- header -->
    <div id="header">
        <div class="header__navbar-logo ">
            <a href="index.html"> <img src="assets/img/logo_transparent.png" alt="logo" class="header__navbar-img"></a>
            <!-- <span class="header-text">Đăng nhập</span> -->
        </div>
        
    </div>





    <!-- container -->
        <div id="container">
        <div class="container__img">
            <img src="assets/img/login_background.jpg" alt="" class="container__img-background">
        </div>
        <form method="POST" action="">
        <div class="container__login">
            <div class="container__login-header">
                <h3 class="conatiner__login-title">Đăng nhập</h3>
                <span ><a href="reg.html" class="container__login-back"> Đăng kí </a></span>
            </div>
             <div class="container__login-form">
                <div class="container__login-form-list">
                    <input type="email" name="email" class="login__form-input" placeholder="Nhập email">
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

</body>
</html>