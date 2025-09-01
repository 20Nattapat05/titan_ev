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
  <title>Car manage</title>
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


        <div class="card shadow-sm bg-dark mt-4 overflow-auto" style="height: 62vh;">
          <!-- ส่วนหัว -->
          <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center">
            <div>
              <h4 class="text-light mb-1"><i class="bi bi-car-front-fill me-2"></i>รถ EV</h4>
              <p class="text-light mb-0">รถทั้งหมดของโรงงาน</p>
            </div>
            <div class="mt-2 mt-md-0">
              <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#manageCarTypeModal">
                <i class="bi bi-plus-circle me-1"></i> เพิ่มประเภทของรถ
              </button>
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCarModal">
                <i class="bi bi-plus-circle me-1"></i> เพิ่มรถ
              </button>
            </div>
          </div>

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
          $sql = "SELECT * FROM product_tb WHERE 1";

          // If have search
          if (!empty($search)) {
            $sql .= " AND (product_name LIKE '%$search%' OR product_detail LIKE '%$search%' OR product_price LIKE '%$search%')";
          }

          // If have sort
          if (!empty($sort)) {
            $sql .= " AND product_type_id = '$sort'";
          }

          $query = $conn->query($sql);

          ?>

          <!-- ส่วนค้นหาและกรอง -->
          <form action="" method="post">

            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3 col-12 mb-2 mb-md-0">
                  <select class="form-select" name="sort">
                    <option value="">รถทั้งหมด</option>

                    <?php
                    $sql_type = "SELECT * FROM product_type_tb";
                    $query_type = $conn->query($sql_type);
                    if ($query_type->num_rows > 0) {
                      while ($row_type = $query_type->fetch_assoc()) {

                    ?>
                        <option value="<?= $row_type['product_type_id'] ?>" <?= $sort == $row_type['product_type_id'] ? 'selected' : '' ?>>
                          <?= $row_type['product_type_name'] ?>
                        </option>


                    <?php
                      }
                    }
                    ?>

                  </select>
                </div>
                <div class="col-md-6 col-12">
                  <div class="input-group">
                    <input type="text" class="form-control shadow-sm" placeholder="ค้นหารถ..." name="search">
                    <button class="btn btn-outline-light" type="submit">
                      <i class="bi bi-search"></i>
                    </button>
                  </div>
                </div>
              </div>

          </form>

          <hr>

          <!-- แสดงการ์ดรถ -->
          <div class="row g-3">

            <?php
            if ($query->num_rows > 0) {
              while ($row = $query->fetch_assoc()) {
                $modalId = "editCarModal" . $row['product_id'];
            ?>

                <div class="col-md-4 col-sm-6 col-12">
                  <div class="card car-card shadow-sm border-0 rounded-3 h-100">
                    <img src="../assets/images/car_manage/<?= $row['product_img'] ?>" class="card-img-top" alt="Model S">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title fw-bold text-dark"><?= htmlspecialchars($row['product_name']) ?></h5>
                      <p class="card-text text-secondary mb-1">ราคา: <?= htmlspecialchars($row['product_price']) ?></p>
                      <?php
                      $sql_type_show = "SELECT * FROM product_type_tb WHERE product_type_id = '" . $row['product_type_id'] . "'";
                      $query_type_show = $conn->query($sql_type_show);
                      $row_type_show = $query_type_show->fetch_assoc();
                      ?>
                      <p class="card-text text-secondary mb-1">ประเภทรถ: <?= htmlspecialchars($row_type_show['product_type_name']) ?></p>
                      <p class="card-text text-secondary flex-grow-1"><?= mb_strimwidth($row['product_detail'], 0, 80, "...") ?></p>
                      <div class="d-flex justify-content-between">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $modalId; ?>" type="button">
                          <i class="bi bi-pencil-square"></i> แก้ไข
                        </button>
                        <form action="../functions/fn_deletecar.php" method="post">
                          <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                          <button class="btn btn-sm btn-danger" type="submit">
                            <i class="bi bi-trash"></i> ลบ
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- Modal แก้ไขรุ่นรถ -->
                <div class="modal fade" id="<?= $modalId; ?>">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content bg-dark text-white">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">แก้ไขข้อมูลรถ: <?= htmlspecialchars($row['product_name']) ?></h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">


                        <form action="../functions/fn_editcarmodel.php" method="post" enctype="multipart/form-data">

                          <div class="mb-3">
                            <label class="form-label">ชื่อรถ</label>
                            <input type="text" class="form-control shadow-sm" placeholder="Model..." name="car_name" value="<?= htmlspecialchars($row['product_name']) ?>">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">รายละเอียด</label>
                            <textarea class="form-control shadow-sm" name="car_detail" rows="5" value="<?= htmlspecialchars($row['product_detail']) ?>"><?= htmlspecialchars($row['product_detail']) ?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">ราคา (บาท)</label>
                            <input type="number" name="car_price" class="form-control shadow-sm" value="<?= $row['product_price'] ?>">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">ประเภทรถ</label>
                            <select class="form-select" name="car_type">
                              <?php
                              // ดึงประเภททั้งหมดมาแสดงใน dropdown
                              $sql_type_modal = "SELECT * FROM product_type_tb";
                              $query_type_modal = $conn->query($sql_type_modal);
                              if ($query_type_modal->num_rows > 0) {
                                while ($type_modal = $query_type_modal->fetch_assoc()) {
                                  // ถ้าประเภทตรงกับของรถคันนี้ ให้ selected
                                  $selected = ($row['product_type_id'] == $type_modal['product_type_id']) ? 'selected' : '';
                              ?>

                                  <option value=<?= $type_modal['product_type_id'] ?>" <?= $selected ?>><?= $type_modal['product_type_name'] ?></option>
                              <?php
                                }
                              }
                              ?>
                              <!-- Ex. <option value='1' selected>Sedan</option> -->
                            </select>

                          </div>
                          <div class="mb-3">
                            <label class="form-label">อัพโหลดรูป</label>
                            <input type="file" class="form-control" name="car_image" shadow-sm">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                        <button class="btn btn-success" type="submit">บันทึกการแก้ไข</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          <i class="bi bi-x-circle me-1"></i> ปิด
                        </button>

                        </form>



                      </div>
                    </div>
                  </div>
                </div>

            <?php }
            } ?>


            <!-- Modal จัดการประเภทของรุ่นรถ -->
            <div class="modal fade" id="manageCarTypeModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-dark text-white border-0 shadow-lg rounded-3">

                  <!-- Header -->
                  <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                      <i class="bi bi-tags-fill me-2"></i> จัดการประเภทของรถ
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Body -->
                  <div class="modal-body">
                    <!-- ฟอร์มเพิ่มประเภท -->


                    <form action="../functions/fn_createcartype.php" method="post" class="mb-4">
                      <div class="row g-2">
                        <div class="col-md-12">
                          <label for="">ชื่อประเภท</label>
                          <input type="text" class="form-control shadow-sm w-100" name="type_name" placeholder="ชื่อประเภท (เช่น Sedan)" required>
                        </div>
                        <div class="col-md-12">
                          <label for="">รายละเอียดประเภท</label>
                          <textarea name="type_detail" class="form-control shadow-sm w-100" placeholder="รายละเอียดประเภท"></textarea>
                        </div>
                      </div>
                      <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-success">
                          <i class="bi bi-plus-circle me-1"></i> เพิ่มประเภท
                        </button>
                      </div>
                    </form>




                    <!-- ตารางแสดงประเภทที่มี -->
                    <h6 class="text-light mb-3">ประเภทที่มีอยู่แล้ว</h6>
                    <div class="table-responsive" style="max-height: 300px; overflow-y:auto;">
                      <table class="table table-dark table-striped table-hover align-middle">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>ชื่อประเภท</th>
                            <th>รายละเอียด</th>
                            <th class="text-center">การจัดการ</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = "SELECT * FROM product_type_tb";
                          $query = $conn->query($sql);
                          if ($query->num_rows > 0) {
                            $i = 1;
                            while ($row = $query->fetch_assoc()) {
                          ?>
                              <tr>
                                <td><?= $i++; ?></td>
                                <td><?= htmlspecialchars($row['product_type_name']); ?></td>
                                <td><?= htmlspecialchars($row['product_type_detail']); ?></td>
                                <td class="text-center">


                                  <form action="../functions/fn_deletecartype.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $row['product_type_id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบ?')">
                                      <i class="bi bi-trash"></i> ลบ
                                    </button>
                                  </form>


                                </td>
                              </tr>
                            <?php
                            }
                          } else {
                            ?>
                            <tr>
                              <td colspan="4" class="text-center text-secondary">ยังไม่มีประเภทที่ถูกเพิ่ม</td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- Footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                      <i class="bi bi-x-circle me-1"></i> ปิด
                    </button>
                  </div>
                </div>
              </div>
            </div>


            <!-- Modal เพิ่มรุ่นรถ -->
            <div class="modal fade" id="addCarModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-dark text-white">
                  <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">เพิ่มรถใหม่</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                  </div>


                  <form action="../functions/fn_createcarmodel.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label class="form-label">ชื่อรถ</label>
                        <input type="text" name="car_name" class="form-control shadow-sm" placeholder="Model...">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">รายละเอียด</label>
                        <textarea name="car_detail" class="form-control shadow-sm" rows="3" placeholder="รายละเอียด..."></textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">ราคา (บาท)</label>
                        <input type="number" name="car_price" class="form-control shadow-sm" placeholder="ราคา...">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">ประเภทรถ</label>
                        <select name="car_type" class="form-select">
                          <?php
                          $sql_select_add = "SELECT * FROM product_type_tb";
                          $query_select_add = $conn->query($sql_select_add);
                          if ($query_select_add->num_rows > 0) {
                            while ($row_select_add = $query_select_add->fetch_assoc()) {
                          ?>
                              <option value="<?= $row_select_add['product_type_id']; ?>"><?= $row_select_add['product_type_name']; ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">อัปโหลดรูปภาพ</label>
                        <input type="file" name="car_image" class="form-control shadow-sm" accept="image/*">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-success" type="submit">บันทึก</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> ปิด
                      </button>
                    </div>
                  </form>


                </div>
              </div>
            </div>




          </div>

          <style>
            .car-card {
              transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .car-card:hover {
              transform: translateY(-8px);
              box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            }

            .car-card img {
              height: 200px;
              object-fit: cover;
            }
          </style>

        </div>
      </div>

    </div>
  </div>

  <?php
  if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $title = isset($_GET['title']) ? htmlspecialchars($_GET['title'], ENT_QUOTES, 'UTF-8') : '';
    $msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8') : '';

    echo "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
    ";

    if ($status == "success") {
      echo "
        Swal.fire({
          icon: 'success',
          title: '$title!',
          text: '$msg',
          confirmButtonText: 'ตกลง'
        }).then(() => {
          // ลบ ?status=success ออกจาก URL โดยไม่ reload หน้า
          window.history.replaceState(null, null, window.location.pathname);
        });
        ";
    } elseif ($status == "error") {
      echo "
        Swal.fire({
          icon: 'error',
          title: '$title!',
          text: '$msg',
          confirmButtonText: 'ลองใหม่'
        }).then(() => {
          window.history.replaceState(null, null, window.location.pathname);
        });
        ";
    }

    echo "
      });
    </script>
    ";
  }
  ?>




  <?php
  include('../include/footer_admin.php');
  ?>
</body>

</html>