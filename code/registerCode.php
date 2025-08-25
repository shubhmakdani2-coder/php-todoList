<?php
require_once '../code/dbconfig.php';
session_start();
$n = "";
$a = "";
$g = "";
$e = "";
$p = "";
if (isset($_POST['reg'])) {
    $n = $_POST['username'];
    $a = $_POST['age'];
    $g = $_POST['gender'];
    $e = $_POST['email'];
    $p = $_POST['password'];
    if (empty($n) || empty($a) || empty($g) || empty($e) || empty($p)) {
        echo "<script>alert('Please fill out all fields!');</script>";
    } else {
        if ($a < 10){
            echo "<script>alert('Minimum age should be 10 years old');</script>";
            return;
        }
        if ($e == "admin@gmail.com"){
            echo "<script>alert('This email is already taken');</script>";
            return;
        }
        $queryString = "select * from users where email='$e'";
        $query = mysqli_query($con, $queryString);
        if (mysqli_num_rows($query) == 0) {
            $pa = md5($p);
            $res = "INSERT INTO users(uname, age, gender, email, password, usertype) VALUES ('$n', $a, '$g', '$e', '$pa', 1)";
            $result = mysqli_query($con, $res);
            if ($result) {
                 $sql2 = "select * from users where email='$e' and password='$pa'";
            $res2 = mysqli_query($con, $sql2);
            if (mysqli_num_rows($res2) == 1) {
                $user = mysqli_fetch_assoc($res2);
                $_SESSION['user'] = $user;
                header("location: ../views/todoview.php");
            }
            else {
                echo "<script>alert('query error');</script>";
            }
            }
        } else {
            echo "<script>alert('Sorry but this email is already taken !');</script>";
        }
    }
}



?>


