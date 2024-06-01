<?php

$ques_remove = false;
$check = false;
$remove = 0;

if (isset($_POST['delete'])) {

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "quizdb";
    $con = new mysqli($server, $username, $password, $database);

    if ($con->connect_error) {
        die("Connection to this database failed: " . $con->connect_error);
    }

    if (!isset($_COOKIE['remove'])) {
        $check = true;
    } else {
        $remove = intval($_COOKIE['remove']);  // Ensure $remove is an integer
    }

    if (deleteQuestion($con, $remove) && deleteOption($con, $remove) && deleteAnswer($con, $remove)) {
        $ques_remove = true;
    }

    $con->close();
}

function deleteQuestion($con, $remove)
{
    $sql = "DELETE FROM `questions` WHERE `opt_id` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $remove);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    }
    $stmt->close();
    return false;
}

function deleteOption($con, $remove)
{
    $sql = "DELETE FROM `options` WHERE `opt_id` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $remove);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    }
    $stmt->close();
    return false;
}

function deleteAnswer($con, $remove)
{
    $sql = "DELETE FROM `answer` WHERE `opt_id` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $remove);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    }
    $stmt->close();
    return false;
}
?>

