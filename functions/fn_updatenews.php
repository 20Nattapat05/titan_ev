<?php

  include('config.php');

  $news_id = $_POST['news_id'];
  $title = $_POST['news_title'];
  $content = $_POST['news_detail'];
  $status = $_POST['news_status'];

  $sql = "UPDATE news_tb SET news_title='$title', news_detail='$content', news_status='$status' WHERE news_id='$news_id'";

  $query = $conn->query($sql);

  if ($query) {
    header('Location: ../admin/news.php?status=success&title=แก้ไขข่าวสารสำเร็จ&msg=คุณได้แก้ไขข่าวสารเรียบร้อยแล้ว');
  }else{
    header('Location: ../admin/news.php?status=error&title=เกิดข้อผิดพลาด&msg=ไม่สามารถแก้ไขข่าวสารได้ กรุณาลองใหม่อีกครั้ง');
  }

?>