<?php

  include("config.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_type_id = $_POST["id"];

    $sql = "DELETE FROM product_type_tb WHERE product_type_id = '$product_type_id'";

    $query = $conn->query($sql);

    if ($query) {
      header("Location: ../admin/car.php?status=success&title=ลบข้อมูลสำเร็จ&msg=ลบข้อมูลประเภทรถเรียบร้อยแล้ว");
    } else {
      header("Location: ../admin/car.php?status=error");
    }
  }

?>