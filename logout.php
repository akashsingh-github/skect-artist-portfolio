<?php 
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['user_id']);
    echo '<script>alert(Log Out Successfully)</script>';
    header('location: index.php')
?>