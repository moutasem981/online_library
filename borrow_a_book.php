<?ph<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>طلبات الاستعارة  </title>
    <style type="text/css">
        * {
            direction: rtl;
        }

        table {
            width: 100%;
        }

        tr, td {
            padding: 10px;
        }

        tr:nth-child(even) {
          background-color: #f2f2f2;
        }
        th{
            background-color: #04aa6d;

        }
    </style>
</head>
<body>
    <?php
    include 'connect.php'; 
    include 'css.css';
    include 'list.php'; 
    $n1 = ''; 
    if (isset($_GET['n1'])) { 
        $n1 = $_GET['n1'];
    }
    ?>

    <center>
        <div style="width: 500px; margin-top: 100px;">
            <form method="get" action="borrow_a_book.php">
                <input type="text" name="n1" value="<?php echo htmlspecialchars($n1) ?>">
                <input type="submit" value="بحث  ">
            </form>
        </div>
        <table>
            <tr>
                <th>رقم </th>
                <th> الإسم</th>
                <th>الكتاب  </th>
                <th>وقت الطلب  </th>
                <th>حالة الطلب  </th>
                <th> ملاحظات </th>
                <th>تاريخ الإستعارة  </th>
                <th> تاريخ الاعادة </th>
                <th> الضمان </th>
                <th> حفظ </th>
            </tr>
    <?php
    $no=0;
    $n1_escaped = mysqli_real_escape_string($conn, $n1); 
    $sql= "SELECT * FROM borrow_a_book WHERE the_user LIKE '%$n1_escaped%' "; 
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()) { 
       $no=$no+1;    
    $order_status=$row['order_status'];
    $the_day=(new \DateTime())->format('Y-m-d');
    $replay_date=$row['replay_date'];
    

    ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo htmlspecialchars($row['the_user']) ?></td>
                <td><?php echo htmlspecialchars($row['the_book']) ?></td>
                <td><?php echo htmlspecialchars($row['order_time']) ?></td>

                <form action="fun/update_borrow_a_book.php" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']) ?>">
                <input type="hidden" name="redirect_to" value="borrow_a_book.php"> <td>
                      

                <select name="order_status">
                    <option value="<?php echo htmlspecialchars($row['order_status']) ?>"> <?php echo htmlspecialchars($row['order_status']); ?></option>
                    <option value="طلب">طلب</option>
                    <option value="طرف الطالب">طرف الطالب </option>
                    <option value="تم الإرجاع "> تم الإرجاع</option>
                    <option value="تالف">تالف </option>
                    

                </select>

                </td>
                <td><input type="" name="notes" value="<?php echo htmlspecialchars($row['notes']); ?>"></td>
                <td><input type="date" name="borrowing_date" value="<?php echo htmlspecialchars($row['borrowing_date']) ;?>"></td>
                <td
                <?php
                     if ($the_day>=$replay_date && $order_status=='طرف الطالب') { 
                ?>
                          style="background-color: red;"
                <?php 
                     }

                 ?>
               

                ><input type="date" name="replay_date" value="<?php echo htmlspecialchars($row['replay_date']) ;?>"></td>
                <td><input type="" name="security" value="<?php echo htmlspecialchars($row['security']); ?>"></td>
                <td> <input type="submit" value="حفظ">
                </td>
                </form>
            </tr>
<?php
}
?>

            </table>
    </center>
</body>
</html>
</html>