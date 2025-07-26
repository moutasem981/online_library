<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>المستخدمين  </title>
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
            <form method="get" action="search_user.php">
                <input type="text" name="n1" value="<?php echo $n1 ?>">
                <input type="submit" value="بحث  ">
            </form>
        </div>
        <table>
            <tr>
                <th>رقم </th>
                <th>إسم المستخدم </th>
                <th>الاسم الكامل </th>
                <th>الدور الوظيفي </th>
                <th>البريد الالكتروني</th>
                <th>المرحلة الدراسية </th>
                <th>المدينة  </th>
            </tr>
    <?php
    $no=0;
    $sql= "SELECT * FROM users WHERE full_name LIKE '%$n1%' ";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()) { 
       $no=$no+1;    

    

    ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['the_user'] ?></td>
                <td><?php echo $row['full_name'] ?></td>
                <td>
                    <form action="fun/update_user.php" method="post">
                     <input type="hidden" name="id" value="<?php echo $row['id'] ?>"> 

                <select name="jop">
                    <option value="<?php echo $row['jop'] ?>"> <?php echo $row['jop'] ?></option>
                    <option value=" عضو ">عضو </option>
                    <option value=" مشرف "> مشرف</option>
                    

                </select>
                     <input type="submit" value="حفظ">
                   </form>
                </td>
   

                <td><?php echo $row['the_email'] ?></td>
                <td><?php echo $row['stage'] ?></td>
                <td><?php echo $row['city'] ?></td>
            </tr>
<?php
}
?>

            </table>
    </center>
</body>
</html>