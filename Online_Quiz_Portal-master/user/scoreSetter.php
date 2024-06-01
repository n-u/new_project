<?php
// session_start();
$score_set = false;

$sever = "localhost";
$username = "root";
$password = "";
$database = "quiz";
$con = mysqli_connect($sever, $username, $password, $database);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}



function setScore($score, $con)
{
    $email = $_SESSION['email'];
    $sql = "UPDATE users SET marks = '$score' WHERE email = '$email'";
    $result = $con->query($sql);
    if ($result) {
        $score_set = true;
    }
}

if (isset($_COOKIE['score'])) {
    $score = $_COOKIE['score'];
    setScore($score, $con);
}
