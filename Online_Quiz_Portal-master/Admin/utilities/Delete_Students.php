<?php

$stu_remove = false;
$check = false;
$removeStu = 0;

if (isset($_POST['deleteStu'])) {

    $sever = "localhost";
    $username = "root";
    $password = "";
    $database = "quiz";
    $con = mysqli_connect($sever, $username, $password, $database);

    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }


    if (!isset($_COOKIE['removeStu'])) {
        $check = true;
    } else {
        $removeStu = $_COOKIE['removeStu'];
    }
    $stu_remove = deleteStudent($con, $removeStu);
}



function deleteStudent($con, $remove)
{
    $sql = "DELETE FROM `users` WHERE `sno` = '$remove'";
    $result = $con->query($sql);
    if ($result == true) {
        return true;
    }
    return false;
}
