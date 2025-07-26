<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
    header('Location: http://localhost/online_library/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>إضافة كتاب جديد</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
    <center>
        <?php
        include 'list.php';
        $re = isset($_GET['re']) ? $_GET['re'] : '';
        ?>

        <div id="d5">
        
            <h2>إضافة كتاب جديد</h2>

            <form  method="post" action="fun/add_book.php" enctype="multipart/form-data">
                <div>
                    <?php
                    if ($re == 2) {
                        echo '<p style="color: green;">تم إضافة الكتاب بنجاح</p>';
                    } elseif ($re == 1) {
                        echo '<p style="color: red;">الكتاب مضاف مسبقًا</p>';
                    }
                    ?>
                </div>

                <div>
                    <label class="f25">اسم الكتاب</label>
                    <input class="f75" type="text" name="book_name" placeholder="ادخل اسم الكتاب">
                </div>

                <div>
                    <label class="f25">اسم المؤلف</label>
                    <input class="f75" type="text" name="author_name" placeholder="ادخل اسم المؤلف">
                </div>

                <div>
                    <label class="f25">اسم دار النشر</label>
                    <input class="f75" type="text" name="publishing_house_name" placeholder="ادخل اسم دار النشر">
                </div>
                
                <div>
                    <label class="f25">الرقم المرجعي</label>
                    <input class="f75" type="text" name="reference_number" placeholder="ادخل الرقم المرجعي">
                </div>
                
                <div>
                    <label class="f25">عدد النسخ</label>
                    <input class="f75" type="text" name="count_book" placeholder="ادخل عدد النسخ">
                </div>
                
                <div>
                    <label class="f25">صورة الغلاف</label>
                    <input class="f75" type="file" name="cover_photo">
                </div>

                <div>
                    <input type="submit" name="value" value="إضافة كتاب">
                </div>

            </form>
        </div>
    </center>
</body>
</html>