<?php

  include("config.php");

  $product_name = $_POST["car_name"];
  $product_detail = $_POST["car_detail"];
  $product_price = $_POST["car_price"];
  $product_type = $_POST["car_type"];

  if (isset($_FILES['car_image']) && $_FILES['car_image']['error'] == 0){

    $product_image_tmp = $_FILES['car_image']['tmp_name']; // Temporary file path
    $product_image = $_FILES['car_image']['name']; // Original file name

    $ext = pathinfo($product_image, PATHINFO_EXTENSION); // Get the file extension .png/.jpeg
    $new_name = uniqid().".".$ext; // Create a new unique file name Ex. pic.jpg

    $path = "../assets/images/car_images/".$new_name; // Path to save the uploaded file Ex. assets/img/pic.jpg

    move_uploaded_file($product_image_tmp, $path); // Move the Tmp file path to the specified path Ex. tmp/pic.jpg to assets/img/pic.jpg

    $image_name = $new_name; // Set image name to save in Database (pic.jpg)

  }else{
    header("Location: ../admin/car.php?status=error&title=เพิ่มข้อมูลไม่สำเร็จ&msg=กรุณาใส่รูปภาพของรุ่นรถ");
  }

  $sql = "INSERT INTO product_tb (product_name, product_detail, product_price, product_img, product_type_id) VALUES ('$product_name', '$product_detail', '$product_price', '$image_name', '$product_type')";

  $query = $conn->query($sql);

  if($query) {
    header("Location: ../admin/car.php?status=success&title=เพิ่มข้อมูลสำเร็จ&msg=เพิ่มข้อมูลรุ่นรถเรียบร้อยแล้ว");
  }

?>