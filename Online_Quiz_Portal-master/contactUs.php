<?php
$chk = false;
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $sever = "localhost";
    $username = "root";
    $password = "";
    $database = "quiz";
    $con = mysqli_connect($sever, $username, $password, $database);

    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
    if ($con->query($sql) == true) {
        $chk = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="contact.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">
                <img src="./Assets/logo-white.png" alt="" width="110" height="30" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item m-1">
                        <a class="nav-link text-light" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link text-light" href="./contactUs.php">Contact Us</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <button class="btn">
                        <a class="nav-link text-light " href="./user/SignUp.php">Sign Up</a>
                    </button>
                    <a class="nav-link btn d-inline-block" href="./Admin/AdminLogin.php">
                        <button class="btn btn-outline-light">Admin</button>
                    </a>
                </span>
            </div>
        </div>
    </nav>
    <section>
        <div class="section1">
            <img src="./Assets/contact.jpg" alt="Contact Us">
        </div>
        <div class="section2">
            <form action="./contactUs.php" method="post">
                <h1 class="mobile-heading" style="margin-bottom: 20px;">Contact Us</h1>
                <?php
                if (isset($_POST['submit']) && (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']))) {
                    echo '<p class="text-danger"><strong>Please fill all the fields.</strong></p>';
                } else if ($chk) {
                    echo '<p class="text-success"><strong>Thank you for contacting us.</strong></p>';
                }
                ?>
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message"></textarea>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</body>

</html>