<?php

include('../functions/config.php');

if (isset($_POST['submit_read'])) {

    $email_id = $_POST['email_id'];
    $sql = "UPDATE email_tb SET email_status = 'read' WHERE email_id = '$email_id'";

    $query = $conn->query($sql);

    header('Location: /titan_ev/admin/index.php?status=success&title=อัพเดทสถานะสำเร็จ&msg=เปลี่ยนสถานะอีเมล์เป็นอ่านแล้วเรียบร้อย');

}else{
    echo "No Data";
}

?>