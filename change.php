<?php
include '../connect.php';

$n1 = $_POST['n1']; 
$n2 = $_POST['n2']; 
$n3 = $_POST['n3']; 

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: http://localhost/online_library/login.php');
    exit();
}

$the_user = $_SESSION['username'];

$sql = "SELECT The_password FROM users WHERE the_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $the_user);
$stmt->execute();
$result = $stmt->get_result();

$stored_hashed_password = '';

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stored_hashed_password = $row['The_password'];
} else {
    header('Location: http://localhost/online_library/login.php?error=user_data_missing');
    exit();
}
$stmt->close();

if (!password_verify($n1, $stored_hashed_password)) {
    header('Location: http://localhost/online_library/pass.php?re=1');
    exit();
}

if ($n3 !== $n2) {
    header('Location: http://localhost/online_library/pass.php?re=2'); 
    exit();
}

$new_hashed_password = password_hash($n3, PASSWORD_DEFAULT);

$sql = "UPDATE users SET The_password = ?, is_temp_password = 0 WHERE the_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $new_hashed_password, $the_user);
$stmt->execute();

if ($stmt->affected_rows > 0) {

    header('Location: http://localhost/online_library/personal.php');
} else {

    header('Location: http://localhost/online_library/pass.php?re=3'); 
}
$stmt->close();
$conn->close();
?>