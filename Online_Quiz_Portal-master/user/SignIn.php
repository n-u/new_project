<?php
session_start();
$success = false;
$match = true;
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  $sever = "localhost";
  $username = "root";
  $password = "";
  $database = "quiz";
  $con = mysqli_connect($sever, $username, $password, $database);

  if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
  }



  $sql = "SELECT * FROM `users`";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      if ($row["email"] == $_POST["email"] && $row["password"] == $_POST["password"]) {
        $success = true;
        $_SESSION['email'] = $row['email'];
        header("Location: ./utilities/quiz.php");
      } else {
        $match = false;
      }
    }
  }

  if ($con->query($sql) == true) {

    // Flag for successful insertion
    $insert = true;
  } else {
    echo "ERROR: $sql <br> $con->error";
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
        <img src="../Assets/logo-white.png" alt="" width="110" height="30" class="d-inline-block align-text-top">
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
            <a class="nav-link text-light " href="./SignUp.php">Sign Up</a>
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
          <img src="../Assets/login-img.jpg" class="img-fluid" alt="Sample image" />
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="SignIn.php" method="post">
            <h1 class="mb-3 mobile-heading">Sign In</h1>
            <?php
            if (isset($match) && $match == false && isset($_POST['submit'])) {
              echo '<p class="text-danger"><strong>Invalid Credentials.</strong></p>';
            } else if (isset($success) && $success == false && isset($_POST['submit'])) {
              echo '<p class="text-success"><strong>Please fill all the fields.</strong></p>';
            }
            ?>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" name="email" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" name="password" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem" name="submit" value="Login" />
              <p class="small fw-bold mt-2 pt-1 mb-0">
                Don't have an account?
                <a href="./SignUp.php" class="link-danger">Register</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>