<?php
require_once(__DIR__ . '/../../lib/autoload.php');
if (isset($_GET['billID']) && isset($_GET['prdChillID'])) {
    $billID = $_GET['billID'];
    $prdChillID = $_GET['prdChillID'];
    
    $sql= "DELETE FROM billinfor WHERE billID = $billID and prdChillID = $prdChillID";
    $delete=$db->delete($sql);
    if($delete>0)
    {
        $_SESSION['error']="xóa thành công";
        header('Location: ./index.php?billID='.$_GET['billID']);
    } else
        $_SESSION['error']="không thành công";
}
?>
