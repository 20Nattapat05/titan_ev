<?php

 include 'config.php';

  $email_id = $_POST['email_id'];
  $sql = "DELETE FROM email_tb WHERE email_id = '$email_id'";
  $query = $conn->query($sql);
  
  if($query){
    header('Location: /titan_ev/admin/index.php?status=success&title=ลบข้อมูลสำเร็จ&msg=ลบข้อมูลอีเมล์เรียบร้อยแล้ว');
    exit();
  } else {
    header('Location: /titan_ev/admin/index.php?status=error&title=เกิดข้อผิดพลาด&msg=ไม่สามารถลบข้อมูลอีเมล์ได้ กรุณาลองใหม่อีกครั้ง');
    exit();
  }

?>