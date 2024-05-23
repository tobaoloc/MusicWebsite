<?php
include "../function.php";

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
    // Delete the product from the database
    $deleteProductQuery = "DELETE FROM `products` WHERE `id`='$id'";
    $result = $mysql->query($deleteProductQuery);
    if ($result) {
        // Product deleted successfully, redirect back to product listing page
        header("Location: " . getAdminUrl("?action=products&delete-product-success=true"));
    } else {
        // Failed to delete product
        echo "Failed to delete product. Please try again.";
    }
} else {
    // If no product ID is provided in the URL, redirect to the product listing page
    header("Location: " . getAdminUrl("?action=products&delete-product-error=true"));
}