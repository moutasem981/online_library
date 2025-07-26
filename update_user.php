<?php
include '../connect.php';

$id = $_POST['id'];
$jop = $_POST['jop'];


$sql = "UPDATE users SET jop = '$jop' where id = '$id'";
$result = $conn->query($sql);
header('Location:http://localhost/online_library/search_user.php');

?>