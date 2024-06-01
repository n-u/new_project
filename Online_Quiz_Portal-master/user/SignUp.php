<?php
$duplicate = false;
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
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
  $password = $_POST['password'];

  $dup = "select * from users where email = '$email'";
  $dup = $con->query($dup);
  if ($dup->num_rows > 0) {
    $duplicate = true;
  } else {

    $sql = "INSERT INTO `users` (`name`, `email`, `password`, `marks`) VALUES ('$name', '$email', '$password', '-1')";

    if ($con->query($sql) == true) {

      // Flag for successful insertion
      $insert = true;
    } else {
      echo "ERROR: $sql <br> $con->error";
    }
  }

  // Close the database connection
  $con->close();
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quizlet.io</title>
  <link rel="stylesheet" href="../style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">
        <img src="../Assets/logo-white.png" alt="" width="110" height="30" class="d-inline-block align-text-top" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item m-1">
            <a class="nav-link text-light" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item m-1">
            <a class="nav-link text-light" href="../contactUs.php">Contact Us</a>
          </li>
        </ul>
        <span class="navbar-text">
          <button class="btn">
            <a class="nav-link text-light" href="./SignUp.php">Sign Up</a>
          </button>
          <a class="nav-link btn d-inline-block" href="../Admin/AdminLogin.php">
            <button class="btn btn-outline-light">Admin</button>
          </a>
        </span>
      </div>
    </div>
  </nav>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5 temp-image">
          <img src="../Assets/Signup-img.jpg" class="img-fluid" alt="Sample image" />
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="SignUp.php" method="post">
            <h1 class="mb-3 mobile-heading">Sign Up</h1>
            <?php
            if ($duplicate == true) {
              echo '<p class="text-danger"><strong>User already exists.</strong></p>';
            } else if (isset($insert) && $insert == true) {
              echo '<p class="text-success"><strong>Your account has been registered successfully.</strong></p>';
            } else if (isset($insert) && $insert == false) {
              echo '<p class="text-danger"><strong>Sorry, your account could not be registered.</strong></p>';
            } else if (isset($_POST["submit"]) && (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']))) {
              echo '<p class="text-danger"><strong>Please fill all the fields.</strong></p>';
            } else if (isset($exist) && $exist == true) {
              echo '<p class="text-danger"><strong>Account already exists.</strong></p>';
            }
            ?>

            <div class="form-outline mb-4">
              <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your name" name="name" />
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" name="email" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" class="form-control form-control-lg pass1" placeholder="Enter password" name="password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" />
              <ul>
                <li>
                  <p class="text-muted mb-0 sub">Passwors should contain at least 8 characters</p>
                </li>
                <li>
                  <p class="text-muted mb-0 sub">Passwors should contain at least 1 special character</p>
                </li>
                <li>
                  <p class="text-muted mb-0 sub">Passwors should contain at least 1 digit</p>
                </li>
                <li>
                  <p class="text-muted mb-0 sub">Passwors should contain at least 1 upper case character</p>
                </li>
              </ul>
            </div>
            <div class="text-center text-lg-start mt-4 pt-2">
              <input type="submit" class="btn btn-primary btn-lg" value="Sign Up" name="submit" />
              <p class="small fw-bold mt-2 pt-1 mb-0">
                Already have an account?
                <a href="./SignIn.php" class="link-danger">Sign In</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>