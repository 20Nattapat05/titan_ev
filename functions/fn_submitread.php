<?php

include('../functions/config.php');

if (isset($_POST['submit_read'])) {

    $email_id = $_POST['email_id'];
    $sql = "UPDATE email_tb SET email_status = 'read' WHERE email_id = '$email_id'";

    $query = $conn->query($sql);

    echo "
      <script>
        alert('ทำเครื่องหมายว่าอ่านแล้ว');
        window.location.href = '../admin/index.php';
      </script>
    ";

}else{
    echo "No Data";
}

?>