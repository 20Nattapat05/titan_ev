<?php

    session_start();

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $data = 'titan_db';

    $conn = mysqli_connect($host, $user, $pass, $data);
    $conn->set_charset('utf8');

    date_default_timezone_set('Asia/bangkok');
    $date = date('Y-m-d');
    $time = date('H:i:s');

    if(!$conn){
        echo "No connect";
    }

?>