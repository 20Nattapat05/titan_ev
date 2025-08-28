<?php

    include 'config.php';

    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $sql = "SELECT * FROM admin_tb WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
    $query = $conn->query($sql);

    if($query->num_rows == 1){
        $row = $query->fetch_array();
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_fname'] = $row['admin_fname'];
        $_SESSION['admin_lname'] = $row['admin_lname'];
        $_SESSION['admin_email'] = $row['admin_email'];
        $_SESSION['admin_username'] = $row['admin_username'];
        $_SESSION['admin_password'] = $row['admin_password'];

        header('Location: /titan_ev/admin/');
        exit();

    } else {
        header('Location: /titan_ev/admin/login.php?status=error');
        exit();
    }

?>