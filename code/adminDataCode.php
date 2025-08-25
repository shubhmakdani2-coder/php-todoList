<?php
require_once "../code/dbconfig.php";
session_start();
if (isset($_SESSION['admin'])) {
    $sql = "SELECT * FROM users where usertype = '1' ORDER BY dt DESC";
    $result = mysqli_query($con, $sql);
    $count = "SELECT COUNT(*) FROM users where usertype = '1' ORDER BY dt DESC";
    $countResult = mysqli_query($con, $count);

    $sql2 = "SELECT * FROM users where usertype = '2' ORDER BY dt DESC";
    $result2 = mysqli_query($con, $sql2);
    $count2 = "SELECT COUNT(*) FROM users where usertype = '2' ORDER BY dt DESC";
    $countResult2 = mysqli_query($con, $count2);

    if (isset($_POST['blockuser'])) {
        $tid = trim($_POST['uid']);
        $sqlBlock = "UPDATE users set usertype = 2 where uid = '$tid'";
        $result = mysqli_query($con, $sqlBlock);
        header("location: ../views/AdminData.php");
    }
    if (isset($_POST['unblockuser'])) {
        $tid = trim($_POST['uid']);
        $sqlBlock = "UPDATE users set usertype = 1 where uid = '$tid'";
        $result = mysqli_query($con, $sqlBlock);
        header("location: ../views/AdminData.php");
    }
} else {
    echo '<script>alert("Fraud\nDo not dare to bypass security........");window.location.href="../views/login.php";</script>';
}
