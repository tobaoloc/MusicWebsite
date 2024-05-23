<?php
include ("function.php");
// Kiểm tra xem có kết nối CSDL không
if (!$mysql) {
    die("Kết nối CSDL thất bại: " . mysqli_connect_error());
}

if (isset($_SESSION['shoppingCart']) && !empty($_SESSION['shoppingCart'])) {
    $user_id = $_SESSION['user']['id'];
    $user_email = $_SESSION['user']['email'];
    $sum = 0;

    // Calculate total sum of products
    foreach ($_SESSION['shoppingCart'] as $item) {
        $sum += $item[2];
    }

    $tax = $sum * 0.10;
    $total = number_format($sum + $tax, 2, '.', ''); // Thêm tham số '.' và '' để loại bỏ dấu phẩy
    $_SESSION['total'] = $total; // Lưu giá trị total vào session
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $create_at = date("Y-m-d H:i:s");
    $update_at = date("Y-m-d H:i:s");

    // Thêm giá trị vào câu truy vấn SQL (tránh dấu phẩy)
    $total_for_sql = str_replace(',', '', $total);
    // Insert order into the database
    $insertOrdersQuery = "INSERT INTO orders (user_id, customer_email, total, create_at, update_at, `status`, payment_method) VALUES ('$user_id', '$user_email', '$total', '$create_at', '$update_at', '0', '2')";
    $result = $mysql->query($insertOrdersQuery);

    if (!$result) {
        exit;
    } else {
        $id = $mysql->insert_id;

        // Insert order items into the database
        foreach ($_SESSION['shoppingCart'] as $item) {
            $product_id = $item[3];
            $quantity = 1;
            $price = $item[2];
            $subtotal = $quantity * $price;
            $insertOrderDetailsQuery = "INSERT INTO orders_items (order_id, product_id, quantity, product_price, subtotal) VALUES ('$id', '$product_id', '$quantity', '$price', '$subtotal')";
            $result = $mysql->query($insertOrderDetailsQuery);
            if (!$result) {
                header("Location: " . getUrl('?action=payment_fail'));
            } else {
                unset($_SESSION['shoppingCart']);

            }

        }
    }
}
$order_id = $id;
$money = $total;
$tai_khoan = $_SESSION['user']['id'];
$note = "Payment Success";

$code_bank = "Paypal";
$date_time = date('Y-m-d H:i:s');
// Kiểm tra xem đơn hàng đã tồn tại trong bảng payments chưa
$sql = "SELECT * FROM `payments` WHERE order_id = '$order_id'";
$query = mysqli_query($mysql, $sql);
$row = mysqli_num_rows($query);

// Nếu đơn hàng đã tồn tại, cập nhật thông tin
if ($row > 0) {
    $sql = "UPDATE `payments` SET money = '$money', note = '$note',  WHERE order_id = '$order_id'";
    mysqli_query($mysql, $sql);
} else {
    // Nếu đơn hàng chưa tồn tại, thêm mới thông tin
    $sql = "INSERT INTO `payments`(`order_id`, `money`, `note`,  `code_bank`, `date_time`, `user_id`) VALUES ('$order_id','$money','$note','$code_bank','$date_time','$tai_khoan')";
    mysqli_query($mysql, $sql);
}
$update_at = date("Y-m-d H:i:s");
$update_order_sql = "UPDATE `orders` SET status = 1, update_at = '$update_at' WHERE id = '$order_id'";
mysqli_query($mysql, $update_order_sql);
echo json_encode($order_id);
