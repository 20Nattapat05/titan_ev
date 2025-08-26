<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include('../include/header_admin.php');
  ?>
  <title>Home</title>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark d-md-none mobile-navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../assets/images/logo.png" alt="Logo" width="30" height="30">
        EV Factory
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mobileMenu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Inbox</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="car.php">รุ่นรถ EV</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="news.php">ข่าวสาร</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row flex-nowrap">
      <!-- Desktop Sidebar -->
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark d-none d-md-block sidebar">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
          <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none mt-3">
            <img src="../assets/images/logo.png" alt="Logo" width="40" height="40">
            <span class="fs-5 d-none d-sm-inline ms-2">EV Factory Admin</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start gap-3">
            <li><a href="index.php" class="nav-link text-light align-middle px-2 active"><i class="fs-4  bi-envelope-fill"></i><span class="ms-1 d-none d-sm-inline">Inbox</span></a></li>
            <li><a href="car.php" class="nav-link text-light align-middle px-2"><i class="fs-4 bi-car-front-fill"></i><span class="ms-1 d-none d-sm-inline">รุ่นรถ EV</span></a></li>
            <li><a href="news.php" class="nav-link text-light align-middle px-2"><i class="fs-4 bi-newspaper"></i><span class="ms-1 d-none d-sm-inline">ข่าวสาร</span></a></li>
          </ul>
        </div>
      </div>




      <div class="container-fluid col py-3">
        <div class="card shadow-sm bg-dark">
          <div class="card-body">
            <!-- Main Content Area -->
            <div class="col my-1">
              <div class="container-fluid">

                <!-- Header -->
                <div class="row">
                  <div class=" col-md-12 col-12">
                    <h2 class="text-light mb-1">Dashboard Overview</h2>
                    <p class="text-light">ภาพรวมระบบจัดการโรงงานรถยนต์ไฟฟ้า</p>
                  </div>
                  <div class="col-auto">
                    <span class="text-muted">อัปเดตล่าสุด: <span id="currentTime"></span></span>
                  </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">

                  <div class="col-md-4 mb-3">
                    <div class="card stat-card border-0 shadow-sm h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                            <i class="bi-car-front-fill text-primary fs-4"></i>
                          </div>
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
                          <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                            <i class="bi-newspaper text-warning fs-4"></i>
                          </div>
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
                          <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                            <i class="bi-envelope-arrow-up-fill text-success fs-4"></i>
                          </div>
                          <div>
                            <h5 class="card-title mb-1">ข้อความที่ยังไม่ได้อ่าน</h5>
                            <h3 class="text-success mb-0">12</h3>
                            <small class="text-success">+2 ข้อความวันนี้</small>
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
        <div class="card shadow-sm bg-dark mt-4" style="height: 60vh;">
          <div class="card-body overflow-auto text-white">
            <div class="row mb-4">
              <div class="col-md-4 col-12">
                <h2 class="text-light mb-1">
                  <i class="bi-envelope-fill me-2"></i>Inbox
                </h2>
                <p class="text-light">ข้อความที่ยังไม่ได้อ่าน (12 ข้อความ)</p>
              </div>
              <div class="col-md-4 col-12 ">
                <div class="input-group">
                  <select name="sort" class="form-select" id="">
                    <option value="">All</option>
                    <option value="read">อ่านแล้ว</option>
                    <option value="unread">ยังไม่ได้อ่าน</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-12 mt-md-0 mt-2">
                <div class="input-group">
                  <input type="text" class="form-control search-bar" placeholder="ค้นหาข้อความ..." aria-label="Search">
                  <button class="btn btn-outline-light" type="button">
                    <i class="bi-search"></i>
                  </button>
                </div>
              </div>
            </div>

            <div class="container-fluid">
              <div class="row g-3">

                <div class="col-12 col-md-12">
                  <div class="message-item unread p-3 rounded "
                    data-bs-toggle="modal"
                    data-bs-target="#messageModal1">
                    <div class="d-flex flex-column flex-sm-row">
                      <div class="message-avatar me-0 me-sm-3 mb-2 mb-sm-0 text-center">
                        <i class="bi-person-fill fs-2"></i>
                      </div>
                      <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start mb-2 flex-wrap">
                          <div>
                            <h6 class="mb-1 text-light">สมชาย ใจดี</h6>
                            <span class="badge bg-primary">ข้อความใหม่</span>
                          </div>
                          <div class="text-end small text-muted">
                            <div class="message-time">14:25</div>
                            <i class="bi-circle-fill text-success" style="font-size: 8px;"></i>
                          </div>
                        </div>
                        <h6 class="text-light mb-1">สอบถามข้อมูลรถยนต์ EV รุ่นใหม่</h6>
                        <p class="text-secondary mb-2">สวัสดีครับ ผมสนใจรถยนต์ไฟฟ้ารุ่นใหม่ที่ออกมา อยากทราบรายละเอียดเพิ่มเติมและราคา...</p>
                        <div class="d-flex gap-2 flex-wrap">
                          <button class="btn btn-sm btn-outline-light">ตอบกลับ</button>
                          <button class="btn btn-sm btn-outline-success">ยังไม่ได้อ่าน</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="messageModal1" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content bg-dark text-light">

                      <!-- Header -->
                      <div class="modal-header">
                        <h5 class="modal-title">รายละเอียดข้อความ</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                      </div>

                      <!-- Body -->
                      <div class="modal-body overflow-auto" style="max-height: 60vh;">
                        <!-- ข้อมูลผู้ติดต่อ -->
                        <h6 class="mb-1">สมชาย ใจดี</h6>
                        <small class="text-secondary">อีเมล: somchai@example.com</small><br>
                        <small class="text-secondary">เวลา: 14:25</small>
                        <hr>

                        <!-- เนื้อหาข้อความ -->
                        <h6>หัวข้อ: สอบถามข้อมูลรถยนต์ EV รุ่นใหม่</h6>
                        <p>
                          สวัสดีครับ ผมสนใจรถยนต์ไฟฟ้ารุ่นใหม่ที่ออกมา
                          อยากทราบรายละเอียดเพิ่มเติมและราคา
                          รบกวนส่งข้อมูลให้ด้วยครับ ขอบคุณครับ
                        </p>
                      </div>

                      <!-- Footer -->
                      <div class="modal-footer">
                        <button class="btn btn-success" id="markAsReadBtn">📖 อ่านแล้ว</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-12 col-md-12">
                  <div class="message-item read p-3 rounded ">
                    <div class="d-flex flex-column flex-sm-row">
                      <div class="message-avatar me-0 me-sm-3 mb-2 mb-sm-0 text-center">
                        <i class="bi-person-fill fs-2"></i>
                      </div>
                      <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start mb-2 flex-wrap">
                          <div>
                            <h6 class="mb-1 text-light">สมชาย ใจดี</h6>
                            <span class="badge bg-primary">ข้อความใหม่</span>
                          </div>
                          <div class="text-end small text-muted">
                            <div class="message-time">14:25</div>
                          </div>
                        </div>
                        <h6 class="text-light mb-1">สอบถามข้อมูลรถยนต์ EV รุ่นใหม่</h6>
                        <p class="text-secondary mb-2">สวัสดีครับ ผมสนใจรถยนต์ไฟฟ้ารุ่นใหม่ที่ออกมา อยากทราบรายละเอียดเพิ่มเติมและราคา...</p>
                        <div class="d-flex gap-2 flex-wrap">
                          <button class="btn btn-sm btn-outline-light">ตอบกลับ</button>
                          <button class="btn btn-sm btn-outline-secondary">อ่านแล้ว</button>
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

    </div>
  </div>



  <?php
  include('../include/footer_admin.php');
  ?>
</body>

</html>