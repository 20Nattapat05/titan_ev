<?php
include('config.php');

$news_id = $_POST['news_id'];
$title   = $_POST['news_title'];
$content = $_POST['news_detail'];
$status  = $_POST['news_status'];

$news_img = null;

// ถ้ามีการอัปโหลดรูปใหม่
if (!empty($_FILES["image"]["name"])) {
  $fileName_tmp = $_FILES["image"]["tmp_name"];
  $fileName     = $_FILES["image"]["name"];

  $ext      = pathinfo($fileName, PATHINFO_EXTENSION);
  $new_name = uniqid() . "." . $ext;                   
  $path     = "../assets/images/news_manage/" . $new_name;

  if (move_uploaded_file($fileName_tmp, $path)) {
    $news_img = $new_name;
  }
}

$sql = "UPDATE news_tb SET news_title = '$title', news_detail = '$content', news_status = '$status', news_img = '$news_img' WHERE news_id = '$news_id'";

$query = $conn->query($sql);

if ($query) {
  header('Location: ../admin/news.php?status=success&title=แก้ไขข่าวสารสำเร็จ&msg=คุณได้แก้ไขข่าวสารเรียบร้อยแล้ว');
  exit();
} else {
  header('Location: ../admin/news.php?status=error&title=เกิดข้อผิดพลาด&msg=ไม่สามารถแก้ไขข่าวสารได้ กรุณาลองใหม่อีกครั้ง');
  exit();
}

?>