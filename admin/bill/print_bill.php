<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="./print.css">
        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script> -->
        <title>In Hóa đơn</title>
    </head>
    
    <?php
        require_once(__DIR__ .'/../../lib/autoload.php');
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET['billID'])){
                $id = $_GET['billID'];
                $bill = $db->fetchOne("Select * from bill where id = $id");
                
                $billinfor=$db->fetchAll("SELECT `product`.`name` as `name1`, `product`.`name` as `name2`, `billinfor`.`qty`, `prdchill`.`priceSale`, `billinfor`.`total`  FROM `billinfor`, `product`, `prdchill` WHERE `billinfor`.`prdChillID` = `prdchill`.`id` and `product`.`id` = `prdchill`.`id` and  `billID` = $id");

            }else{
                header('Location: ./index.php');
            }
            
        }
    ?>
    
    <body onload="window.print();">
        <!--onload="window.print();" -->
        
        <div id="page" class="page">
            <div class="header">
                <div class="logo"><img src="./logo.png" width="120px"></div>
                <div class="company">Công Ty TNHH LKGear</div>
            </div>
            <br />
            <div class="title">
                HÓA ĐƠN THANH TOÁN
                <br>
                (Khiên phiếu xuất hàng)
                <br>
                <br>
                Đơn Hàng : #<b><?php echo $bill['id'] ?></b>
            </div>
            <br />
            <br />
            <div>
                <div class="customer">
                Khách hàng : <?php echo $bill['userName']?>
                </div>
                <div class="customer">
                SĐT : <?php echo $bill['sdt']?>
                </div>
                <div class="customer">
                Địa chỉ giao hàng : <?php echo $bill['addr']?>
                </div>
            </div>
            <table class="TableData">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php $stt=1; foreach($billinfor as $item): ?>
                    <tr>
                        <td><?php echo $stt++ ?></td>
                        <td><?php echo $item['name1'].' '.$item['name2'] ?></td>
                        <td><?php echo $item['priceSale'] ?></td>
                        <td><?php echo $item['qty'] ?></td>
                        <td><?php echo $item['total'] ?></td>
                    </tr>                 
                <?php endforeach; ?>
    
                <tr>
                    <td colspan="4" class="tong">Tổng cộng</td>
                    <td class="cotSo"><?php echo $bill['total'] ?></td>
                </tr>
            </table>
            <div class="footer-left"><br />
                Khách hàng </div>
            <?php
                date_default_timezone_set('Asia/Ho_Chi_Minh');
            ?>
            <div class="footer-right"> Hà Nội, ngày <?php echo date("d") ?> tháng <?php echo date("m") ?> năm <?php echo date("Y") ?> <br /> Người tạo <br />
        </div>
        <?php
            $id_update = $db->update("bill",array("status"=>1),array("id"=>$id));
        ?>
    </body> 
</html>