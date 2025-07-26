<?php
include '../connect.php'; //

$id = $_POST['id'];
$order_status = $_POST['order_status'];
$notes = $_POST['notes'];
$borrowing_date = $_POST['borrowing_date'];
$replay_date = $_POST['replay_date'];
$security = $_POST['security'];

// استخدام mysqli_real_escape_string للحماية من SQL Injection
$id = mysqli_real_escape_string($conn, $id);
$order_status = mysqli_real_escape_string($conn, $order_status);
$notes = mysqli_real_escape_string($conn, $notes);
$borrowing_date = mysqli_real_escape_string($conn, $borrowing_date);
$replay_date = mysqli_real_escape_string($conn, $replay_date);
$security = mysqli_real_escape_string($conn, $security);

$sql = "UPDATE borrow_a_book SET order_status = '$order_status' , notes = '$notes' , borrowing_date = '$borrowing_date' , replay_date = '$replay_date' , security = '$security'  where id = '$id'";
$result = $conn->query($sql);

// تحديد صفحة العودة الافتراضية إذا لم يتم تحديدها (الافتراضي للمشرف)
$redirectPage = '../borrow_a_book.php'; //

// التحقق مما إذا تم تمرير متغير 'redirect_to' من الفورم
if (isset($_POST['redirect_to']) && !empty($_POST['redirect_to'])) {
    // قائمة بالصفحات المسموح بالتحويل إليها لزيادة الأمان
    $allowedPages = ['borrow_a_book.php', 'borrow_a_book2.php'];

    // التحقق مما إذا كانت الصفحة المطلوبة موجودة في القائمة المسموح بها
    if (in_array($_POST['redirect_to'], $allowedPages)) {
        $redirectPage = '../' . $_POST['redirect_to'];
    }
}

// إعادة التوجيه إلى الصفحة المحددة
header('Location: ' . $redirectPage);
exit();

?>