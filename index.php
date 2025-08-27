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

        <!-- Banner -->
        <div id="carousel" class="carousel slide mt-custom">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/โฆษณา1 .jpg" class="image-banner rounded" alt="banner-1">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/โฆษณา2.jpg" class="image-banner rounded" alt="banner-2">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/โฆษณา3.jpg" class="image-banner rounded" alt="banner-3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="row my-4">
            <div class="col-md-6">
                <img src="assets/images/news-1.jpg" class="image-news-main rounded" alt="news">
            </div>
            <div class="col-md-3">
                <img src="assets/images/news-2.jpg" class="image-news-scon rounded" alt="news">
                <img src="assets/images/news-3.jpg" class="image-news-scon rounded mt-3" alt="news">
            </div>
            <div class="col-md-3">
                <img src="assets/images/news-3.jpg" class="image-news-scon rounded" alt="news">
                <img src="assets/images/news-4.jpg" class="image-news-scon rounded mt-3" alt="news">
            </div>
        </div>



        <div class="carousel-container">
            <div class="carousel-wrap">
                <div class="col-md-3">
                    <div class="card my-3 me-4 hover-news">
                        <a href="news_detail.php" class="text-dark text-decoration-none">
                            <img src="assets/images/การ์ดสไลด์.1.jpg" class="image-news rounded" alt="News-1">
                            <div class="card-body">
                                <h5 class="fw-bold">News</h5>
                                <h6 class="text-primary">6 สิงหาคม 2568</h6>
                                <h6>- ใช้ง่าย ปลอดภัย มั่นคง ประหยัดพลังงาน</h6>
                                <h6>- รถสามล้อไฟฟ้ารุ่นใหม่ มอเตอร์ 1000W 60V 25Ah</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3 me-4 hover-news">
                        <a href="news_detail.php" class="text-dark text-decoration-none">
                            <img src="assets/images/การ์ดสไลด์.2.jpg" class="image-news rounded" alt="News-2">
                            <div class="card-body">
                                <h5 class="fw-bold">News</h5>
                                <h6 class="text-primary">5 สิงหาคม 2568</h6>
                                <h6>- ยอดขายทะลุ 1.6 ล้าน</h6>
                                <h6>- ขอบคุณลูกค้าที่ให้การสนับสนุน TITAN EV</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3 me-4 hover-news">
                        <a href="news_detail.php" class="text-dark text-decoration-none">
                            <img src="assets/images/การ์ดสไลด์.3.jpg" class="image-news rounded" alt="News-3">
                            <div class="card-body">
                                <h5 class="fw-bold">News</h5>
                                <h6 class="text-primary">4 สิงหาคม 2568</h6>
                                <h6>- TITAN 1.1 M รถกระบะไฟฟ้าสายลุย</h6>
                                <h6>- แบตเตอรี่ 60V 25Ah มอเตอร์แรง 1,000 วัตต์</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3 me-4 hover-news">
                        <a href="news_detail.php" class="text-dark text-decoration-none">
                            <img src="assets/images/การ์ดสไลด์ 4.jpg" class="image-news rounded" alt="News-4">
                            <div class="card-body">
                                <h5 class="fw-bold">News</h5>
                                <h6 class="text-primary">4 สิงหาคม 2568</h6>
                                <h6>- รับน้ำหนักได้สูงถึง 800 กิโลกรัม</h6>
                                <h6>- ไม่มีควัน ไม่มีเสียง ค่าไฟถูกกว่าค่าน้ำมัน</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card my-3 me-4 hover-news">
                        <a href="news_detail.php" class="text-dark text-decoration-none">
                            <img src="assets/images/การ์ดสไลด์ 5.jpg" class="image-news rounded" alt="News-5">
                            <div class="card-body">
                                <h5 class="fw-bold">News</h5>
                                <h6 class="text-primary">4 สิงหาคม 2568</h6>
                                <h6>- รถบรรทุกสามล้อไฟฟ้า รุ่น 1.6M มอเตอร์ 1600 วัตต์</h6>
                                <h6>- เหมาะสำหรับพ่อค้าแม่ค้า ร้านส่งของ ธุรกิจออนไลน์</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <?php include('include/footer.php'); ?>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    let carouselContainer = document.querySelector('.carousel-container');
    let isDragging = false;
    let startX;
    let scrollLeft;

    carouselContainer.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.pageX - carouselContainer.offsetLeft;
        scrollLeft = carouselContainer.scrollLeft;
        carouselContainer.style.cursor = 'grabbing';
    });

    carouselContainer.addEventListener('mouseleave', () => {
        isDragging = false;
        carouselContainer.style.cursor = 'grab';
    });

    carouselContainer.addEventListener('mouseup', () => {
        isDragging = false;
        carouselContainer.style.cursor = 'grab';
    });

    carouselContainer.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - carouselContainer.offsetLeft;
        const walk = (x - startX) * 3;
        carouselContainer.scrollLeft = scrollLeft - walk;
    });

    // สำหรับการสัมผัส (touch) บนอุปกรณ์มือถือ
    carouselContainer.addEventListener('touchstart', (e) => {
        isDragging = true;
        startX = e.touches[0].pageX - carouselContainer.offsetLeft;
        scrollLeft = carouselContainer.scrollLeft;
    });

    carouselContainer.addEventListener('touchend', () => {
        isDragging = false;
    });

    carouselContainer.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.touches[0].pageX - carouselContainer.offsetLeft;
        const walk = (x - startX) * 3;
        carouselContainer.scrollLeft = scrollLeft - walk;
    });
    </script>

</body>

</html>