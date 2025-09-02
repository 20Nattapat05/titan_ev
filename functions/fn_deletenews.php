<?php

  include('config.php');

  $news_id = $_POST['news_id'];

  $sql = "DELETE FROM news_tb WHERE news_id='$news_id'";

  $query = $conn->query($sql);

  if ($query) {
    header('Location: ../admin/news.php?status=success&title=ลบข่าวสารสำเร็จ&msg=คุณได้ลบข่าวสารเรียบร้อยแล้ว');
  }else{
    header('Location: ../admin/news.php?status=error&title=เกิดข้อผิดพลาด&msg=ไม่สามารถลบข่าวสารได้ กรุณาลองใหม่อีกครั้ง');
  }

?>