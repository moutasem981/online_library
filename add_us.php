<?php
include '../connect.php';
$the_name = $_POST['the_name'];
$e_mail = $_POST['e_mail'];
$adress = $_POST['adress'];
$msg = $_POST['msg'];

$sql = "INSERT INTO us (the_name, e_mail, adress, msg) VALUES ('$the_name', '$e_mail', '$adress', '$msg')";
$result2 = $conn->query($sql);
header('location:http://localhost/online_library/us.php');
?>