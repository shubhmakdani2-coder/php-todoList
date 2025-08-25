<?php
require_once "../code/dbconfig.php";
session_start();
$e = "";
$p = "";
if (isset($_POST['log'])) {
    $e = $_POST['email'];
    $p = $_POST['password'];
    if (empty($e) || empty($p)) {
        echo "<script>alert('Please fill out all fields!');</script>";
    } else {
        if ($e == "admin@gmail.com" && $p == "admin"){
            $_SESSION['admin'] = "admin";
             header("location: ../views/adminPanel.php");
        }
        $queryString = "select * from users where email='$e'";
        $query = mysqli_query($con, $queryString);
        if (mysqli_num_rows($query) > 0) {
            $pa = md5($p);
            $sql2 = "select * from users where email='$e' and password='$pa'";
            $res2 = mysqli_query($con, $sql2);
            if (mysqli_num_rows($res2) == 1) {
                
                $user = mysqli_fetch_assoc($res2);
                if ($user['usertype'] == 1) {
                $_SESSION['user'] = $user;
                header("location: ../views/todoview.php");
                }
                else {
                    echo "<script>alert('Your account has been blocked by Admin. Please contact support.');</script>";
                }
                
            } else {
                echo "<script>alert('Sorry but email or password is incorrect!');</script>";
            }
        } else {
            echo "<script>alert('Sorry but no email exists!');</script>";
        }
    }
}
