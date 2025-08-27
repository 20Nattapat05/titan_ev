<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TITAN-EV</title>
    <?php include('include/header.php'); ?>
</head>

<body>

    <?php include('include/navbar.php'); ?>

    <div class="container">
        <div class="row mt-custom">
            <div class="col-md-10">
                <form action="" method="post">
                    <input class="form-control me-2" type="search" placeholder="ค้นหา...">
                </form>
            </div>
            <div class="col-md-2">
                <form action="" method="post">
                    <select class="form-select" id="sortOrder" aria-label="การเรียงลำดับ">
                        <option value="new-to-old">ใหม่ไปเก่า</option>
                        <option value="old-to-new">เก่าไปใหม่</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="row">
            <?php
            $i = 1;
            while($i <= 4){
              $i++;
          ?>
            <div class="col-md-4">
                <div class="card my-3 hover-news">
                    <img src="assets/images/product-1.jpg" class="image-product rounded" alt="TITAN EV Model 1">
                    <div class="card-body">
                        <h4>TITAN EV Model X</h4>
                        <h6>พลังงานไฟฟ้า 1000W ความเร็วสูงสุด 60 กม./ชม. <br> ดีไซน์ล้ำสมัย พร้อมระบบเบรกนิรภัย</h6>
                        <a href="product_detail.php" class="btn btn-dark float-end">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php include('include/footer.php'); ?>

</html>