<?php
require_once "../code/dbconfig.php";
session_start();
if (isset($_SESSION['admin'])){
        function getDataCount($sqlQuery) {
        global $con;
        $result = mysqli_query($con, $sqlQuery);

    if ($result) {
        $row = mysqli_fetch_array($result);
        return (int)$row[0]; // return the first column as integer
    } else {
        return 0; // in case of query error
    }
}
}
else {
    echo '<script>alert("Fraud\nDo not dare to bypass security........");window.location.href="../views/login.php";</script>';
}
?>