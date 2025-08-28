<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../include/header_admin.php'); ?>
    <title>Home</title>
</head>

<body>

    <div class="container">
        <div class="row d-flex justify-content-center align-content-center vh-100">
            <div class="col-md-5">
                <div class="card text-bg-dark my-4 py-4 px-3">
                    <div class="card-body">
                        <h4>Login admin</h4>
                        <hr>
                        <form action="../functions/fn_login.php" method="post">
                            <label for="">Username</label>
                            <input type="text" class="form-control mb-4" name="admin_username"
                                placeholder="กรอกชื่อผู้ใช้ . . ." required>
                            <label for="">Password</label>
                            <input type="password" class="form-control mb-4" name="admin_password"
                                placeholder="กรอกรหัสผ่าน . . ." required>
                            <button type="submit" class="btn btn-outline-light w-100">เข้าสู่ระบบ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        $status = $_GET['status'] ?? '';
        if(!empty($status)){ 
    ?>
    <div class="position-absolute bottom-end-10">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Error Login</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php if($status == 'error'){ ?>
                Userename หรือ Password ผิดพลาด
                <?php } elseif($status == 'logout'){ ?>
                ออกจากระบบเสร็จสิ้น
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>



    <?php include('../include/footer_admin.php'); ?>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
    var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl, {
            autohide: false
        });
    });
    toastList.forEach(toast => toast.show());
    </script>
</body>

</html>