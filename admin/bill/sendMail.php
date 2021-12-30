<?php
require_once(__DIR__ . '/../../lib/autoload.php');
include "./../../modules/PHPMailer-master/src/PHPMailer.php";
include "./../../modules/PHPMailer-master/src/Exception.php";
include "./../../modules/PHPMailer-master/src/OAuth.php";
include "./../../modules/PHPMailer-master/src/POP3.php";
include "./../../modules/PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET["billID"])) {
        $billID = $_GET['billID'];
        $sql_bill = "SELECT * FROM bill WHERE id = $billID ";
        $bill = $db->fetchOne($sql_bill);

        $sql_prdbill = "SELECT billinfor.*, prdchill.name as `prdchillName`, product.name as `productName` FROM billinfor, prdchill, product WHERE billinfor.prdChillID = prdchill.id and prdchill.prdid = product.id and billID=$billID ";
        $prdbill = $db->fetchAll($sql_prdbill);

        $userName = $bill["userName"];
        $sdt = $bill["sdt"];
        $email = $bill["email"];
        $addr = $bill["addr"];
        $qty = $bill["qty"];
        $total = $bill["total"];



        $str_body = '';
        $str_body .= '
    <p>
        <b>Khách hàng:</b> ' . $userName . '<br>
        <b>Điện thoại:</b> ' . $sdt . '<br>
        <b>Địa chỉ:</b> ' . $addr . '<br>
    </p>
        ';

        $str_body .= '
    <table border="1" cellspacing="0" cellpadding="10" bordercolor="#305eb3" width="100%">
    <tr bgcolor="#305eb3">
        <td width="50%"><b>
                <font color="#FFFFFF">Sản phẩm</font>
            </b></td>
        <td width="10%"><b>
                <font color="#FFFFFF">Số lượng</font>
            </b></td>
        <td width="20%"><b>
                <font color="#FFFFFF">Giá</font>
            </b></td>
        <td width="20%"><b>
                <font color="#FFFFFF">Tổng tiền</font>
            </b></td>
    </tr>
    ';

        foreach($prdbill as $item){
            $str_body .= '
            <tr>
                <td width="50%">' . $item["prdchillName"] . '</td>
                <td width="10%">' . $item["qty"] . '</td>
                <td width="20%">' . $item["priceSale"] . '</td>
                <td width="20%">' . $item["total"] . ' đ</td>
            </tr>
            ';
        }

        $str_body .= '
        <tr>
            <td colspan="3" width="70%"></td>
            <td width="20%"><b>
                    <font color="#FF0000">' . $total . ' đ</font>
                </b></td>
        </tr>
    </table>
    ';

        $str_body .= '
    <p>
        Cám ơn quý khách đã mua hàng tại Shop của chúng tôi, bộ phận giao hàng sẽ liên hệ với quý khách để xác nhận sau 5 phút kể từ khi đặt hàng thành công và chuyển hàng đến quý khách chậm nhất sau 24 tiếng.
    </p>
    ';

        /////////////////////////

        $mail = new PHPMailer(true);                              // Passing 'true' enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'lkgearlk@gmail.com';                 // SMTP username
            $mail->Password = 'nqpwwzqqkspddath';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, 'ssl' also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('lkgearlk@gmail.com', 'LKGear');                // Gửi mail tới Mail Server
            $mail->addAddress($email);               // Gửi mail tới mail người nhận
            //$mail->addReplyTo('ceo.vietpro@gmail.com', 'Information');
            // $mail->addCC('quantri.vietproshop@gmail.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Xác nhận đơn hàng từ LKGear';
            $mail->Body    = $str_body;
            $mail->AltBody = 'Mô tả đơn hàng';

            $mail->send();
            
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    
}
echo "<script>window.location.href = '/lkgear/admin/bill/index.php'</script>";
// echo "<script>window.location.href = '/admin/bill/index.php'</script>";
?>