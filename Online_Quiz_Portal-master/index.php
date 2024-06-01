<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quizlet.io</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="parent">
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
    <main class="d-flex flex-row justify-content-around align-items-center">
      <div class="container d-flex flex-row justify-content-evenly align-items-center">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center p-2 pt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <h1 class="heading">Wel</h1>
            <!-- <p class="">Quizlet.io is an online quiz portal that helps you to learn, practice and test your knowledge. With our intuitive and user-friendly interface, you can quickly create study sets and quizzes, practice and assess your learning progress.</p> -->
            <p>Welcome to Quizlet! Our website is the ultimate tool for students, teachers, and professionals looking to improve their knowledge and skills. With our interactive study sets, you can learn and retain information faster and more effectively. Join our community of millions of learners and start achieving your academic and career goals today!</p>
            <div class="d-flex justify-content-center justify-content-lg-start">
              <a href="./user/SignIn.php" class="btn text-light bg-primary rounded p-6">Log in</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img d-flex flex-row justify-content-center align-items-center temp-image" data-aos="zoom-in" data-aos-delay="200">
            <img src="assets/landing-img.jpg" class="img-fluid animated" alt="" width="400">
          </div>
        </div>
    </main>
  </div>
  <script src="index.js"></script>
</body>

</html>