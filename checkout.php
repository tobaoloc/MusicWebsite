<?php
include ("function.php");

if (!isset($_SESSION['user'])) {
    header("location: " . getUrl("?error_addtocart=true&action=login"));
} else {
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
        $insertOrdersQuery = "INSERT INTO orders (user_id, customer_email, total, create_at, update_at, `status`, payment_method) VALUES ('$user_id', '$user_email', '$total', '$create_at', '$update_at', '0', '1')";
        $result = $mysql->query($insertOrdersQuery);

        if (!$result) {
            header("Location: " . getUrl('?error_orders=true'));
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
                    header("Location: " . getUrl('?error_orders=true'));
                } else {
                    unset($_SESSION['shoppingCart']);
                    header("Location: " . getUrl('vnpay_php/index.php?order_id=' . $id));
                }
            }
        }
    } else {
        // Redirect to error URL if shopping cart is empty
        header("Location: " . getUrl('?error_to_orders=true'));
    }
}