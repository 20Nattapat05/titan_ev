<?php
include('../functions/config.php');
if (empty($_SESSION['admin_login'])) {
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
                  include('../include/navbar_admin.php');
                ?>


                <div class="card shadow-sm bg-dark mt-4 overflow-auto" style="height: 62vh;">
                    <!-- ส่วนหัว -->
                    <div
                        class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <h4 class="text-light mb-1"><i class="bi bi-journal-text me-2"></i>จัดการบทความ</h4>
                            <p class="text-light mb-0">บทความที่เผยแพร่และบันทึกแบบร่าง</p>
                        </div>
                        <div class="mt-2 mt-md-0">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addArticleModal">
                                <i class="bi bi-plus-circle me-1"></i> เพิ่มบทความ
                            </button>
                        </div>
                    </div>

                    <?php
                      $search = "";
                      $sort = "";

                      if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $search = isset($_POST['search']) ? trim($_POST['search']) : "";
                        $sort = isset($_POST['sort']) ? trim($_POST['sort']) : "";
                      }

                      $sql = "SELECT * FROM news_tb WHERE 1";

                      if (!empty($search)) {
                        $sql .= " AND (news_title LIKE '%$search%' OR news_detail LIKE '%$search%')";
                      }

                      if (!empty($sort)) {
                        $sql .= " AND news_status = '$sort'";
                      }

                      $query = $conn->query($sql);
                    ?>

                    <!-- ส่วนค้นหาและกรอง -->
                    <div class="card-body text-white">
                        <div class="row mb-3">
                            <div class="col-md-3"></div>
                            <div class="col-md-3 col-12 mb-2 mb-md-0">

                                <form action="" method="post">

                                    <select class="form-select" name="sort">
                                        <option value="">ทั้งหมด</option>
                                        <option value="published" <?= $sort == 'published' ? 'selected' : '' ?>>เผยแพร่
                                        </option>
                                        <option value="draft" <?= $sort == 'draft' ? 'selected' : '' ?>>ดราฟ</option>
                                    </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="ค้นหาบทความ...">
                                    <button class="btn btn-outline-light" type="submit">
                                        <i class="bi bi-search"></i>
                                    </button>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <!-- ตาราง -->
                        <table class="table table-dark table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>หัวข้อ</th>
                                    <th>ผู้เขียน</th>
                                    <th>สถานะ</th>
                                    <th>วันที่เผยแพร่</th>
                                    <th>การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php if ($query->num_rows > 0) {
                  $i = 0;
                  while ($row = $query->fetch_assoc()) {
                    $i++; ?> <tr>
                                    <td><?= $i ?></td>
                                    <td> <?= mb_strimwidth($row['news_title'], 0, 20, "...", "UTF-8"); ?> </td>
                                    <td>Admin</td>
                                    <td> <?php if ($row['news_status'] == 'draft') { ?> <span
                                            class="badge bg-warning">บันทึกแบบร่าง</span> <?php } else { ?> <span
                                            class="badge bg-success">เผยแพร่</span> <?php } ?> </td>
                                    <td><?= $row['news_date'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- ปุ่มแก้ไข --> <button class="btn btn-sm btn-warning me-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editArticleModal<?= $row['news_id'] ?>"> <i
                                                    class="bi bi-pencil-square"></i> </button> <!-- ปุ่มลบ -->
                                            <form action="../functions/fn_deletenews.php" method="post"
                                                class="d-inline"> <input type="hidden" name="news_id"
                                                    value="<?= $row['news_id'] ?>"> <button type="submit"
                                                    class="btn btn-sm me-3 btn-danger"
                                                    onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบบทความนี้?');"> <i
                                                        class="bi bi-trash"></i> </button> </form> <!-- ปุ่มดูรูป -->
                                            <?php if (!empty($row['news_img'])): ?> <button
                                                class="btn btn-sm btn-info me-3" data-bs-toggle="modal"
                                                data-bs-target="#viewImageModal<?= $row['news_id'] ?>"> <i
                                                    class="bi bi-image"></i> </button> <?php endif; ?>
                                        </div>
                                    </td>
                                </tr> <!-- Modal แก้ไขบทความ -->
                                <div class="modal fade" id="editArticleModal<?= $row['news_id'] ?>" tabindex="-1"
                                    aria-labelledby="editArticleLabel<?= $row['news_id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content bg-dark text-white">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editArticleLabel<?= $row['news_id'] ?>">
                                                    แก้ไขบทความ</h5> <button type="button"
                                                    class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../functions/fn_updatenews.php" method="post"
                                                    enctype="multipart/form-data"> <input type="hidden" name="news_id"
                                                        value="<?= $row['news_id'] ?>">
                                                    <div class="mb-3"> <label class="form-label">หัวข้อ</label> <input
                                                            type="text" name="news_title" class="form-control"
                                                            value="<?= htmlspecialchars($row['news_title']); ?>"> </div>
                                                    <div class="mb-3"> <label class="form-label">เนื้อหา</label>
                                                        <textarea name="news_detail" class="form-control"
                                                            rows="5"><?= htmlspecialchars($row['news_detail']); ?></textarea>
                                                    </div>
                                                    <div class="mb-3"> <label class="form-label">สถานะ</label> <select
                                                            name="news_status" class="form-select">
                                                            <option value="published"
                                                                <?= $row['news_status'] == 'published' ? 'selected' : '' ?>>
                                                                เผยแพร่</option>
                                                            <option value="draft"
                                                                <?= $row['news_status'] == 'draft' ? 'selected' : '' ?>>
                                                                ดราฟ</option>
                                                        </select> </div>
                                                    <div class="mb-3"> <label class="form-label">อัปโหลดรูปใหม่
                                                            (ถ้ามี)</label> <input type="file" name="image"
                                                            class="form-control" accept="image/*">
                                                        <?php if (!empty($row['news_img'])): ?> <small
                                                            class="text-muted">รูปปัจจุบัน:
                                                            <?= htmlspecialchars($row['news_img']); ?></small>
                                                        <?php endif; ?> </div>
                                                    <div class="modal-footer"> <button type="submit"
                                                            class="btn btn-warning">อัปเดต</button> <button
                                                            type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal"> <i class="bi bi-x-circle me-1"></i>
                                                            ปิด </button> </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Modal ดูรูป -->
                                <div class="modal fade" id="viewImageModal<?= $row['news_id'] ?>" tabindex="-1"
                                    aria-labelledby="viewImageLabel<?= $row['news_id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-dark text-white">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewImageLabel<?= $row['news_id'] ?>">
                                                    รูปภาพบทความ</h5> <button type="button"
                                                    class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center"> <?php if (!empty($row['news_img'])): ?>
                                                <img src="../assets/images/<?= htmlspecialchars($row['news_img']); ?>"
                                                    alt="News Image" class="img-fluid rounded shadow"> <?php else: ?> <p
                                                    class="text-muted">ไม่มีรูปภาพสำหรับบทความนี้</p> <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div> <?php }
                        } ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

            <!-- Modal เพิ่มบทความ -->
            <div class="modal fade" id="addArticleModal" tabindex="-1" aria-labelledby="addArticleLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addArticleLabel">เพิ่มบทความใหม่</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">


                            <form action="../functions/fn_createnews.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">หัวข้อ</label>
                                    <input type="text" name="title" class="form-control"required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">เนื้อหา</label>
                                    <textarea class="form-control" name="detail" rows="5"required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">สถานะ</label>
                                    <select class="form-select" name="status">
                                        <option value="published">เผยแพร่</option>
                                        <option value="draft">ดราฟ</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">รูปภาพ</label>
                                    <input class="form-control" type="file" id="formFile" name="image" accept="image/*" required>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">บันทึก</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-1"></i> ปิด
                            </button>
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

    <style>
    .table td,
    .table th {
        white-space: nowrap;
    }
    </style>

    <?php
  include('../include/footer_admin.php');
  ?>
</body>

</html>