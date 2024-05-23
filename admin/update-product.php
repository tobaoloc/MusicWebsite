<?php

// Check if product ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to fetch product details based on the provided ID
    $getProductQuery = "SELECT * FROM `products` WHERE `id`='$id'";
    $result = $mysql->query($getProductQuery);

    // Check if product exists
    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit;
    }
} else {
    echo "Product ID not provided!";
    exit;
}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Product</h1>
</div>
<hr>
<form action="<?php echo getAdminUrl("process-update-product.php") ?>" method="post" enctype="multipart/form-data">
    <!-- Hidden input field to pass product ID to the processing script -->
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
    <div class="row g-3">
        <div class="col-md-4">
            <label for="">Product Name:</label>
            <input type="text" required class="form-control" name="product_name"
                value="<?php echo $product['name']; ?>">
        </div>
        <div class="col-md-6">
            <label for="">Product Image:</label>
            <input type="file" class="form-control" name="product_image" id="inputGroupFile04"
                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <!-- Display current image -->
            <input type="text" readonly class="form-control" value="<?php echo $product['image']; ?>">

        </div>
        <div class="col-md-2">
            <label for="">Price:</label>
            <input type="text" required class="form-control" name="product_price"
                value="<?php echo $product['price']; ?>">
        </div>
        <div class="col-md-10">
            <label for="">Descriptions:</label>
            <input type="text" required class="form-control" name="product_description"
                value="<?php echo $product['descriptions']; ?>">
        </div>
        <div class="col-md-2">
            <label for="">Category ID:</label>
            <br>
            <select class="form-select" id="inputGroupSelect01" name="product_category_id">
                <?php
                // Query to fetch categories
                $getCategoriesQuery = "SELECT * FROM categories";
                $categoryResult = $mysql->query($getCategoriesQuery);

                // Check if categories exist
                if ($categoryResult && $categoryResult->num_rows > 0) {
                    while ($row = $categoryResult->fetch_assoc()) {
                        // Display category options
                        $selected = ($row['id'] == $product['category_id']) ? 'selected' : '';
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>