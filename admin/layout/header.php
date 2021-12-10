<?php
    require_once(__DIR__ .'/../../lib/autoload.php');
?>

<?php 
    if(!isset($_SESSION['login'])){
    //     echo $_SESSION['login'];
    // }else{
        header('Location:http://localhost:8080/lkgear/admin/login.php');
    }
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">

<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $base_url ?>public/admin/images/favicon.png">
<!-- Pignose Calender -->
<link href="<?php echo $base_url ?>public/admin/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
<!-- Chartist -->
<link rel="stylesheet" href="<?php echo $base_url ?>public/admin/plugins/chartist/css/chartist.min.css">
<link rel="stylesheet" href="<?php echo $base_url ?>public/admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
<!-- Custom Stylesheet -->
<link href="<?php echo $base_url ?>public/admin/css/style.css" rel="stylesheet">


