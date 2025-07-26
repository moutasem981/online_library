<?php
session_start();
include '../connect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['jop'] !== 'مشرف') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username_to_reset = $_POST['username_to_reset'];
    $temp_password = $_POST['temp_password'];
    $hashed_temp_password = password_hash($temp_password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET the_password = ?, is_temp_password = 1 WHERE the_user = ?");
    
    if ($stmt) {
        $stmt->bind_param("ss", $hashed_temp_password, $username_to_reset);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: ../set_temp_password.php?re=1');
            exit();
        } else {
            $check_user_sql = "SELECT id FROM users WHERE the_user = ?";
            $check_user_stmt = $conn->prepare($check_user_sql);
            $check_user_stmt->bind_param("s", $username_to_reset);
            $check_user_stmt->execute();
            $check_user_result = $check_user_stmt->get_result();

            if ($check_user_result->num_rows == 0) {
                header('Location: ../set_temp_password.php?re=2'); 
            } else {
                header('Location: ../set_temp_password.php?re=3'); 
            }
            $check_user_stmt->close();
            exit();
        }
        $stmt->close();
    } else {
        header('Location: ../set_temp_password.php?re=3');
        exit();
    }
} else {
    header('Location: ../set_temp_password.php');
    exit();
}
?>