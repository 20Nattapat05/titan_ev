<?php
// if ($_SESSION['admin_id'] == '') {
//     header('Location: login.php');
//     exit();
// }
?>

<!-- <div class="card shadow-sm bg-dark">
    <div class="card-body"> -->
<!-- Main Content Area -->
<!-- <div class="col my-1">
            <div class="container-fluid"> -->
<!-- Header -->
<!-- <div class="row">
                    <div class=" col-md-12 col-12">
                        <h2 class="text-light mb-1">Dashboard Overview</h2>
                        <p class="text-light">ภาพรวมระบบจัดการโรงงานรถยนต์ไฟฟ้า</p>
                    </div>
                    <div class="col-auto"> <span class="text-muted">อัปเดตล่าสุด: <span id="currentTime"></span></span> </div>
                </div> -->
<!-- Statistics Cards -->
<!-- <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card stat-card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3"> <i class="bi-car-front-fill text-primary fs-4"></i> </div>
                                    <div>
                                        <h5 class="card-title mb-1">จำนวนรุ่นรถ EV</h5>
                                        <h3 class="text-primary mb-0">24</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card stat-card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3"> <i class="bi-newspaper text-warning fs-4"></i> </div>
                                    <div>
                                        <h5 class="card-title mb-1">บทความทั้งหมด</h5>
                                        <h3 class="text-warning mb-0">12</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card stat-card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3"> <i class="bi-envelope-arrow-up-fill text-success fs-4"></i> </div>
                                    <div>
                                        <h5 class="card-title mb-1">ข้อความที่ยังไม่ได้อ่าน</h5>
                                        <h3 class="text-success mb-0">12</h3> <small class="text-success">+2 ข้อความวันนี้</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


<?php
if ($_SESSION['admin_id'] == '') {
    header('Location: login.php');
    exit();
}


// จำนวนรุ่นรถทั้งหมด
$sqlCars = "SELECT COUNT(*) AS totalCars FROM product_tb";
$resCars = $conn->query($sqlCars);
$totalCars = ($row = $resCars->fetch_assoc()) ? $row['totalCars'] : 0;

// จำนวนบทความทั้งหมด
$sqlArticles = "SELECT COUNT(*) AS totalArticles FROM news_tb";
$resArticles = $conn->query($sqlArticles);
$totalArticles = ($row = $resArticles->fetch_assoc()) ? $row['totalArticles'] : 0;

// จำนวนข้อความ unread (ต้องมีคอลัมน์ email_status หรือ email_status ก่อนนะครับ)
$sqlMessages = "SELECT COUNT(*) AS unreadMessages FROM email_tb WHERE email_status = 'unread'";
$resMessages = $conn->query($sqlMessages);
$unreadMessages = ($row = $resMessages->fetch_assoc()) ? $row['unreadMessages'] : 0;
?>

<div class="card shadow-sm bg-dark">
    <div class="card-body"> <!-- Main Content Area -->
        <div class="col my-1">
            <div class="container-fluid"> <!-- Header -->
                <div class="row">
                    <div class=" col-md-12 col-12">
                        <h2 class="text-light mb-1">Dashboard Overview</h2>
                        <p class="text-light">ภาพรวมระบบจัดการโรงงานรถยนต์ไฟฟ้า</p>
                    </div>
                    <div class="col-auto"> <span class="text-light">อัปเดตล่าสุด: <span id="currentTime"></span></span> </div>
                </div> <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card stat-card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3"> <i class="bi-car-front-fill text-primary fs-4"></i> </div>
                                    <div>
                                        <h5 class="card-title mb-1">จำนวนรุ่นรถ EV</h5>
                                        <h3 class="text-primary mb-2 mt-2"><?= $totalCars ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card stat-card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3"> <i class="bi-newspaper text-warning fs-4"></i> </div>
                                    <div>
                                        <h5 class="card-title mb-1">บทความทั้งหมด</h5>
                                        <h3 class="text-warning mb-2 mt-2"><?= $totalArticles ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card stat-card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3"> <i class="bi-envelope-arrow-up-fill text-success fs-4"></i> </div>
                                    <div>
                                        <h5 class="card-title mb-1">ข้อความที่ยังไม่ได้อ่าน</h5>
                                        <h3 class="text-success mb-2 mt-2"><?= $unreadMessages ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>