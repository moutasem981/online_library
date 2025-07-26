<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>الصفحة الشخصية</title>
    <?php
    include 'css.css';
    include 'list.php';
    ?>
</head>
<body class="ad1">
    <div class="ads">
        <a href="pass.php"><button>تغيير كلمة المرور</button></a>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_SESSION['jop'])) {
            $jop = $_SESSION['jop']; 

            
            if ($jop == 'مشرف') {
        ?>
            <a href="new_book.php"><button>إضافة كتاب جديد</button></a>
            <a href="search_book.php"><button>الكتب</button></a>
            <a href="borrow_a_book.php"><button>طلبات الإستعارة  </button></a>
            <a href="search_user.php"><button>المستخدمين</button></a>
            <a href="search_us.php"><button>الرسائل </button></a>
            <a href="set_temp_password.php"><button> تغير كلمة المرور لمستخدم</button></a>
            
        <?php
        }
        }
        ?>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_SESSION['jop'])) {
            $jop = $_SESSION['jop']; 

            
            if ($jop == 'عضو') {
        ?>
           <a href="book.php"><button>إستعارة الكتب  </button></a>
           <a href="borrow_a_book2.php"><button>طلب الإستعارة </button></a>

        <?php
        }
        }
        ?>
    </div>
</body>
</html>