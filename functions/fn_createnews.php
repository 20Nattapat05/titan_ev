<?php

  include('config.php');

  $title = $_POST['title'];
  $content = $_POST['detail'];
  $status = $_POST['status'];

  $sql = "INSERT INTO news_tb (news_title, news_detail, news_status, news_date) VALUES ('$title', '$content', '$status', NOW())";

  $query = $conn->query($sql);

  if ($query) {
    header('Location: ../admin/news.php?status=success&title=เพิ่มข่าวสารสำเร็จ&msg=คุณได้เพิ่มข่าวสารเรียบร้อยแล้ว');
  }

?>