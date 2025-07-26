<?php
include '../connect.php';
$id = $_GET['re'];
$sql = "DELETE FROM us WHERE id = '$id' ";
$result = $conn->query($sql);
header('location:http://localhost/online_library/search_us.php');
?>