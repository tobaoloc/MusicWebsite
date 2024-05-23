<?php

$getProductsQuery = "SELECT * FROM `products` ORDER BY `ID` DESC";
$result = $mysql->query($getProductsQuery);
if ($result && $result->num_rows > 0) {
    $products = $result;
} else {
    $products = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
</head>

<body>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
        <a href="<?php echo getAdminUrl("?action=add-product") ?>" class="btn btn-primary">Add Product</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th width="15px">ID</th>
                            <th>NAME</th>
                            <th width="200px">IMAGE</th>
                            <th width="15px">PRICE</th>
                            <th width="200px">DESCRIPTIONS</th>
                            <th>CATEGORY_ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($products == null) { ?>
                            <tr>
                                <td colspan="2">No data !</td>
                            </tr>
                        <?php } else {
                            $i = 1;
                            while ($product = $products->fetch_array()) {
                                ?>
                                <tr align="center">
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <?php echo $product['name']; ?>
                                    </td>
                                    <td><img src="<?php echo $product['image']; ?>"
                                            style="max-width: 200px; max-height: 200px;"></td>
                                    <td>
                                        <?php echo $product['price']; ?>
                                    </td>
                                    <td>
                                        <?php echo $product['descriptions']; ?>
                                    </td>
                                    <td>
                                        <?php echo $product['category_id']; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo getAdminUrl("?action=update-product&id=" . $product['id']) ?>"
                                            class="btn btn-success me-3">Edit</a>
                                        <a href="<?php echo getAdminUrl("delete-product.php?id=" . $product['id']) ?>"
                                            class="btn btn-danger me-3">Remove</a>
                                    </td>
                                </tr>
                            <?php }
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>