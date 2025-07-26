<?php

include '../connect.php';

$the_user = $_POST['the_user'];
$full_name = $_POST['full_name'];
$the_email = $_POST['the_email'];
$the_password = $_POST['the_password'];
$Reset_Password = $_POST['Reset_Password'];

if ($the_password != $Reset_Password) {
    header('Location:http:../sign_up.php?re=1');
    exit();
}

$check_user_sql = "SELECT the_user FROM users WHERE the_user = '$the_user'";
$check_user_result = $conn->query($check_user_sql);

if ($check_user_result->num_rows > 0) {
    header('Location: ../sign_up.php?re=2');
    exit();
}

$stage = $_POST['stage'];
$city = $_POST['city'];

// تشفير كلمة المرور قبل حفظها في قاعدة البيانات
$hashed_password = password_hash($the_password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (the_user, full_name, the_email, the_password, stage, city, jop)
        VALUES ('$the_user', '$full_name', '$the_email' , '$hashed_password', '$stage', '$city', 'عضو')";

$result2 = $conn->query($sql);

header('Location:http:../login.php');

?>