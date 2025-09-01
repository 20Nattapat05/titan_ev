<?php

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_id = $_POST["id"];
  $product_name = $_POST["car_name"];
  $product_detail = $_POST["car_detail"];
  $product_price = $_POST["car_price"];
  $product_type = $_POST["car_type"];

  if (isset($_FILES['car_image']) && $_FILES['car_image']['error'] == 0) {

    $product_image_tmp = $_FILES['car_image']['tmp_name']; // Temporary file path
    $product_image = $_FILES['car_image']['name']; // Original file name

    $ext = pathinfo($product_image, PATHINFO_EXTENSION); // Get the file extension .png/.jpeg
    $new_name = uniqid() . "." . $ext; // Create a new unique file name Ex. pic.jpg

    $path = "../assets/images/car_manage/" . $new_name; // Path to save the uploaded file Ex. assets/img/pic.jpg

    move_uploaded_file($product_image_tmp, $path); // Move the Tmp file path to the specified path Ex. tmp/pic.jpg to assets/img/pic.jpg

    $image_name = $new_name; // Set image name to save in Database (pic.jpg)

  } else {
    $image_name = null; // No new image uploaded
  }

  $sql = "UPDATE product_tb SET product_name = '$product_name', product_detail = '$product_detail', product_price = '$product_price', product_type_id = '$product_type'";
  
  if ($image_name) {
    $sql .= ", product_img = '$image_name'"; // Update image only if a new one was uploaded
  }
  
  $sql .= " WHERE product_id = '$product_id'";
  
  $query = $conn->query($sql);
  
  if ($query) {
    header("Location: ../admin/car.php?status=success&title=แก้ไขข้อมูลสำเร็จ&msg=แก้ไขข้อมูลรุ่นรถเรียบร้อยแล้ว");
  } else {
    header("Location: ../admin/car.php?status=error&title=แก้ไขข้อมูลไม่สำเร็จ&msg=เกิดข้อผิดพลาดในการแก้ไขข้อมูลรุ่นรถ");
  }

}

