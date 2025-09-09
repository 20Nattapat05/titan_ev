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
    ?>

    <div class="container">
        <div class="row mt-custom">
            <div class="col-md-10">
                <input class="form-control me-2" type="search" placeholder="ค้นหา..." id="searchInput">
            </div>

            <div class="col-md-2">
                <select class="form-select" id="sortOrder" aria-label="การเรียงลำดับ">
                    <option value="All">- ทั้งหมด -</option>
                    <?php
                        $sql = "SELECT * FROM product_type_tb";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                    ?>
                    <option value="<?php echo trim($row['product_type_id']); ?>">
                        <?php echo $row['product_type_name']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row" id="productList">
            <?php
                $sql = "SELECT * FROM product_tb INNER JOIN product_type_tb 
                        ON product_tb.product_type_id = product_type_tb.product_type_id";
                $query = $conn->query($sql);
                while($row = $query->fetch_assoc()){
            ?>
            <div class="col-md-4 product-item" data-type="<?php echo trim($row['product_type_id']); ?>">
                <div class="card my-3 hover-news">
                    <img src="assets/images/product-1.jpg" class="image-product rounded"
                        alt="<?php echo htmlspecialchars($row['product_name']); ?>">
                    <h6 class="text-bg-success position-absolute top-right-10 px-3 py-1 rounded-pill">
                        ราคา <?php echo $row['product_price']; ?> บาท
                    </h6>
                    <div class="card-body">
                        <h4 class="product-name"><?php echo $row['product_name']; ?></h4>
                        <h6 class="product-type">ประเภท: <?php echo $row['product_type_name']; ?></h6>
                        <h6 class="product-detail"><?php echo $row['product_detail']; ?></h6>
                        <a href="product_detail.php?product_id=<?php echo $row['product_id']; ?>"
                            class="btn btn-dark float-end">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php include('include/footer.php'); ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById("searchInput");
        const sortOrder = document.getElementById("sortOrder");

        function filterProducts() {
            const searchValue = (searchInput.value || "").toLowerCase().trim();
            const typeValue = (sortOrder.value || "All").toString().trim();

            const items = document.querySelectorAll(".product-item");

            items.forEach(function(item) {
                const nameEl = item.querySelector(".product-name");
                const detailEl = item.querySelector(".product-detail");

                const name = nameEl ? nameEl.textContent.toLowerCase() : "";
                const detail = detailEl ? detailEl.textContent.toLowerCase() : "";

                const type = (item.getAttribute("data-type") || item.dataset.type || "").toString()
                    .trim();

                const matchSearch = (name.indexOf(searchValue) !== -1) || (detail.indexOf(
                    searchValue) !== -1);
                const matchType = (typeValue === "All" || type === typeValue);

                if (matchSearch && matchType) {
                    item.style.display = ""; // แสดง
                } else {
                    item.style.display = "none"; // ซ่อน
                }
            });
        }

        searchInput.addEventListener("input", filterProducts);
        sortOrder.addEventListener("change", filterProducts);

        filterProducts();
    });
    </script>

</body>

</html>