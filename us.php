<?php
 session_start();   
?>

<!DOCTYPE html>
<html>
<head>
    <title>المكتبة الالكترونية-مداد نابلس</title>
  <?php  
   include 'css.css';
   include 'list.php';
  ?>
</head>
<body>

    <center>
       <h1>مكتبة مِداد نابلس</h1>

        <div id="d5">
            <h2>اتصل بنا رأيك يهمنا</h2>
           
            <form style="width: 400px;" action="fun/add_us.php" method="post">
                <div>
                    <label class="f25">الاسم</label>
                    <input class="f75" type="text" name="the_name" placeholder="أدخل اسمك">
                </div>
                <div>
                    <label class="f25">الإيميل</label>
                    <input class="f75" type="email" name="e_mail" placeholder="أدخل بريدك الإلكتروني">
                </div>
                <div>
                    <label class="f25">العنوان</label>
                    <input class="f75" type="text" name="adress" placeholder="موضوع الرسالة">
                </div>
                <div>
                    <label class="f25">الرسالة</label>
                    <input class="f75" type="text" name="msg" placeholder="اكتب رسالتك هنا">
                </div>
                <div>
                    <input style="width: 100%;" type="submit" value="إرسال">
                </div>
            </form>
        </div>
    </center>
</body>
</html>