
<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__ . '/lib/autoload.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LK - Reg</title>
    <link rel="shortcut icon" href="./assets/logo/header--logo.png">
    <link rel="stylesheet" href="./public/site/css/reg.css">
    <?php require_once(__DIR__ . '/layout/header.php') ?>

</head>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // upload file
        $data =
        [
            "userName" => $_POST['userName'] ? $_POST['userName'] : '',
            "password" => md5($_POST['password']),
            "email" => $_POST['email'] ? $_POST['email'] : '',
            "addr" => $_POST['addr'] ? $_POST['addr'] : '',
            "sdt" => $_POST['sdt'] ? $_POST['sdt'] : '',
            "birthday" => $_POST['birthday'] ? $_POST['birthday'] : '',
        ];
        $insert = $db->insert('user', $data);
        header('Location: ./index.php');
    }
?>

<body>
    <!-- Page Preloder -->
    <?php require_once(__DIR__ . '/layout/nav_header.php') ?>
    <?php require_once(__DIR__ . '/layout/menu.php') ?>


    <div id="container">
        <div class="contai__main">
            <div class="form__reg">
                <h2>Đăng Ký</h2>
                <form action="" method="POST">
                    <div class="form__reg--line">
                        <div class="form__reg--line-left">
                            <span>Họ Và Tên</span>
                            <input type="text" name="userName" id="" class="" placeholder="Họ *">
                        </div>
                        <div class="form__reg--line-right">
                            <span>Password</span>
                            <input type="password" name="password" id="" class="" placeholder="Password *" style="border:none;margin-top:10px;height:40px">  
                        </div>      
                        

                    </div>
                    
                    <div class="form__reg--line">
                        <div class="form__reg--line-left">
                            <span>Ngày Sinh</span>
                            <input type="date" name="birthday" id="">
                        </div>      
                        <div class="form__reg--line-right">
                            <span>Địa Chỉ</span>
                            <input type="text" name="addr" id="">
                        </div> 
                    </div>

                    <div class="form__reg--line">
                        <div class="form__reg--line-left">
                            <span>Email</span>
                            <input type="text" name="email" id="" class="" placeholder="Email *">
                        </div>
                        <div class="form__reg--line-right">
                            <span>Sdt</span>
                            <input type="text" name="sdt" id="" class="" placeholder="Số Điện Thoại *">
                        </div>
                    </div>
                    
                    <div class="form__reg--line">
                        
                        
                    </div>
                    <!--  -->

                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="bg_logo">
                
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <?php require_once(__DIR__ . '/layout/footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php require_once(__DIR__ . '/layout/script.php') ?>
</body>
</html>