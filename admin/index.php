<?php
include('../functions/config.php');
if (!isset($_SESSION['admin_login'])) {
  header('location: login.php');
}
?>
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

  <?php
  // Responsive Sidebar
  include('../include/sidebar_res_admin.php');


  ?>

  <div class="container-fluid">
    <div class="row flex-nowrap">


      <?php
      // Desktop Sidebar
      include('../include/sidebar_admin.php');
      ?>


      <div class="container-fluid col py-3">


        <?php
        // Navbar and Overview Cards
        include('../include/navbar_admin.php');
        ?>


        <div class="card shadow-sm bg-dark mt-4 overflow-auto " style="height: 60vh;">
          <div class="card-body text-white">
            <div class="row mb-4">
              <div class="col-md-4 col-12">
                <h2 class="text-light mb-1">
                  <i class="bi-envelope-fill me-2"></i>Inbox
                </h2>
                <p class="text-light">ข้อความที่ยังไม่ได้อ่าน (<?= $unreadMessages ?>)</p>
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

                <?php
                $sql = "SELECT * FROM email_tb";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                  while ($row = $query->fetch_assoc()) {
                    $modalId = "messageModal" . $row['email_id']; // ให้ modal ไม่ซ้ำกัน
                ?>

                    <div class="col-12 col-md-12">
                      <div class="message-item unread p-3 rounded"
                        data-bs-toggle="modal"
                        data-bs-target="#<?= $modalId ?>">
                        <div class="d-flex flex-column flex-sm-row">
                          <div class="message-avatar me-0 me-sm-3 mb-2 mb-sm-0 text-center">
                            <i class="bi-person-fill fs-2"></i>
                          </div>
                          <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start mb-2 flex-wrap">
                              <div>
                                <h6 class="mb-1 text-light"><?= htmlspecialchars($row['email_name']) ?></h6>
                                <small class="text-secondary"><?= htmlspecialchars($row['email_back']) ?></small>
                              </div>
                              <div class="text-end small">
                                <div class="message-time">
                                  <?= date("H:i", strtotime($row['email_datetime'])) ?>
                                </div>
                                <i class="bi-circle-fill text-success" style="font-size: 8px;"></i>
                              </div>
                            </div>
                            <h6 class="text-light mb-1"><?= htmlspecialchars($row['email_title']) ?></h6>
                            <p class="text-secondary mb-2">
                              <?= mb_strimwidth($row['email_detail'], 0, 80, "...") ?>
                            </p>
                            <div class="d-flex gap-2 flex-wrap">
                              <button class="btn btn-sm btn-outline-light">ตอบกลับ</button>
                              <?php if ($row['is_read'] == 0): ?>
                                <button class="btn btn-sm btn-outline-success">ยังไม่ได้อ่าน</button>
                              <?php else: ?>
                                <button class="btn btn-sm btn-outline-secondary">อ่านแล้ว</button>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-hidden="true">
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
                            <h6 class="mb-1"><?= htmlspecialchars($row['email_name']) ?></h6>
                            <small class="text-secondary">อีเมล: <?= htmlspecialchars($row['email_back']) ?></small><br>
                            <small class="text-secondary">เวลา: <?= date("d/m/Y H:i", strtotime($row['email_datetime'])) ?></small>
                            <hr>

                            <!-- เนื้อหาข้อความ -->
                            <h6>หัวข้อ: <?= htmlspecialchars($row['email_title']) ?></h6>
                            <p><?= nl2br(htmlspecialchars($row['email_detail'])) ?></p>
                          </div>

                          <!-- Footer -->
                          <div class="modal-footer">
                            <button class="btn btn-success" id="markAsReadBtn" data-id="<?= $row['email_id'] ?>">📖 อ่านแล้ว</button>
                            <button class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                          </div>
                        </div>
                      </div>
                    </div>

                <?php
                  }
                }
                ?>


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