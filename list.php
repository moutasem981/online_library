<!DOCTYPE html>
<html>
<head>
    <title>المكتبة الالكترونية-مداد نابلس</title>
</head>
<body>
  <?php
  include 'css.css';
  ?>

    <div class="f1">
        <ul>
            <li class="nl">
                <ul>
                    
                    <li><a href="us.php">اتصل بنا</a></li>
                    <li><a href="plan.php">الخطة</a></li>
                    <li><a href="about.php">حول</a></li>
                    <li><a href="team.php">فريق العمل</a></li>
                    <li><a href="book.php">الكتب</a></li>
                    <li><a href="index.php">الرئيسية</a></li>
                    
                </ul>
            </li>

            <?php
          
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
             
                $display_name = htmlspecialchars($_SESSION['full_name'] ?? $_SESSION['username']);
            ?>
                <li class="message">مرحبا بك <?php echo $display_name; ?></li>
            <?php
            }
            ?>

            <li class="nr">
                <ul>
                <?php
                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                ?>
                    <li class="b11"><a href="login.php">تسجيل دخول</a></li>
                <?php
                } else {
                ?>
                    <li class="b11"><a href="personal.php"> الصفحة الشخصية</a></li>
                    <li class="b11"><a href="logout.php">تسجيل خروج </a></li>
                <?php
                }
                ?>
                </ul>
            </li>
        </ul>
    </div>
</body>
</html>