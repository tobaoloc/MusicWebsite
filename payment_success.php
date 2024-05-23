<?php
// Kiểm tra xem có kết nối CSDL không
if (!$mysql) {
    die("Kết nối CSDL thất bại: " . mysqli_connect_error());
}

// Lấy order_id từ URL
$order_id = $_GET['order_id'];

// Truy vấn để lấy dữ liệu từ bảng payments
$sql = "SELECT money, date_time FROM payments WHERE order_id = '$order_id'";
$query = mysqli_query($mysql, $sql);
if (!$query) {
    echo "Error: " . mysqli_error($mysql);
    exit;
}

// Lấy dữ liệu từ kết quả truy vấn
$row = mysqli_fetch_assoc($query);
if ($row) {
    // Lấy giá trị của cột money và date_time
    $amount_paid = number_format($row['money'], 0, ',', '.');
    $date_paid = $row['date_time'];
}

// Truy vấn để lấy dữ liệu từ bảng orders_items và products
$sql_items = "SELECT oi.product_id, oi.quantity, oi.subtotal, p.name, p.image
              FROM orders_items oi
              INNER JOIN products p ON oi.product_id = p.id
              WHERE oi.order_id = '$order_id'";
$query_items = mysqli_query($mysql, $sql_items);
if (!$query_items) {
    echo "Error: " . mysqli_error($mysql);
    exit;
}

$sql_methods = "SELECT payment_method FROM orders WHERE id = '$order_id'";
$query_methods = mysqli_query($mysql, $sql_methods);
if (!$query_items) {
    echo "Error: " . mysqli_error($mysql);
    exit;
}
$row = mysqli_fetch_assoc($query_methods);
$payment_method = $row['payment_method'];
$currency_code = $payment_method == 1 ? "₫" : "$";
?>
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p>Buy what’s new</p>
        <h2>Thank you!</h2>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="message-box _success">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                <h2> Your payment was successful !</h2>
                <p> Thank you for your payment. We will send the goods to you within 24 hours.</p>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr align="center">
                            <th scope="col">#</th>
                            <th scope="col">Album</th>
                        </tr>
                    </thead>
                    <tbody class="table-shoppingCart">
                        <?php
                        // Biến đếm số thứ tự
                        $count = 1;
                        // Lặp qua kết quả truy vấn và hiển thị dữ liệu
                        while ($item = mysqli_fetch_assoc($query_items)) {
                            echo "<tr align='center'>";
                            echo "<td>" . $count++ . "</td>"; // Hiển thị số thứ tự
                            echo "<td><img src='{$item['image']}' alt='{$item['name']}' width='100'></td>"; // Hiển thị ảnh sản phẩm
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Amount Paid:</p>
                    <p class="mb-2"><?php echo $amount_paid; ?><?php echo $currency_code ?></p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="mb-2">Date:</p>
                    <p class="mb-2"><?php echo $date_paid; ?></p>
                </div>
                <hr>
                <a href="/" class="btn oneMusic-btn mt-30">Return to home page</a>
            </div>
        </div>
    </div>
</div>