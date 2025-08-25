<?php
session_start();
if (isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
if (isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
}
    echo '<script>alert("Thank You\nYou are successfully logged out");window.location.href="../views/login.php";</script>';
?>