<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TITAN-EV</title>
    <?php include('include/header.php'); ?>
</head>

<body>

    <?php
        include('functions/config.php');
        include('include/navbar.php');

        $product_id = $_REQUEST['product_id'];
        echo $product_id;
        $sql = "SELECT * FROM product_tb INNER JOIN product_type_tb ON product_tb.product_type_id = product_type_tb.product_type_id WHERE product_id = '$product_id'";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
    ?>

    <div class="container">
        <div class="row mt-custom mb-4">
            <div class="col-md-6">
                <img src="assets/images/car_manage/<?php echo $row['product_img']; ?>" alt="News" class="image-detail-news rounded">
            </div>
            <div class="col-md-6">
                <div class="card text-bg-dark">
                    <div class="card-body">
                        <h4><?php echo $row['product_name']; ?></h4>
                        <h6 class="mb-3">Price: <?php echo $row['product_price']; ?> บาท</h6>
                        <h6 class="text-secondary">
                            <?php echo $row['product_detail']; ?>
                        </h6>
                        <a href="products.php" class="btn btn-secondary btn-sm float-end mt-4"><i
                                class="bi bi-arrow-left me-2"></i> กลับหน้าหลัก</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <?php include('include/footer.php'); ?>

</html>