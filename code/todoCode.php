<?php
require_once '../code/dbconfig.php';
session_start();

$todoname = "";
if (isset($_POST['todo'])) {
    $todoname = trim($_POST['todoname']);
    if (!isset($_SESSION['user'])) {
        echo '<script>alert("You have to login first..."); window.location.href="../views/login.php";</script>';
        exit;
    }
    if (empty($todoname)) {
        echo '<script>alert("Todo name cannot be empty."); window.history.back();</script>';
        exit;
    }
    $userid =  $_SESSION['user']['uid'];
    $todoname_escaped = mysqli_real_escape_string($con, strtolower($todoname));

    // Check if exact todo exists (same name & user)
    $checkQuery = "SELECT tid, operation FROM todos 
                   WHERE LOWER(todoname) = '$todoname_escaped' 
                   AND uid = '$userid'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $row = mysqli_fetch_assoc($checkResult);

        if ($row['operation'] == 0) {
            // Active todo already exists
            echo '<script>alert("This todo already exists and is active."); window.history.back();</script>';
        } else {
            $tid = $row['tid'];

            // Reactivate todo
            $updateQuery = "UPDATE todos SET operation = 0 WHERE tid = '$tid'";
            if (mysqli_query($con, $updateQuery)) {
                if ($row['operation'] == 1) {
                    // Previously completed
                    header("location: ../views/todoview.php");
                } else {
                    // Previously deleted (operation=2)
                    header("location: ../views/todoview.php");
                }
            } else {
                echo '<script>alert("Failed to reactivate todo. Try again."); window.history.back();</script>';
            }
        }
    } else {
        // No duplicate found, insert new
        $insertQuery = "INSERT INTO todos (todoname, uid, operation) 
                    VALUES ('$todoname_escaped', '$userid', 0)";
        if (mysqli_query($con, $insertQuery)) {
            header("location: ../views/todoview.php");
        } else {
            echo '<script>alert("Failed to add todo. Please try again."); window.history.back();</script>';
        }
    }
}

if (isset($_POST['editTodo'])) {
    $et = trim($_POST['edittxttodo']);
    $tid = trim($_POST['tid']);
    $sql = "UPDATE todos set todoname = '$et' where tid = '$tid'";
    $result = mysqli_query($con, $sql);
}
if (isset($_POST['completeTodo'])) {
    $tid = trim($_POST['tid']);
    $sql = "UPDATE todos set operation = 1 where tid = '$tid'";
    $result = mysqli_query($con, $sql);
}
if (isset($_POST['deleteTodo'])) {
    $tid = trim($_POST['tid']);
    $sql = "UPDATE todos set operation = 2 where tid = '$tid'";
    $result = mysqli_query($con, $sql);
}

if (isset($_SESSION['user']['uid'])) {
    $userid =  $_SESSION['user']['uid'];
    $sql = "SELECT * FROM todos WHERE uid = '$userid' AND operation <> 2  ORDER BY dt DESC";
    $result = mysqli_query($con, $sql);
    $index = 1;
}
