<?php
include "function.php";
session_start();

if (isset($_GET['delid']) && $_GET['delid'] >= 0) {
    // Check if the shopping cart session exists and is an array
    if (isset($_SESSION['shoppingCart']) && is_array($_SESSION['shoppingCart'])) {
        // Remove the item at the specified index from the shopping cart array
        array_splice($_SESSION['shoppingCart'], $_GET['delid'], 1);
        // Redirect back to the shopping cart page
        // header("location: shopping-cart1");
        header("location: " . getUrl("?delete-shoppingcart-success=true&action=shopping-cart1"));

    }
}
header("location: " . getUrl("?delete-shoppingcart-success=true&action=shopping-cart1"));
// If no delid or invalid delid is provided, redirect back to shopping cart page
// header("location: shopping-cart1");

