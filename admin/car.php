<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include('../include/header_admin.php');
  ?>
  <title>Dashboard</title>
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
            <a class="nav-link " href="index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="car.php">รุ่นรถ EV</a>
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
            <li><a href="index.php" class="nav-link text-light align-middle px-2 "><i class="fs-4 bi-speedometer2"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span></a></li>
            <li><a href="car.php" class="nav-link text-light align-middle px-2 active"><i class="fs-4 bi-car-front-fill"></i><span class="ms-1 d-none d-sm-inline">รุ่นรถ EV</span></a></li>
            <li><a href="news.php" class="nav-link text-light align-middle px-2"><i class="fs-4 bi-newspaper"></i><span class="ms-1 d-none d-sm-inline">ข่าวสาร</span></a></li>
          </ul>
        </div>
      </div>


      <div class="container-fluid col py-3">
        <div class="card shadow-sm bg-dark ">
          <div class="card-body overflow-auto" style="height: 96vh;">
            <!-- Main Content Area -->
            <div class="col my-3">
              <div class="container-fluid">

                <!-- Header -->
                <div class="row mb-4">
                  <div class="col">
                    <h2 class="text-light mb-1">Dashboard Overview</h2>
                    <p class="text-light">ภาพรวมระบบจัดการโรงงานรถยนต์ไฟฟ้า</p>
                  </div>
                  <div class="col-auto">
                    <span class="text-muted">อัปเดตล่าสุด: <span id="currentTime"></span></span>
                  </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                  <div class="col-md-3 mb-3">
                    <div class="card stat-card border-0 shadow-sm h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                            <i class="bi-car-front-fill text-primary fs-4"></i>
                          </div>
                          <div>
                            <h5 class="card-title mb-1">รุ่นรถ EV</h5>
                            <h3 class="text-primary mb-0">24</h3>
                            <small class="text-success">+2 รุ่นใหม่</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="card stat-card border-0 shadow-sm h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                            <i class="bi-speedometer2 text-success fs-4"></i>
                          </div>
                          <div>
                            <h5 class="card-title mb-1">ยอดขายเดือนนี้</h5>
                            <h3 class="text-success mb-0">1,547</h3>
                            <small class="text-success">+15.3%</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="card stat-card border-0 shadow-sm h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                            <i class="bi-newspaper text-warning fs-4"></i>
                          </div>
                          <div>
                            <h5 class="card-title mb-1">ข่าวสารใหม่</h5>
                            <h3 class="text-warning mb-0">12</h3>
                            <small class="text-muted">ข่าวใหม่วันนี้</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="card stat-card border-0 shadow-sm h-100">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="rounded-circle bg-info bg-opacity-10 p-3 me-3">
                            <i class="bi-people text-info fs-4"></i>
                          </div>
                          <div>
                            <h5 class="card-title mb-1">ผู้เข้าชมเว็บ</h5>
                            <h3 class="text-info mb-0">8,432</h3>
                            <small class="text-success">+8.2%</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Data Tables Section -->
                <div class="row mb-4">
                  <div class="col-lg-8 mb-3">
                    <div class="card border-0 shadow-sm h-100">
                      <div class="card-header bg-white border-0">
                        <h5 class="card-title mb-0">ยอดขายรายเดือน</h5>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead class="table-light">
                              <tr>
                                <th>เดือน</th>
                                <th>ยอดขาย (คัน)</th>
                                <th>เป้าหมาย</th>
                                <th>สถานะ</th>
                                <th>เปอร์เซ็นต์</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>มกราคม</td>
                                <td>1,200</td>
                                <td>1,000</td>
                                <td><span class="badge bg-success">เกินเป้า</span></td>
                                <td>
                                  <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 120%">120%</div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>กุมภาพันธ์</td>
                                <td>1,350</td>
                                <td>1,100</td>
                                <td><span class="badge bg-success">เกินเป้า</span></td>
                                <td>
                                  <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 123%">123%</div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>มีนาคม</td>
                                <td>1,100</td>
                                <td>1,200</td>
                                <td><span class="badge bg-warning">ต่ำกว่าเป้า</span></td>
                                <td>
                                  <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-warning" style="width: 92%">92%</div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>เมษายน</td>
                                <td>1,400</td>
                                <td>1,300</td>
                                <td><span class="badge bg-success">เกินเป้า</span></td>
                                <td>
                                  <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 108%">108%</div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>พฤษภาคม</td>
                                <td>1,250</td>
                                <td>1,200</td>
                                <td><span class="badge bg-success">เกินเป้า</span></td>
                                <td>
                                  <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 104%">104%</div>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-active">
                                <td><strong>มิถุนายน</strong></td>
                                <td><strong>1,547</strong></td>
                                <td><strong>1,400</strong></td>
                                <td><span class="badge bg-primary">เดือนปัจจุบัน</span></td>
                                <td>
                                  <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-primary" style="width: 110%">110%</div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4 mb-3">
                    <div class="card border-0 shadow-sm h-100">
                      <div class="card-header bg-white border-0">
                        <h5 class="card-title mb-0">รุ่นรถยอดนิยม</h5>
                      </div>
                      <div class="card-body">
                        <div class="d-flex flex-column gap-3">
                          <div class="d-flex align-items-center p-3 bg-light rounded">
                            <div class="me-3">
                              <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <strong>1</strong>
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1">EV Compact 2024</h6>
                              <div class="d-flex justify-content-between">
                                <small class="text-muted">542 คัน</small>
                                <small class="text-primary font-weight-bold">35%</small>
                              </div>
                              <div class="progress mt-1" style="height: 6px;">
                                <div class="progress-bar bg-primary" style="width: 35%"></div>
                              </div>
                            </div>
                          </div>

                          <div class="d-flex align-items-center p-3 bg-light rounded">
                            <div class="me-3">
                              <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <strong>2</strong>
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1">EV SUV Premium</h6>
                              <div class="d-flex justify-content-between">
                                <small class="text-muted">433 คัน</small>
                                <small class="text-success font-weight-bold">28%</small>
                              </div>
                              <div class="progress mt-1" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: 28%"></div>
                              </div>
                            </div>
                          </div>

                          <div class="d-flex align-items-center p-3 bg-light rounded">
                            <div class="me-3">
                              <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <strong>3</strong>
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1">EV Luxury Sedan</h6>
                              <div class="d-flex justify-content-between">
                                <small class="text-muted">340 คัน</small>
                                <small class="text-warning font-weight-bold">22%</small>
                              </div>
                              <div class="progress mt-1" style="height: 6px;">
                                <div class="progress-bar bg-warning" style="width: 22%"></div>
                              </div>
                            </div>
                          </div>

                          <div class="d-flex align-items-center p-3 bg-light rounded">
                            <div class="me-3">
                              <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <strong>4</strong>
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1">EV Sport Coupe</h6>
                              <div class="d-flex justify-content-between">
                                <small class="text-muted">232 คัน</small>
                                <small class="text-danger font-weight-bold">15%</small>
                              </div>
                              <div class="progress mt-1" style="height: 6px;">
                                <div class="progress-bar bg-danger" style="width: 15%"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Recent Activity & Quick Actions -->
                <div class="row">
                  <div class="col-lg-8 mb-3">
                    <div class="card border-0 shadow-sm h-100">
                      <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">กิจกรรมล่าสุด</h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">ดูทั้งหมด</a>
                      </div>
                      <div class="card-body p-0">
                        <div class="recent-activity">
                          <div class="activity-item p-3 border-bottom">
                            <div class="d-flex">
                              <div class="me-3">
                                <div class="rounded-circle bg-success bg-opacity-10 p-2">
                                  <i class="bi-plus-circle text-success"></i>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h6 class="mb-1">เพิ่มรุ่นรถใหม่ "EV Model X"</h6>
                                <p class="mb-1 text-muted">เพิ่มรุ่นรถยนต์ไฟฟ้ารุ่นใหม่พร้อมรูปภาพและรายละเอียด</p>
                                <small class="text-muted">5 นาทีที่แล้ว</small>
                              </div>
                            </div>
                          </div>

                          <div class="activity-item p-3 border-bottom">
                            <div class="d-flex">
                              <div class="me-3">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-2">
                                  <i class="bi-newspaper text-primary"></i>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h6 class="mb-1">เผยแพร่ข่าวสาร</h6>
                                <p class="mb-1 text-muted">ข่าว "เทคโนโลยีแบตเตอรี่ใหม่" ได้รับการเผยแพร่</p>
                                <small class="text-muted">15 นาทีที่แล้ว</small>
                              </div>
                            </div>
                          </div>

                          <div class="activity-item p-3 border-bottom">
                            <div class="d-flex">
                              <div class="me-3">
                                <div class="rounded-circle bg-warning bg-opacity-10 p-2">
                                  <i class="bi-pencil text-warning"></i>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h6 class="mb-1">แก้ไขข้อมูลรถ</h6>
                                <p class="mb-1 text-muted">อัปเดตราคาและสเปคของ "EV Compact 2024"</p>
                                <small class="text-muted">1 ชั่วโมงที่แล้ว</small>
                              </div>
                            </div>
                          </div>

                          <div class="activity-item p-3">
                            <div class="d-flex">
                              <div class="me-3">
                                <div class="rounded-circle bg-info bg-opacity-10 p-2">
                                  <i class="bi-graph-up text-info"></i>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h6 class="mb-1">รายงานประจำสัปดาห์</h6>
                                <p class="mb-1 text-muted">สร้างรายงานยอดขายประจำสัปดาห์สำเร็จ</p>
                                <small class="text-muted">2 ชั่วโมงที่แล้ว</small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4 mb-3">
                    <div class="card border-0 shadow-sm h-100">
                      <div class="card-header bg-white border-0">
                        <h5 class="card-title mb-0">การดำเนินการด่วน</h5>
                      </div>
                      <div class="card-body">
                        <div class="d-grid gap-3">
                          <a href="car.php" class="btn btn-primary">
                            <i class="bi-plus-circle me-2"></i>เพิ่มรุ่นรถใหม่
                          </a>
                          <a href="news.php" class="btn btn-success">
                            <i class="bi-newspaper me-2"></i>เขียนข่าวสาร
                          </a>
                          <button class="btn btn-info" onclick="generateReport()">
                            <i class="bi-file-earmark-text me-2"></i>สร้างรายงาน
                          </button>
                          <button class="btn btn-warning" onclick="viewAnalytics()">
                            <i class="bi-graph-up me-2"></i>ดูสถิติ
                          </button>
                        </div>

                        <hr class="my-3">

                        <h6 class="mb-3">สถานะระบบ</h6>
                        <div class="mb-2">
                          <div class="d-flex justify-content-between mb-1">
                            <small>เซิร์ฟเวอร์</small>
                            <small class="text-success">ออนไลน์</small>
                          </div>
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                          </div>
                        </div>

                        <div class="mb-2">
                          <div class="d-flex justify-content-between mb-1">
                            <small>ฐานข้อมูล</small>
                            <small class="text-success">ปกติ</small>
                          </div>
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-success" style="width: 95%"></div>
                          </div>
                        </div>

                        <div class="mb-2">
                          <div class="d-flex justify-content-between mb-1">
                            <small>พื้นที่จัดเก็บ</small>
                            <small class="text-warning">75%</small>
                          </div>
                          <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-warning" style="width: 75%"></div>
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
  </div>



  <?php
  include('../include/footer_admin.php');
  ?>
</body>

</html>