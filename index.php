<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>One Music - Music is a Life</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8a4e87ba92.js" crossorigin="anonymous"></script>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>

<body>
    <?php include "function.php" ?>
    <?php
    include "header.php"
        ?>
    <?php
    $action = "index";
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    switch ($action) {
        case "index":
            include "homepage.php";
            break;
        case "shopping-cart1":
            include "shoppingcart1.php";
            break;
        case "profile":
            include "profile.php";
            break;
        case "event":
            include "event.php";
            break;
        case "news":
            include "news.php";
            break;
        case "contact":
            include "contact.php";
            break;
        case "albums-store":
            include "albums-store.php";
            break;
        case "login":
            include "login.php";
            break;
        case "register":
            include "register.php";
            break;
        case "payment_success":
            include "payment_success.php";
            break;
        case "payment_fail":
            include "payment_fail.php";
            break;
        default:
            include "404.php";
            break;
    }
    ?>
    <?php
    include "footer.php"
        ?>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
</body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



<script>
    $('document').ready(function () {
        <?php

        if (isset($_GET['login_success']) && $_GET['login_success'] == 'true') {
            ?>
            toastr.success('Welcome!')

        <?php }
        ?>
    })
    $('document').ready(function () {
        <?php
        if (isset($_GET['error_login'])) {
            ?>
            //$('#registerModal').modal('show')
            <?php
            //Wrong password
            if (isset($_GET['error_code']) && $_GET['error_code'] == 1) {
                ?>
                toastr.error('Wrong password')
                <?php
            }
            //Wrong email
            if (isset($_GET['error_code']) && $_GET['error_code'] == 2) {
                ?>
                toastr.error('Wrong email address')
                <?php
            }
            //Wrong input data
            if (isset($_GET['error_code']) && $_GET['error_code'] == 3) {
                ?>
                toastr.error('Please check your input data')
                <?php
            }
        }
        ?>
    })
    $('document').ready(function () {
        <?php
        if (isset($_GET['registers_success']) && $_GET['registers_success'] == 'true') {
            ?>
            toastr.success('Your account has been activated.')
        <?php }
        ?>
    })
    $('document').ready(function () {
        <?php
        if (isset($_GET['error_registers'])) {
            ?>
            //$('#registerModal').modal('show')
            //$('#register-tab').tab('show')
            <?php
            //Email existing
            if (isset($_GET['error_code_registers']) && $_GET['error_code_registers'] == 1) {
                ?>
                toastr.error('This email already exists !')
                <?php
            }
            //Error while inserting
            if (isset($_GET['error_code_registers']) && $_GET['error_code_registers'] == 2) {
                ?>
                toastr.error('Error while inserting !')
                <?php
            }
            //Invalid data
            if (isset($_GET['error_code_registers']) && $_GET['error_code_registers'] == 3) {
                ?>
                toastr.error('Invalid data')
                <?php
            }
        }
        ?>
    })
    $('document').ready(function () {
        <?php
        if (isset($_GET['error_addtocart']) && $_GET['error_addtocart'] == 'true') {
            ?>
            toastr.warning('You need to log in to add products to cart!')
        <?php }
        ?>
    })
    $('document').ready(function () {
        <?php
        if (isset($_GET['success_orders']) && $_GET['success_orders'] == 'true') {
            ?>
            toastr.success('You have placed your order successfully!')
        <?php }
        ?>
    })
    $('document').ready(function () {
        <?php
        if (isset($_GET['error_orders']) && $_GET['error_orders'] == 'true') {
            ?>
            toastr.error('An error occurred during payment!')
        <?php }
        ?>
    })
    $('document').ready(function () {
        <?php
        if (isset($_GET['error_to_orders']) && $_GET['error_to_orders'] == 'true') {
            ?>
            toastr.warning('Your shopping cart is empty!')
        <?php }
        ?>
    })
</script>
<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ẩn đi tất cả các sản phẩm ngoài 4 sản phẩm đầu tiên
        var albums = document.querySelectorAll(".single-album-area");
        for (var i = 4; i < albums.length; i++) {
            albums[i].classList.add("hidden");
        }

        // Gắn sự kiện click cho nút "Load More"
        var loadMoreBtn = document.getElementById("load-more-btn");
        loadMoreBtn.addEventListener("click", function (event) {
            event.preventDefault();

            // Hiển thị tất cả các sản phẩm
            for (var i = 4; i < albums.length; i++) {
                albums[i].classList.remove("hidden");
            }

            // Ẩn đi nút "Load More"
            loadMoreBtn.classList.add("hidden");
        });
    });

</script> -->


</html>