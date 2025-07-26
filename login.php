<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>تسجيل الدخول</title>
</head>
<body>
<center>
<?php
include 'css.css';
include 'list.php';
?>
  <div id="d5">
    <br><br>
    <h2>تسجيل دخول إلى حسابك    </h2>
    <br><br>
    <form action="fun/test.php" method="post">
        <div>
            <label class="f25">اسم المستخدم</label>
            <input class="f75" type="text" name="n1" placeholder="أدخل اسم المستخدم" autocomplete="off">
        </div>
        <div>
            <label class="f25">كلمة المرور</label>
            <input class="f75" type="password" name="n2" placeholder="أدخل كلمة المرور">
        </div>
        <div>
            <input type="submit" value="تسجيل دخول">
        </div>
    </form>
    <a href="sign_up.php">ليس لدي حساب</a>
    <a href="us.php">هل نسيت كلمة المرور؟إتصل بنا</a>
  </div>
</center>
</body>
</html>