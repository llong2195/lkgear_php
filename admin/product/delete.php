<?php
require_once(__DIR__ . '/../../lib/autoload.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    
    $sql= "DELETE FROM product WHERE id = $id";
    $delete=$db->delete($sql);
    if($delete>0)
    {
        $_SESSION['error']="xóa thành công";
        header('Location: ./index.php');
    } else
        $_SESSION['error']="không thành công";
}
?>
