<?php
include "../function.php";

if (isset($_POST['product_id'], $_POST['product_name'], $_POST['product_price'], $_POST['product_description'], $_POST['product_category_id'])) {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $description = $_POST['product_description'];
    $category_id = $_POST['product_category_id'];

    // Check if a new image is uploaded
    if (isset($_FILES['product_image']) && $_FILES['product_image']['size'] > 0) {
        $image = $_FILES['product_image'];
        $target_dir = "../img/bg-img/";

        // Check if file is uploaded without errors
        if ($image['error'] == UPLOAD_ERR_OK) {
            $filename = basename($image['name']);
            $target_file = $target_dir . $filename;

            // Move the uploaded file
            if (move_uploaded_file($image['tmp_name'], $target_file)) {
                $filename = "../img/bg-img/" . $filename;
                // Update product details including image in the database
                $updateProductQuery = "UPDATE `products` SET `name`='$name', `image`='$filename', `price`='$price', `descriptions`='$description', `category_id`='$category_id' WHERE `id`='$id'";
                $result = $mysql->query($updateProductQuery);
                if (!$result) {
                    echo "Error while updating product!";
                } else {
                    header("Location: " . getAdminUrl("?action=products&update-success=true"));
                    exit;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Error occurred while uploading file. Error code: " . $image['error'];
        }
    } else {
        // No new image uploaded, update other details
        $updateProductQuery = "UPDATE `products` SET `name`='$name', `price`='$price', `descriptions`='$description', `category_id`='$category_id' WHERE `id`='$id'";
        $result = $mysql->query($updateProductQuery);
        if (!$result) {
            echo "Error while updating product!";
        } else {
            header("Location: " . getAdminUrl("?action=products&update-success=true"));
            exit;
        }
    }
} else {
    // If required fields are not provided, show error message
    echo "Invalid data!";
}
?>