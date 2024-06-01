<?php
$reset_record = false;
if (isset($_POST['reset'])) {
    $sever = "localhost";
    $username = "root";
    $password = "";
    $database = "quiz";
    $con = mysqli_connect($sever, $username, $password, $database);

    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }

    $sql = "UPDATE users SET marks = -1;";
    $result = $con->query($sql);
    if ($result) {
        $reset_record = true;
    }
    
}
