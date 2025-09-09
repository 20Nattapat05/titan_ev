<?php

include('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$title = $_POST['title'];
$detail = $_POST['detail'];

$sql = "INSERT INTO `email_tb`(`email_id`, `email_name`, `email_back`, `email_title`, `email_status`, `email_detail`, `email_datetime`) VALUES (NULL,'$name','$email','$title','unread','$detail',NOW())";

$query = $conn->query($sql);

if ($query) {
  header('Location: ../contact.php?status=success');
} else {
  header('Location: ../contact.php?status=error');
}
