<?php

$_SESSION['admin_duplicate'] = false;
$admin_add = false;

if (isset($_POST['add'])) {

    $sever = "localhost";
    $username = "root";
    $password = "";
    $database = "quiz";
    $con = mysqli_connect($sever, $username, $password, $database);

    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $password = $_POST['password'];

    if (addAdmin($con, $name, $password)) {
        $_SESSION['duplicate'] = true;
    }
}


function addAdmin($con,  $name, $password)
{

    $dup = "select * from admin where name = '$name'";
    $dup = $con->query($dup);
    if ($dup->num_rows > 0) {
        $admin_duplicate = true;
    } else {
        $sql = "INSERT INTO `admin` (`name`, `password`) VALUES ('$name', '$password')";


        if ($con->query($sql) == true) {
            return true;
        }
        return false;
    }
}
