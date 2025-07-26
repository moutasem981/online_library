<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> الكتب </title>
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
    $n1 = $_GET['n1'];
    ?>

    <center>
        <div style="width: 500px; margin-top: 100px;">
            <form method="get" action="search_book.php">
                <input type="text" name="n1" value="<?php echo $n1 ?>">
                <input type="submit" value="بحث  ">
            </form>
        </div>
        <table>
            <tr>
                <th>الرقم </th>
                <th>إسم الكتاب  </th>
                <th>إسم المؤلف  </th>
                <th>إسم دار النشر  </th>
                <th>الرقم المرجعي </th>
                <th>صورة الغلاف  </th>
                <th>عدد النسخ  </th>
                <th> طلب </th>
                <th> طرف الطالب </th>
                <th> تم الإرجاع </th>
                <th>التالف   </th>
                <th>المتاح   </th>
            </tr>
<?php
$no = 0;
$sql = "SELECT * FROM books WHERE book_name LIKE '%$n1%' or 
                                  author_name LIKE '%$n1%' or 
                                  publishing_house_name LIKE '%$n1%' or 
                                  reference_number LIKE '%$n1%'";

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $no = $no+1;
    $id=$row['id'];
?>
<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $row['book_name']; ?></td>
    <td><?php echo $row['author_name']; ?></td>
    <td><?php echo $row['publishing_house_name']; ?></td>
    <td><?php echo $row['reference_number']; ?></td>
    <td>
        <a href="img/book/<?php echo $row['cover_photo']; ?>">
            <img style="width: 50px; height: 50px;" src="img/book/<?php echo $row['cover_photo']; ?>">
        </a>
    </td>
    <td><?php echo $row['count_book']; ?></td>
    <td><?php 
            $sql1= "SELECT * FROM borrow_a_book WHERE the_book = '$id' and order_status='طلب' ";
            $result1=$conn->query($sql1);
            $count1=$result1->num_rows;
            echo $count1;

     ?></td>
    <td><?php 
            $sql2= "SELECT * FROM borrow_a_book WHERE the_book = '$id' and order_status='طرف الطالب' ";
            $result2=$conn->query($sql2);
            $count2=$result2->num_rows;
            echo $count2;

     ?></td>
    <td><?php
            $sql3= "SELECT * FROM borrow_a_book WHERE the_book = '$id' and order_status='تم الإرجاع ' ";
            $result3=$conn->query($sql3);
            $count3=$result3->num_rows;
            echo $count3;
     ?></td>
    <td><?php 
            $sql4= "SELECT * FROM borrow_a_book WHERE the_book = '$id' and order_status='تالف  ' ";
            $result4=$conn->query($sql4);
            $count4=$result4->num_rows;
            echo $count4;

     ?></td>
    <td><?php echo $row['count_book']-$count2-$count4 ?></td>
</tr>
<?php
} 
?>
            </table>
    </center>
</body>
</html>