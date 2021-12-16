<?php 
    session_start();
    echo "trc :<br>";
    var_dump($_SESSION['cart']);
    var_dump($_SESSION['qty']);

    if(isset($_GET) && isset($_GET['prdchillID'])){
        $prdChillID = $_GET['prdchillID'];
        if(isset($_SESSION['cart'][$prdChillID])){
            unset($_SESSION['cart'][$prdChillID]);
        }

    }
    if(count($_SESSION['cart'])>0){
        $count = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            $count += $value;
        }
        $_SESSION['qty'] = $count;
    }
        echo "<br>sau :\n <br>";
    var_dump($_SESSION['cart']);
    var_dump($_SESSION['qty']);
    header("location: ./../../cart.php");
?>