<?php
include "../function.php";

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $checkExistsCategoryQuery = "SELECT * FROM `categories` WHERE `id` = '$id'";
    $result = $mysql->query($checkExistsCategoryQuery);
    if ($result && $result->num_rows > 0) {
        $deleteCategoryQuery = "DELETE FROM `categories` WHERE `id` = '$id'";
        $result = $mysql->query($deleteCategoryQuery);
        if ($result) {
            header("Location: " . getAdminUrl('?action=category&delete_category=1'));
        } else {
            die("Couldn't delete category");
        }
    }
} else {
    die("Invalid data");
}