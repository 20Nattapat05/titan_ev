<?php
include('config.php');

// รับค่าจากฟอร์ม
$title   = $_POST['title'];
$content = $_POST['detail'];
$status  = $_POST['status'];

$news_img = null; 

if (!empty($_FILES["image"]["name"])) {
    $fileName_tmp = ($_FILES["image"]["tmp_name"]);
    $fileName = ($_FILES["image"]["name"]);

    $ext = pathinfo($fileName, PATHINFO_EXTENSION); // ดึงนามสกุลไฟล์
    $new_name = uniqid() . "." . $ext; // สร้างชื่อไฟล์ใหม่เพื่อป้องกันชื่อซ้ำ

    $path = "../assets/images/news_manage/".$new_name;

    // ย้ายไฟล์ไปยังโฟลเดอร์เป้าหมาย
    if (move_uploaded_file($fileName_tmp, $path)) {
        // เก็บ path ลงใน DB โดยตรง
        $news_img = $new_name;
    }
}

// ✅ Insert ลงฐานข้อมูล
$sql = "INSERT INTO news_tb (news_title, news_detail, news_status, news_date, news_img) 
        VALUES ('$title', '$content', '$status', NOW(), '$news_img')";

$query = $conn->query($sql);

if ($query) {
    header('Location: ../admin/news.php?status=success&title=เพิ่มข่าวสารสำเร็จ&msg=คุณได้เพิ่มข่าวสารเรียบร้อยแล้ว');
    exit();
} else {
    header('Location: ../admin/news.php?status=error&title=ผิดพลาด&msg=ไม่สามารถเพิ่มข่าวสารได้');
    exit();
}
?>
