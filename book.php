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
   include 'connect.php';
  ?>
</head>
<body>

    <center>
        <h1>مكتبة مِداد نابلس</h1>

        <div id="d2"> <h2>الكتب الأكثر استعارة</h2>


<div class="section-content"> <?php
$sql = "SELECT * FROM books limit 7 ";
$result = $conn->query($sql);
if ($result === false) {
    die('خطأ في استعلام SQL لجلب الكتب: ' . $conn->error);
}

while($row = $result->fetch_assoc()) {
?>
                <div class="card"> <img src="img/book/<?php echo $row['cover_photo']; ?>">
                    <h2><?php echo $row['book_name']; ?></h2>
                    <label><?php echo $row['author_name']; ?></label>
                    <label><?php echo $row['publishing_house_name']; ?></label>
                    <a href="
                              <?php
                                 
                                 if (isset($_SESSION['username'])) {
                                     echo 'fun/borrow_a_book.php?id=' . $row['id'];}
                                 else {
                                     echo 'login.php'; }
           ?>

                    "><button>إستعارة</button></a>
                </div>
<?php
 }
?>
            </div> </div>


    </center>
</body>
</html>