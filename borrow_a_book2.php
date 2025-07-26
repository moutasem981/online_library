<?php
session_start();

include 'connect.php';
include 'css.css';
include 'list.php';

$loggedInUsername = '';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];
} else {
    echo "<center><h3>الرجاء تسجيل الدخول لعرض طلبات الاستعارة الخاصة بك.</h3></center>";
    exit(); 
}

$n1_search_term = '';
if (isset($_GET['n1'])) {
    $n1_search_term = mysqli_real_escape_string($conn, htmlspecialchars($_GET['n1']));
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>طلبات الاستعارة</title>
    <style type="text/css">
        * {
            direction: rtl;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: right;
        }

        tr:nth-child(even) {
          background-color: #f2f2f2;
        }
        th{
            background-color: #04aa6d;
            color: white;

        }
    </style>
</head>
<body>
    <center>
        <div style="width: 500px; margin-top: 100px;">
            <form method="get" action="borrow_a_book2.php">
                <input type="text" name="n1" value="<?php echo htmlspecialchars($n1_search_term) ?>">
                <input type="submit" value="بحث  ">
            </form>
        </div>
        <table>
            <tr>
                <th>رقم الطلب</th>
                <th>اسم المستخدم</th>
                <th>اسم الكتاب</th>
                <th>وقت الطلب</th>
                <th>ملاحظات</th>
                <th>تاريخ الاستعارة</th>
                <th>تاريخ الإرجاع</th>
                <th>حالة الطلب</th>
                <th>الضمان</th>
            </tr>
    <?php
    $no = 0;
    $sql = "SELECT b.id, b.the_book, b.the_user, b.order_time, b.order_status, b.notes, b.borrowing_date, b.replay_date, b.security, bk.book_name
            FROM borrow_a_book b
            JOIN books bk ON b.the_book = bk.id
            WHERE b.the_user = '$loggedInUsername'";

    if (!empty($n1_search_term)) {
        $sql .= " AND (bk.book_name LIKE '%$n1_search_term%' OR b.order_status LIKE '%$n1_search_term%' OR b.notes LIKE '%$n1_search_term%')";
    }

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $no++;
            $the_day = strtotime(date('Y-m-d'));
            $replay_date = strtotime($row['replay_date']);
            $order_status = htmlspecialchars($row['order_status']);
    ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo htmlspecialchars($row['the_user']); ?></td>
                <td><?php echo htmlspecialchars($row['book_name']); ?></td>
                <td><?php echo htmlspecialchars($row['order_time']); ?></td>
                <td><?php echo htmlspecialchars($row['notes']); ?></td>
                <td><?php echo htmlspecialchars($row['borrowing_date']); ?></td>
                <td <?php if ($the_day >= $replay_date && $order_status == 'طرف الطالب') { ?>style="background-color: red;"<?php } ?>>
                    <?php echo htmlspecialchars($row['replay_date']); ?>
                </td>
                <td><?php echo $order_status; ?></td>
                <td><?php echo htmlspecialchars($row['security']); ?></td>
            </tr>
    <?php
        }
    } else if (!empty($loggedInUsername)) {
        echo "<tr><td colspan='9'><center>لا توجد طلبات استعارة خاصة بك.</center></td></tr>";
    } else {
        echo "<tr><td colspan='9'><center>يرجى تسجيل الدخول لعرض طلبات الاستعارة.</center></td></tr>";
    }
    ?>
            </table>
    </center>
</body>
</html>