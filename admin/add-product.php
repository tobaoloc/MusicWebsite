<?php
// Truy vấn để lấy các danh mục từ cơ sở dữ liệu
$sql = "SELECT * FROM categories";
$result = $mysql->query($sql);
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add new Product</h1>
</div>
<hr>
<form action="<?php echo getAdminUrl("process-add-product.php") ?>" method="post" enctype="multipart/form-data">
    <div class="row g-3">
        <div class="col-md-4">
            <label for="">
                Product Name:
            </label>
            <input type="text" required class="form-control" name="product_name">
        </div>
        <div class="col-md-6">
            <label for="">
                Product Image:
            </label>
            <input type="file" class="form-control" name="product_image" id="inputGroupFile04"
                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div class="col-md-2">
            <label for="">
                Price:
            </label>
            <input type="text" required class="form-control" name="product_price">
        </div>
        <div class="col-md-10">
            <label for="">
                Descriptions:
            </label>
            <input type="text" required class="form-control" name="product_description">
        </div>
        <div class="col-md-2">
            <label for="">
                Category ID:
            </label>
            <br>
            <select class="form-select" id="inputGroupSelect01" name="product_category_id">
                <option selected>Choose...</option>
                <?php
                // Kiểm tra xem có kết quả từ truy vấn hay không
                if ($result->num_rows > 0) {
                    // Lặp qua từng hàng kết quả
                    while ($row = $result->fetch_assoc()) {
                        // Đưa mỗi danh mục vào một tùy chọn trong phần tử select
                        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }
                } else {
                    echo "<option value=''>Không có danh mục</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">
        Add new Product
    </button>
</form>