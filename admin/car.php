<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
  include('../include/header_admin.php');
  ?>
<<<<<<< HEAD
  <title>Car manage</title>
=======
    <title>Home</title>
>>>>>>> 2087fd346e7c54a048f0ae203658ed3cd5dee23b
</head>

<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php include('../include/sidebar_admin.php'); ?>
            </div>
            <div class="col-md-10">
                <?php include('../include/sidebar_res_admin.php'); ?>
                <?php include('../include/navbar_admin.php'); ?>
                <div class="card shadow-sm bg-dark mt-4">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        <div class="card shadow-sm bg-dark mt-4 overflow-auto" style="height: 60vh;">
          <div class="card-body">


            <div class="row mb-4">
              <div class="col-md-4 col-12">
                <h2 class="text-light mb-1">
                  <i class="fs-4 bi-car-front-fill"></i> รุ่นรถ EV
                </h2>
                <p class="text-light">รุ่นรถทั้งหมดของโรงงาน</p>
              </div>


              <div class="col-md-2 col-12 ">
                <div class="input-group">
                  <select name="sort" class="form-select" id="">
                    <option value="">รุ่นรถ</option>
                    <option value=""></option>
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

              <!-- ปุ่ม -->
              <div class="col-md-2 col-12">
                <button class="btn btn-primary shadow-sm w-100" data-bs-toggle="modal" data-bs-target="#addCarModal">
                  เพิ่มรุ่นรถ
                </button>
              </div>

              <!-- Modal เพิ่มรุ่นรถ -->
              <div class="modal fade" id="addCarModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">

                    <div class="modal-header bg-primary text-white">
                      <h5 class="modal-title">เพิ่มรุ่นรถใหม่</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                      <form id="addCarForm">
                        <div class="mb-3">
                          <label for="carName" class="form-label">ชื่อรุ่นรถ</label>
                          <input type="text" class="form-control" id="carName" required>
                        </div>

                        <div class="mb-3">
                          <label for="carDetail" class="form-label">รายละเอียด</label>
                          <textarea class="form-control" id="carDetail" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                          <label for="carPrice" class="form-label">ราคา (บาท)</label>
                          <input type="number" class="form-control" id="carPrice" required>
                        </div>

                        <div class="mb-3">
                          <label for="carImage" class="form-label">อัปโหลดรูปภาพ</label>
                          <input type="file" class="form-control" id="carImage" accept="image/*">
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

            </div>



            <div class="row g-3">
              <!-- ตัวอย่าง Card รถ -->
              <div class="col-md-3 col-12">
                <div class="card shadow-sm border-0 rounded-3 h-100">
                  <img src="../assets/images/car_manage/car1.jpg" class="card-img-top" alt="Model S" style="width: 100%; height: 350px; object-fit: cover;">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-dark">Model S</h5>
                    <p class="card-text text-muted">รายละเอียดเกี่ยวกับ Model S</p>
                    <div class="mt-auto d-flex justify-content-between">
                      <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editCarModal1">
                        แก้ไข
                      </button>
                      <button class="btn btn-sm btn-danger">
                        ลบ
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal ฟอร์มแก้ไขรถ -->
            <div class="modal fade" id="editCarModal1" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-3 shadow-lg">
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
                        <textarea class="form-control" rows="3">รายละเอียดเกี่ยวกับ Model S</textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">ราคา (บาท)</label>
                        <input type="number" class="form-control" value="2500000">
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


          </div>
        </div>
      </div>
=======
>>>>>>> 2087fd346e7c54a048f0ae203658ed3cd5dee23b

    </div>



    <?php
  include('../include/footer_admin.php');
  ?>
</body>

</html>