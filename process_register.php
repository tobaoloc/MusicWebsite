<?php
include "function.php";
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkUsernameSqlQuery = "SELECT * FROM users where email = '$email' limit 1";
    $result = $mysql->query($checkUsernameSqlQuery);
    if ($result && $result->num_rows > 0) {
        // Email exists
        header("Location: " . getUrl('?error_registers=1&error_code_registers=1'));
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $insertUserQuery = "INSERT INTO users(`first_name`, `last_name`, `email`, `password`, `role`)
        VALUES ('$firstname', '$lastname', '$email', '$password', 'customer')";
        $result = $mysql->query($insertUserQuery);
        if (!$result) {
            // echo "Error while inserting user";
            header("Location: " . getUrl('?error_registers=1&error_code_registers=2'));
        } else {
            $id = $mysql->insert_id;
            echo "User inserted successfully";
            // $_SESSION['user'] =
            //     [
            //         'id' => $id,
            //         'name' => $firstname . ' ' . $lastname,
            //         'email' => $email,
            //         'role' => 'customer'
            //     ];
            header("location: " . getUrl("?registers_success=true&action=login"));
        }
    }
} else {
    // echo "Invalid data";
    header("Location: " . getUrl('?error_registers=1&error_code_registers=3'));
}