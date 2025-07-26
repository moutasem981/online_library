<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['jop'] !== 'مشرف') {
    header('Location: login.php');
    exit();
}

include 'connect.php';
include 'css.css';
include 'list.php';

$message = '';
if (isset($_GET['re'])) {
    if ($_GET['re'] == 1) {
        $message = '<p style="color: green; font-weight: bold;">تم تعيين كلمة المرور المؤقتة بنجاح.</p>';
    } elseif ($_GET['re'] == 2) {
        $message = '<p style="color: red; font-weight: bold;">اسم المستخدم غير موجود.</p>';
    } elseif ($_GET['re'] == 3) {
        $message = '<p style="color: red; font-weight: bold;">حدث خطأ أثناء تحديث كلمة المرور.</p>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> تعيين كلمة مرور </title>
</head>
<body>
<center>
    <h1>مكتبة مِداد نابلس</h1>

    <div id="d5">
        <h2>تعيين كلمة مرور مؤقتة لمستخدم</h2>
        <br><br>

        <?php echo $message; ?>

        <form action="fun/update_temp_password.php" method="post">
            <div>
                <label class="f25">اسم المستخدم</label>
                <input class="f75" type="text" name="username_to_reset" placeholder="أدخل اسم المستخدم" autocomplete="off" required>
            </div>
            <div>
                <label class="f25">كلمة المرور المؤقتة</label>
                <input class="f75" type="text" name="temp_password" placeholder="أدخل كلمة المرور المؤقتة" required>
            </div>
            <div>
                <input type="submit" value="تعيين كلمة المرور">
            </div>
        </form>
    </div>
</center>
</body>
</html>