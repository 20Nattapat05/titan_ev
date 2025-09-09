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

    <div class="container mt-custom">
        <div class="row ">
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3777.060622886339!2d98.95584267519838!3d18.79545148235222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da3a654208397b%3A0x15a774624eb0db25!2z4Liq4LiW4Liy4Lia4Lix4LiZ4Lig4Liy4Lip4LiyIOC4oeC4q-C4suC4p-C4tOC4l-C4ouC4suC4peC4seC4ouC5gOC4iuC4teC4ouC4h-C5g-C4q-C4oeC5iA!5e0!3m2!1sth!2sth!4v1756122356897!5m2!1sth!2sth"
                    class="contact-map rounded my-3" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <div class="card my-3 py-3">
                    <div class="card-body">
                        <h4 class="mb-4">แจ้งปัญหาที่พบมาทาง Admin</h4>
                        <form action="functions/fn_sentcontact.php" method="post">
                            <label for="">ชื่อของคุณ</label>
                            <input type="text" class="form-control mb-3" name="name" id="" required>
                            <label for="">Email สำหรับติดต่อกลับ</label>
                            <input type="text" class="form-control mb-3" name="email" id="" required>
                            <label for="">หัวข้อปัญหา</label>
                            <input type="text" class="form-control mb-3" name="title" id="" required>
                            <label for="">เนื้อหา</label>
                            <textarea class="form-control mb-3" rows="3" name="detail" id="" required></textarea>
                            <button type="submit" class="btn btn-success w-100">แจ้งปัญหา</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-5 mt-3 py-3 px-2 h-100"">
            <div class=" card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5>Social Media</h5>
                    <div class="row text-center mt-4">
                        <div class="col-md-12">
                            <a href="https://www.facebook.com/yourpage" class="text-decoration-none text-dark mx-2 border px-5 py-2 rounded" target="_blank">
                                <i class="bi bi-facebook me-2"></i>Facebook
                            </a>
                            <a href="mailto:youremail@example.com" class="text-decoration-none text-dark mx-2 border px-5 py-2 rounded">
                                <i class="bi bi-envelope-fill me-2"></i>Email
                            </a>
                            <a href="tel:+66123456789" class="text-decoration-none text-dark mx-2 border px-5 py-2 rounded">
                                <i class="bi bi-telephone-fill me-2"></i>Phone
                            </a>
                            <a href="https://line.me/ti/p/yourlineid" class="text-decoration-none text-dark mx-2 border px-5 py-2 rounded" target="_blank">
                                <i class="bi bi-chat-dots-fill me-2"></i>Line
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 border-start">
                    <h5>รับข่าวสารเพิ่มเติม</h5>
                    <form action="" method="post">
                        <div class="row mt-3">
                            <div class="col-md-9">
                                <input type="text" class="form-control mb-3" name="" id="" placeholder="กรอกอีเมลของคุณ" required>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success w-100">ส่ง</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    $status = $_GET['status'] ?? '';
    if (!empty($status)) {
    ?>
        <div class="position-absolute bottom-end-10"">
        <div class=" toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Error Login</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php if ($status == 'success') { ?>
                    ส่งข้อความสำเร็จ ขอบคุณที่ติดต่อเรา เราจะติดต่อกลับโดยเร็วที่สุด
                <?php } elseif ($status == 'error') { ?>
                    ผิดพลาดในการส่งข้อความ กรุณาลองใหม่อีกครั้ง
                <?php } ?>
            </div>
        </div>
        </div>
    <?php } ?>

    <?php include('include/footer.php'); ?>

    <script>
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl, {
                autohide: false
            });
        });
        toastList.forEach(toast => toast.show());
    </script>

    <script>
        if (window.history.replaceState) {
            const url = new URL(window.location);
            url.search = ""; // ลบ query string ออก
            window.history.replaceState({}, document.title, url);
        }
    </script>

</html>