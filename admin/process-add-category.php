<?php
include "../function.php";
if (isset($_POST['category_name']) && $_POST['category_name'] != "") {
    $name = $_POST['category_name'];
    $checkExistsCategoryQuery = "SELECT * FROM `categories` where `name` = '$name' limit 1";
    $result = $mysql->query($checkExistsCategoryQuery);
    if ($result && $result->num_rows > 0) {
        echo "Category exists!";
        // header("Location: " . getAdminUrl("?action=category&insert_error=true"));
        // die;
    } else {
        $insertCategoryQuery = "INSERT INTO `categories`(`name`) VALUES ('$name')";
        $result = $mysql->query($insertCategoryQuery);
        if (!$result) {
            echo "Error while insert category!";
        } else {
            header("Location: " . getAdminUrl("?action=category&insert_success=1"));
        }
    }
} else {
    die("Invalid data");
}