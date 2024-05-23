<?php
include ("function.php");
if (!isset($_SESSION['user'])) {
    header("location: " . getUrl("?error_addtocart=true&action=login"));
} else {
    session_start();
    if (!isset($_SESSION['shoppingCart']))
        $_SESSION['shoppingCart'] = [];
    // if (!isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    //     array_splice($_SESSION['shoppingCart'], $_GET['delid'], 1);
    // }
    if (!isset($_SESSION['addtocart']) && ($_POST['addtocart'])) {
        $id = $_POST['productId'];
        $img = $_POST['albumImage'];
        $productName = $_POST['albumName'];
        $productPrice = $_POST['albumPrice'];
        $product = [$img, $productName, $productPrice, $id];
        $_SESSION['shoppingCart'][] = $product;
        var_dump($_SESSION['shoppingCart']);

        header("location: " . getUrl("?action=shopping-cart1"));
    }
}