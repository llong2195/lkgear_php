<?php
require_once(__DIR__ . '/../../lib/autoload.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

  if (isset($_GET["billID"])) {
    $billID = $_GET['billID'];
    $sql_bill = "SELECT * FROM bill WHERE id = $billID ";
    $bill = $db->fetchOne($sql_bill);

    $sql_prdbill = "SELECT billinfor.*, prdchill.name as `prdchillName`, product.name as `productName` FROM billinfor, prdchill, product WHERE billinfor.prdChillID = prdchill.id and prdchill.prdid = product.id and billID=$billID ";
    $prdbill = $db->fetchAll($sql_prdbill);

    // filename for download
    $filename = "lkgear_data_" . date('Ymd') . ".xls";

    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;
    $prdbill = $db->fetchAll($sql_prdbill);
    
  }
}




?>

<table style="width:100%" border="1" style="border-collapse: collapse;">
  <thead>
    <tr>
      <th>STT</th>
      <th>Ten San Pham</th>
      <th>So Luong</th>
      <th>Gia Sale</th>
      <th>Thanh Tien</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sn = 1;
    foreach($prdbill as $item) {
    ?>
      <tr>
        <td><?php echo $sn; ?></td>
        <td><?php echo $item['prdchillName']; ?> </td>
        <td><?php echo $item['qty']; ?> </td>
        <td><?php echo $item['priceSale']; ?> </td>
        <td><?php echo $item['total']; ?> </td>
      </tr>
    <?php
      $sn++;
    }
    ?>
  </tbody>
</table>