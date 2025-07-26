<?php
session_start();

include '../connect.php';

$n1 = $_POST['n1'];
$n2 = $_POST['n2']; 

$stmt = $conn->prepare("SELECT id, full_name, the_password, jop, is_temp_password FROM users WHERE the_user = ?");
$stmt->bind_param("s", $n1);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $stored_hashed_password = $row['the_password'];
    $is_temp_password = $row['is_temp_password']; 

    if (password_verify($n2, $stored_hashed_password)) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $n1;
        $_SESSION['full_name'] = $row['full_name'];
        $_SESSION['loggedin'] = true;
        $_SESSION['jop'] = $row['jop'];

        if ($is_temp_password == 1) {

            header('Location: http://localhost/online_library/pass.php?temp=1');
            exit();
        } else {
  
            header('Location: http://localhost/online_library/personal.php');
            exit();
        }
    } else {
        
        header('Location: http://localhost/online_library/login.php?error=1');
        exit();
    }
} else {
    
    header('Location: http://localhost/online_library/login.php?error=1');
    exit();
}
$stmt->close();
$conn->close();
?>