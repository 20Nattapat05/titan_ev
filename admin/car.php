<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
  include('../include/header_admin.php');
  ?>
    <title>Home</title>
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

    </div>



    <?php
  include('../include/footer_admin.php');
  ?>
</body>

</html>