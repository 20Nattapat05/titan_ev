<?php

  include('config.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["id"];

    $sql = "DELETE FROM product_tb WHERE product_id = '$product_id'";
    $result = $conn->query($sql);
    if ($result) {
      header("Location: ../admin/car.php?status=success&title=ลบข้อมูลสำเร็จ&msg=ลบข้อมูลรุ่นรถเรียบร้อยแล้ว");
    } else {
      header("Location: ../admin/car.php?status=error&title=ลบข้อมูลไม่สำเร็จ&msg=เกิดข้อผิดพลาดในการลบข้อมูลรุ่นรถ");
    }
  }

?>