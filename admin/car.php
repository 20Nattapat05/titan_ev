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
      <<div class="card shadow-sm bg-dark mt-4 overflow-auto" style="height: 75vh;">
  <!-- ส่วนหัว -->
  <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center">
    <div>
      <h4 class="text-light mb-1"><i class="bi bi-car-front-fill me-2"></i>รุ่นรถ EV</h4>
      <p class="text-light mb-0">รุ่นรถทั้งหมดของโรงงาน</p>
    </div>
    <div class="mt-2 mt-md-0">
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCarModal">
        <i class="bi bi-plus-circle me-1"></i> เพิ่มรุ่นรถ
      </button>
    </div>
  </div>

  <!-- ส่วนค้นหาและกรอง -->
  <div class="card-body">
    <div class="row mb-3">
      <div class="col-md-3 col-12 mb-2 mb-md-0">
        <select class="form-select">
          <option value="">ทั้งหมด</option>
          <option value="sedan">Sedan</option>
          <option value="suv">SUV</option>
        </select>
      </div>
      <div class="col-md-3 col-12 mb-2 mb-md-0">
        <select class="form-select">
          <option value="">เรียงตาม</option>
          <option value="price">ราคา</option>
          <option value="newest">ใหม่ล่าสุด</option>
        </select>
      </div>
      <div class="col-md-6 col-12">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="ค้นหารุ่นรถ...">
          <button class="btn btn-outline-light" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- แสดงการ์ดรถ -->
    <div class="row g-3">
      <!-- ตัวอย่าง Card -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="card car-card shadow-sm border-0 rounded-3 h-100 overflow-hidden">
          <img src="../assets/images/car_manage/car1.jpg" class="card-img-top" alt="Model S">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold text-dark">Model S</h5>
            <p class="card-text text-muted mb-1">ราคา: 2,500,000 บาท</p>
            <p class="card-text text-muted mb-1">ประเภทรถ: Sedan</p>
            <p class="card-text text-muted flex-grow-1">รายละเอียดเกี่ยวกับ Model S...</p>
            <div class="d-flex justify-content-between">
              <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editCarModal1">
                <i class="bi bi-pencil-square"></i> แก้ไข
              </button>
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i> ลบ
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
        <h5 class="modal-title">เพิ่มรุ่นรถใหม่</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">ชื่อรุ่นรถ</label>
            <input type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">รายละเอียด</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">ราคา (บาท)</label>
            <input type="number" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">ประเภทรถ</label>
            <select class="form-select">
              <option>Sedan</option>
              <option>SUV</option>
              <option>Pickup</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">อัปโหลดรูปภาพ</label>
            <input type="file" class="form-control" accept="image/*">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">บันทึก</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal แก้ไขรุ่นรถ -->
<div class="modal fade" id="editCarModal1" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">แก้ไขข้อมูลรถ: Model S</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">ชื่อรุ่นรถ</label>
            <input type="text" class="form-control" value="Model S">
          </div>
          <div class="mb-3">
            <label class="form-label">รายละเอียด</label>
            <textarea class="form-control" rows="3">รายละเอียดเกี่ยวกับ Model S...</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">ราคา (บาท)</label>
            <input type="number" class="form-control" value="2500000">
          </div>
          <div class="mb-3">
            <label class="form-label">ประเภทรถ</label>
            <select class="form-select">
              <option selected>Sedan</option>
              <option>SUV</option>
              <option>Pickup</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">อัพโหลดรูป</label>
            <input type="file" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">บันทึกการแก้ไข</button>
        <button class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
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
  transition: transform 0.3s ease;
}

.car-card:hover img {
  transform: scale(1.05);
}
</style>

      </div>
    </div>

  </div>
  </div>



  <?php
  include('../include/footer_admin.php');
  ?>
</body>

</html>
