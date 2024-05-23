<?php
include ("../function.php");
// Kiểm tra xem có kết nối CSDL không
if (!$mysql) {
    die("Kết nối CSDL thất bại: " . mysqli_connect_error());
}

// Lấy các thông tin thanh toán từ URL
if (isset($_GET['vnp_TxnRef'])) {
    $order_id = $_GET['vnp_TxnRef'];
    $money = $_GET['vnp_Amount'];
    $formatted_money = number_format($money / 100, 2, '.', ''); // Chia cho 100 để đổi từ đơn vị tiền tệ sang đơn vị cơ sở, và giữ 2 chữ số sau dấu thập phân
    $note = $_GET['vnp_OrderInfo'];
    $vnp_response_code = $_GET['vnp_ResponseCode'];
    $code_vnpay = $_GET['vnp_TransactionNo'];
    $code_bank = $_GET['vnp_BankCode'];
    $time = $_GET['vnp_PayDate'];
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . '-' . substr($time, 8, 2) . '-' . substr($time, 10, 2);
    $tai_khoan = $_SESSION['user']['id'];

    // Kiểm tra xem đơn hàng đã tồn tại trong bảng payments chưa
    $sql = "SELECT * FROM `payments` WHERE order_id = '$order_id'";
    $query = mysqli_query($mysql, $sql);
    $row = mysqli_num_rows($query);

    // Nếu đơn hàng đã tồn tại, cập nhật thông tin
    if ($row > 0) {
        $sql = "UPDATE `payments` SET money = '$formatted_money', note = '$note', vnp_response_code = '$vnp_response_code', code_vnpay = '$code_vnpay', code_bank = '$code_bank', time = '$time' WHERE order_id = '$order_id'";
        mysqli_query($mysql, $sql);
    } else {
        // Nếu đơn hàng chưa tồn tại, thêm mới thông tin
        $sql = "INSERT INTO `payments`(`order_id`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`, `date_time`, `user_id`) VALUES ('$order_id','$formatted_money','$note','$vnp_response_code','$code_vnpay','$code_bank','$time','$date_time','$tai_khoan')";
        mysqli_query($mysql, $sql);
        header("Location:" . getUrl("?action=payment_success&order_id=$order_id"));
    }
    $update_at = date("Y-m-d H:i:s");
    $update_order_sql = "UPDATE `orders` SET status = 1, update_at = '$update_at' WHERE id = '$order_id'";
    mysqli_query($mysql, $update_order_sql);
} else {
    // Nếu thiếu thông tin cần thiết, hiển thị thông báo lỗi
    header("Location:" . getUrl("?action=payment_fail"));
}