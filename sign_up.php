<!DOCTYPE html>
<html>
<head>
    <title>إنشاء حساب  </title>
   
</head>
<body>
<center>
      <?php 
    include 'css.css';
    include 'list.php';
    $re ='';
    if (isset($_GET['re'])){
    $re=$_GET['re'];
      }

    ?>
  <div id="d5">
    <br><br>
    
      <?php

     if ($re=='1') {
      echo "<span style='color: red; font-weight: bold;'>كلمة المرور غير متطابقة</span>";
    }
     elseif ($re=='2') { 
      echo "<span style='color: red; font-weight: bold;'>اسم المستخدم موجود بالفعل</span>";
}

  ?>

    <h2>إنشاء حساب  جديد </h2>
    <br><br>
    <form method="post" action="fun/add_user.php">
        <div>
            <label class="f25">اسم المستخدم</label>
            <input class="f75" type="text" name="the_user" placeholder="أدخل اسم المستخدم " autocomplete="off">
        </div>

        <div>
            <label class="f25"> الأسم الكامل </label>
            <input class="f75" type="text" name="full_name" placeholder="أدخل أسمك"  autocomplete="off">
        </div>

        <div>
            <label class="f25">البريد الإلكتروني</label>
            <input class="f75" type="email" name="the_email" placeholder="أدخل بريدك الإلكتروني"  autocomplete="off">
        </div>
        <div>
            <label class="f25">كلمة المرور</label>
            <input class="f75" type="password" name="the_password" placeholder="أدخل كلمة المرور">
        </div>
        <div>
            <label class="f25">تأكيد كلمة المرور</label>
            <input class="f75" type="password" name="Reset_Password" placeholder="أعد إدخال كلمة المرور للتأكيد">
        </div>
        <div>
            <label class="f25">المرحلة الدراسية</label>
            <select class="f75" name="stage"  autocomplete="off">
                
                <option value="إعدادي">إعدادي</option>
                <option value="ثانوي">ثانوي</option>
                <option value="طالب جامعة ">جامعي</option>
                <option value="دراسات عليا">دراسات عليا</option>
                <option value="أُوخرى">أخرى</option>
                
            </select>
        </div>
        <div>
            <label class="f25">المدينة</label>
            <input class="f75" type="text" name="city" placeholder="أدخل مدينتك  " autocomplete="off">
        </div>
        <div>
              <input type="submit" value=" إنشاء حساب">
        </div>
    </form>

    <a href="login.php">لدي حساب  </a>
  </div>
</center>
</body>
</html>
