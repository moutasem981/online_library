<?php
session_start();
include '.././connect.php';
if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit();
}

$bookId = $_GET['id'];
$username = $_SESSION['username'];
$orderTime = (new \DateTime())->format('Y-m-d H:i:s');
$orderStatus = 'طلب';

$stmt = $conn->prepare("INSERT INTO borrow_a_book (the_book, the_user, order_time, order_status) VALUES (?, ?, ?, ?)");
if ($stmt === false) {
    die('فشل إعداد الاستعلام: ' . $conn->error);
}
$stmt->bind_param("isss", $bookId, $username, $orderTime, $orderStatus);

if ($stmt->execute()) {
    header('Location: http://localhost/online_library/book.php');
    exit();
} else {
    echo "خطأ في تسجيل الاستعارة: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>