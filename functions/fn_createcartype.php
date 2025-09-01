<?php

  include("config.php");

  $car_type_name = $_POST["type_name"];
  $car_type_detail = $_POST["type_detail"];

  $sql_check = "SELECT * FROM product_type_tb WHERE product_type_name = '$car_type_name'";
  $query_check = $conn->query($sql_check);
  $num_check = $query_check->num_rows;

  if($num_check > 0) {
    header("Location: ../admin/car.php?status=error&title=เพิ่มข้อมูลไม่สำเร็จ&msg=มีข้อมูลประเภทของรุ่นรถนี้อยู่ในระบบแล้ว");
    exit();
  }

  $sql = "INSERT INTO product_type_tb (product_type_name, product_type_detail) VALUES ('$car_type_name', '$car_type_detail')";

  $query = $conn->query($sql);

  if($query) {
    header("Location: ../admin/car.php?status=success&title=เพิ่มข้อมูลสำเร็จ&msg=เพิ่มข้อมูลประเภทรถเรียบร้อยแล้ว");
  } else {
    header("Location: ../admin/car.php?status=error");
  }
?>