<?php

    session_start();

    session_destroy();
    header('Location: /titan_ev/admin/login.php?status=logout');
    exit();

?>