<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>رسائل الزوار</title>
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
            <form method="get" action="search_us.php">
                <input type="text" name="n1" value="<?php echo $n1 ?>">
                <input type="submit" value="بحث  ">
            </form>
        </div>
        <table>
            <tr>
                <th>رقم </th>
                <th>الاسم  </th>
                <th>البريد الألكتروني  </th>
                <th> الموضوع </th>
                <th> الرسالة</th>
                <th> حذف</th>
                
            </tr>
    <?php
    $no=0;
    $sql= "SELECT * FROM us WHERE the_name LIKE '%$n1%' or e_mail LIKE '%$n1%' or adress LIKE '%$n1%' or msg LIKE '%$n1%' ";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()) { 
       $no=$no+1;
       $id=$row['id'];    

    

    ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['the_name'] ?></td>
                <td><?php echo $row['e_mail'] ?></td>
                <td><?php echo $row['adress'] ?></td>
                <td><?php echo $row['msg'] ?></td>
                <td><a href="fun/del_us.php?re=<?php echo $id ?>">حذف</a></td>
            </tr>
<?php
}
?>

            </table>
    </center>
</body>
</html>