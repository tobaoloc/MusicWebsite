<?php
include "../function.php";
if (isset($_POST['product_name']) && $_POST['product_name'] != "") {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $description = $_POST['product_description'];
    $category_id = $_POST['product_category_id'];
    $checkExistsProductQuery = "SELECT * FROM `products` where `name` = '$name' limit 1";
    $result = $mysql->query($checkExistsProductQuery);
    if ($result && $result->num_rows > 0) {
        echo "Product exists!";
        // header("Location: " . getAdminUrl("?action=Product&insert_error=true"));
        // die;
    } else {
        $image = $_FILES['product_image']; // Retrieve the file details
        $target_dir = "../img/bg-img/";

        // Check if file is uploaded without errors
        if ($image['error'] == UPLOAD_ERR_OK) {
            $filename = basename($image['name']);
            $target_file = $target_dir . $filename;

            // Check file size (in bytes), max size is 5MB
            if ($image['size'] > 5 * 1024 * 1024) {
                echo "File is too large. Please upload an image less than 5MB.";
                exit;
            }

            // Allow certain file formats
            $allowed_formats = array("jpg", "png", "jpeg", "gif");
            $file_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (!in_array($file_ext, $allowed_formats)) {
                echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
                exit;
            }
            // Move the uploaded file
            // var_dump($target_file);
            // var_dump($image['tmp_name']);
            // die;
            if (move_uploaded_file($image['tmp_name'], $target_file)) {
                $filename = "../img/bg-img/" . $filename;
                // Insert into database
                $insertProductQuery = "INSERT INTO `products`(`name`, `image`, `price`, `descriptions`, `category_id`) VALUES ('$name','$filename','$price','$description','$category_id')";
                $result = $mysql->query($insertProductQuery);
                if (!$result) {
                    echo "Error while insert Product!";
                } else {
                    header("Location: " . getAdminUrl("?action=products&insert_success=1"));
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Error occurred while uploading file. Error code: " . $image['error'];
        }
    }
} else {
    die("Invalid data");
}