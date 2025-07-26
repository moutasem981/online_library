<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
    header('Location: http://localhost/online_library/login.php');
    exit();
}

include '../connect.php';

$book_name = $_POST['book_name'];
$author_name = $_POST['author_name'];
$publishing_house_name = $_POST['publishing_house_name'];
$reference_number = $_POST['reference_number'];
$count_book = $_POST['count_book'];

$sql = "SELECT * FROM books WHERE reference_number = '$reference_number'";
$result = $conn->query($sql);
$count = $result->num_rows;

if ($count == 1) {
    header('Location: http://localhost/online_library/new_book.php?re=1');
    exit();
} else {
    $cover_photo = $_FILES['cover_photo']['name'];
    $filetmp = $_FILES['cover_photo']['tmp_name'];

    $file_extension = pathinfo($cover_photo, PATHINFO_EXTENSION);
    $cover_photo_new_name = date("mdYHis") . uniqid() . '.' . $file_extension;
    
    $upload_file_dir = '.././img/book/';

    if (!file_exists($upload_file_dir)) {
        mkdir($upload_file_dir, 0777, true);
    }

    $destination = $upload_file_dir . $cover_photo_new_name;

    if (move_uploaded_file($filetmp, $destination)) {
        $sql2 = "INSERT INTO books (book_name, author_name, publishing_house_name, reference_number, cover_photo, count_book) VALUES ('$book_name', '$author_name', '$publishing_house_name', '$reference_number', '$cover_photo_new_name', '$count_book')";
        $result2 = $conn->query($sql2);

        if ($result2) {
            header('Location: http://localhost/online_library/new_book.php?re=2');
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }
    exit();
}
?>