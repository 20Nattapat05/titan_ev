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


        <?php
        // Defulat Varrible
        $search = "";
        $sort = "";

        // Form Method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $search = isset($_POST['search']) ? trim($_POST['search']) : "";
          $sort = isset($_POST['sort']) ? $_POST['sort'] : "";
        }

        // SQL Defualt
        $sql = "SELECT * FROM email_tb WHERE 1";

        // If have search
        if (!empty($search)) {
          $sql .= " AND (email_name LIKE '%$search%' OR email_title LIKE '%$search%' OR email_detail LIKE '%$search%' OR email_back LIKE '%$search%')";
        }


        // If have sort
        if (!empty($sort)) {
          $sql .= " AND email_status = '$sort'";
        }

        $query = $conn->query($sql);
        ?>

        <div class="card shadow-sm bg-dark mt-4 overflow-auto " style="height: 62vh;">
          <div class="card-body text-white">
            <form action="" method="post">
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
                      <option value="" <?= $sort == "" ? "selected" : "" ?>>ทั้งหมด</option>
                      <option value="unread" <?= $sort == "unread" ? "selected" : "" ?>>ยังไม่ได้อ่าน</option>
                      <option value="read" <?= $sort == "read" ? "selected" : "" ?>>อ่านแล้ว</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4 col-12 mt-md-0 mt-2">
                  <div class="input-group">
                    <input type="text" class="form-control search-bar" name="search" placeholder="ค้นหาข้อความ..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">
                      <i class="bi-search"></i>
                    </button>
                  </div>
                </div>

              </div>
            </form>

            <div class="container-fluid">
              <div class="row g-3">

                <?php


                if ($query->num_rows > 0) {
                  while ($row = $query->fetch_assoc()) {
                    $modalId = "messageModal" . $row['email_id']; // ให้ modal ไม่ซ้ำกัน
                ?>

                    <div class="col-12 col-md-12">
                      <div class="message-item <?= $row['email_status'] == "unread" ? "unread" : "read" ?> p-3 rounded"
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
                              <?php
                              if ($row['email_status'] == "unread") {
                                echo '<button class="btn btn-sm btn-outline-light">ตอบกลับ</button>';
                              }
                              ?>

                              <?php if ($row['email_status'] == "unread"): ?>
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

                    <form action="../functions/fn_submitread.php" method="post">
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
                              <?php
                              if ($row['email_status'] == "unread") {
                                echo '<button type="submit" class="btn btn-success" name="submit_read">📖 อ่านแล้ว</button>';
                              }
                              ?>

                              <input type="hidden" name="email_id" value="<?= $row['email_id'] ?>">
                              <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">ปิด</button>
                    </form>
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