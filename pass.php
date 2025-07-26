<?php
 session_start();   
?>

<!DOCTYPE html>
<html>
<head>
    <title>تغيير كلمة المرور</title>
</head>
<body>
<center>
<?php
include 'css.css';
include 'list.php';
?>
  <div id="d5">
    <br><br>
    <h2>إعادة تعيين كلمة المرور </h2>
    <br><br>

    <?php
    $re = isset($_GET['re']) ? $_GET['re'] : null;
    if ($re == 1) {
       echo "<div style='color: red; margin-bottom: 15px; font-weight: bold;'>كلمة المرور الحالية خاطئة</div>";
    }
    if ($re == 2) {
        echo "<div style='color: red; margin-bottom: 15px; font-weight: bold;'>كلمة المرور الجديدة غير متطابقة</div>";
    }
    
    $temp_login = isset($_GET['temp']) ? $_GET['temp'] : null;
    if ($temp_login == 1) {
        echo "<div style='color: blue; margin-bottom: 15px; font-weight: bold;'>لقد سجلت الدخول بكلمة مرور مؤقتة. يرجى تعيين كلمة مرور جديدة لحسابك.</div>";
    }
    ?>

    <form action="fun/change.php" method="post">
        <div>
            <label class="f25"> كلمة المرور الحالية </label>
            <input class="f75" type="password" name="n1" placeholder="أدخل كلمة المرور الحالية" required>
        </div>
        <div>
            <label class="f25">كلمة المرور الجديدة</label>
            <input class="f75" type="password" name="n2" placeholder="أدخل كلمة مرور جديدة" required>
        </div>
        <div>
            <label class="f25">تأكيد كلمة المرور الجديدة</label>
            <input class="f75" type="password" name="n3" placeholder="أعد إدخال كلمة المرور الجديدة للتأكيد" required>
        </div>
        <div>
            <input type="submit" value="تغيير كلمة المرور">
        </div>
    </form>
  </div>
</center>
</body>
</html>