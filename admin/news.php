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


        </div>
<div class="card shadow-sm bg-dark mt-4 overflow-auto" style="height: 75vh;">
  <!-- ส่วนหัว -->
  <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center">
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

  <!-- ส่วนค้นหาและกรอง -->
  <div class="card-body text-white">
    <div class="row mb-3">
      <div class="col-md-3 col-12 mb-2 mb-md-0">
        <select class="form-select">
          <option value="">ทั้งหมด</option>
          <option value="published">เผยแพร่</option>
          <option value="draft">ดราฟ</option>
        </select>
      </div>
      <div class="col-md-3 col-12 mb-2 mb-md-0">
        <select class="form-select">
          <option value="">ทั้งหมด</option>
          <option value="read">อ่านแล้ว</option>
          <option value="unread">ยังไม่ได้อ่าน</option>
        </select>
      </div>
      <div class="col-md-6 col-12">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="ค้นหาบทความ...">
          <button class="btn btn-outline-light" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- ตาราง -->
    <table class="table table-dark table-hover align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>หัวข้อ</th>
          <th>ผู้เขียน</th>
          <th>สถานะ</th>
          <th>วันที่เผยแพร่</th>
          <th>การจัดการ</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>เทรนด์ใหม่ในอุตสาหกรรม...</td>
          <td>Admin</td>
          <td><span class="badge bg-success">เผยแพร่</span></td>
          <td>2025-08-20</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editArticleModal">
              <i class="bi bi-pencil-square"></i>
            </button>
            <button class="btn btn-sm btn-danger">
              <i class="bi bi-trash"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal เพิ่มบทความ -->
<div class="modal fade" id="addArticleModal" tabindex="-1" aria-labelledby="addArticleLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="addArticleLabel">เพิ่มบทความใหม่</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">หัวข้อ</label>
            <input type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">เนื้อหา</label>
            <textarea class="form-control" rows="5"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">สถานะ</label>
            <select class="form-select">
              <option value="published">เผยแพร่</option>
              <option value="draft">ดราฟ</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success">บันทึก</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal แก้ไขบทความ -->
<div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="editArticleLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="editArticleLabel">แก้ไขบทความ</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">หัวข้อ</label>
            <input type="text" class="form-control" value="เทรนด์ใหม่ในอุตสาหกรรม...">
          </div>
          <div class="mb-3">
            <label class="form-label">เนื้อหา</label>
            <textarea class="form-control" rows="5">เนื้อหาตัวอย่าง...</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">สถานะ</label>
            <select class="form-select">
              <option value="published" selected>เผยแพร่</option>
              <option value="draft">ดราฟ</option>
            </select>
          </div>
          <button type="submit" class="btn btn-warning">อัปเดต</button>
        </form>
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