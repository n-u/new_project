<?php

include('./utilities/Add_Question.php');
include('./utilities/Delete_Question.php');
include('./utilities/Delete_Students.php');
include('./utilities/Reset_Record.php');

if (!isset($_SESSION['name'])) {
    header("Location: AdminLogin.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizlet.io</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        main {
            background-color: #f8f8f8;
            display: flex;
            flex-direction: row;
            overflow: hidden;
        }

        aside {
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
            width: 30%;
            height: 100%;
            padding: 10px;
            background-color: #0D6EFD;
        }

        section {
            display: none;
            width: 70%;
            height: 100%;
            padding: 10px;
            background-color: #F0F0F0;
        }

        .section1 {
            display: block;
        }

        .section2 {
            display: none;
        }

        .section1 {
            display: none;
        }

        .section4 {
            display: none;
        }

        .section5 {
            display: none;
        }

        #btn1 {
            background-color: #fff;
            color: black;
        }

        .section3-child,
        .section1-child,
        .section4-child,
        .section5-child {
            width: 100%;
        }

        .section3-child li,
        .section1-child li,
        .section4-child li,
        .section5-child li {
            list-style-type: none;
            background-color: #fff;
            margin-top: 10px;
            padding: 7px;
            border-radius: 10px;
        }

        .section3-child li h4,
        .section1-child li h4,
        .section4-child li h4,
        .section5-child li h4 {
            display: inline-block;
            margin-left: 5px;
        }

        .section3-child ul,
        .section1-child ul,
        .section4-child ul,
        .section5-child ul {
            height: 360px;
            overflow: auto;
            padding: 10px;
        }

        .section3-child li h5,
        .section1-child li h5,
        .section4-child li h5,
        .section5-child li h5 {
            display: inline-block;
            margin-left: 5px;
            margin-right: 5px;
        }

        #filter {
            background-color: #0D6EFD;
            color: #fff;
            outline: none;
            border: none;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../Assets/logo-white.png" alt="" width="110" height="30" class="d-inline-block align-text-top" />
            </a>
            <h2 class="nav-item text-light mobile-temp">Admin Dashbaord</h2>
            <a class="nav-link text-dark" href="./adminLogout.php">
                <button class="btn btn-outline-light">
                    Logout
                </button>
            </a>
        </div>
    </nav>
    <main class="main-sec">
        <aside class="aside-sec">
            <div class="container p-3 d-flex justify-content-center align-items-center flex-column">
                <i class='fas fa-user-lock' style='font-size:25px; color: #fff'></i>
                <h2 class="text-light"> Hey, <?Php echo $_SESSION['name'] ?></h2>

            </div>
            <h2 class="text-center d-inline-block p-3 btn btn-lg btn-outline-light" id="btn1">View Records</h2>
            <h2 class="text-center d-inline-block p-3 btn btn-lg btn-outline-light" id="btn2">Add questions</h2>
            <h2 class="text-center d-inline-block p-3 btn btn-lg btn-outline-light" id="btn3">Delete questions</h2>
            <h2 class="text-center d-inline-block p-3 btn btn-lg btn-outline-light" id="btn4">View Registered students</h2>
            <h2 class="text-center d-inline-block p-3 btn btn-lg btn-outline-light" id="btn5">Delete Students</h2>
        </aside>


        <section class="section1" style="display: block;">
            <h1 class="text-center mb-5">View Records</h1>
            <div class="d-flex justify-content-between" style="padding: 10px;">
                <form action="./AdminDashboard.php" method="post">
                    <button type="submit" name="reset" class="btn btn-primary">Reset Record</button>
                </form>
                <form action="./AdminDashboard.php" method="post">
                    <select name="filter" id="filter" onchange="this.form.submit()">
                        <option value="">Choose filter</option>
                        <option value="all">All</option>
                        <option value="top10">Top 10</option>
                        <option value="unattempted">Unattempted</option>
                    </select>
                </form>
            </div>
            <div>
                <?php
                if (isset($reset_record) && $reset_record == true) {
                    echo '<p class="text-success"><strong>Records has been reset successfully.</strong></p>';
                }
                ?>
            </div>


            <div class="section1-child">
                <ul>
                    <?php
                    $host = 'localhost';
                    $user = 'root';
                    $password = '';
                    $dbname = 'quiz';

                    $conn = mysqli_connect($host, $user, $password, $dbname);
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    if (isset($_COOKIE['selected'])) {
                        $selected = $_COOKIE['selected'];
                    }

                    $s_sql = "SELECT * FROM users";

                    if ($selected == "all") {
                        $s_sql = "SELECT * FROM users";
                    } else if ($selected == "top10") {
                        $s_sql = "SELECT * FROM users ORDER BY marks DESC LIMIT 10";
                    } else if ($selected == "unattempted") {
                        $s_sql = "SELECT * FROM users WHERE marks = -1";
                    }
                    $result = mysqli_query($conn, $s_sql);
                    mysqli_close($conn);
                    $i = 1;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo
                            "<li class='d-flex justify-content-between'>" .
                                "<div style='display: inline-block'>" .
                                " <h5>" . $i++ . "." . "</h5>" .
                                "<h4>" . $row['name'] . "</h4>" .
                                "</div>" .
                                "<h4>" . "Score: " . $row['marks'] . "</h4>" .
                                "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </section>




        <!-- Section 2 -->

        <section class="section2">
            <h1 class="text-center">Add Questions</h1>
            <form action="AdminDashboard.php" method="post">
                <?php
                if ($_SESSION['duplicate'] == true) {
                    echo '<p class="text-danger"><strong>Question already exists.</strong></p>';
                } else if (isset($insert) && $insert == true) {
                    echo '<p class="text-success"><strong>Your question has been added successfully.</strong></p>';
                } else if (isset($_POST["submit"]) && (empty($_POST['question']) && empty($_POST['option1']) && empty($_POST['option2']) && empty($_POST['option3']) && empty($_POST['option4']) && !isset($_POST['optradio']))) {
                    // } else if (isset($_POST["submit"]) && (empty($_POST['question']))) {
                    echo '<p class="text-danger"><strong>Please fill all the fields.</strong></p>';
                } else if (!isset($_POST['optradio']) && isset($_POST["submit"])) {
                    echo '<p class="text-danger"><strong>Please select right answer.</strong></p>';
                }
                ?>
                <!-- Question -->
                <div class="form-outline mb-4">
                    <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your question here" name="question" />
                </div>

                <!-- Option1 input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="A." name="option1" />
                </div>

                <!-- Option2 input -->
                <div class="form-outline mb-3">
                    <input type="text" id="form3Example4" class="form-control form-control-lg pass1" placeholder="B." name="option2" />
                </div>

                <!-- Option3 input -->
                <div class="form-outline mb-3">
                    <input type="text" id="form3Example4" class="form-control form-control-lg pass1" placeholder="C." name="option3" />
                </div>

                <!-- Option4 input -->
                <div class="form-outline mb-3">
                    <input type="text" id="form3Example4" class="form-control form-control-lg pass1" placeholder="D." name="option4" />
                </div>

                <div class="d-flex flex-row justify-content-around">

                    <h4>Select the right option.</h4>
                    <div>
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="1">
                        <label class="form-check-label" for="radio1">A</label>
                    </div>
                    <div>
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="2">
                        <label class="form-check-label" for="radio1">B</label>
                    </div>
                    <div>
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="3">
                        <label class="form-check-label" for="radio1">C</label>
                    </div>
                    <div>
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="4">
                        <label class="form-check-label" for="radio1">D</label>
                    </div>
                </div>
                <!-- Submit button -->
                <div class="text-center text-lg-start mt-4 pt-2 d-flex justify-content-center align-items-center">
                    <input type="submit" class="btn btn-primary btn-lg m-auto disable" value="Submit" name="submit" />
                </div>
            </form>
        </section>




        <!-- Section 3 -->

        <section class="section3">
            <h1 class="text-center mb-5">Delete Questions</h1>
            <div class="section3-child">
                <form action="AdminDashboard.php" method="post">
                    <?php
                    if ($check == true && !isset($_POST['remove'])) {
                        echo '<p class="text-danger"><strong>Please select a question to remove.</strong></p>';
                    } else if ($ques_remove == true) {
                        echo '<p class="text-success"><strong>Question removed successfully.</strong></p>';
                    }
                    ?>
                    <ul>
                        <?php
                        $host = 'localhost';
                        $user = 'root';
                        $password = '';
                        $dbname = 'quizdb';

                        $conn = mysqli_connect($host, $user, $password, $dbname);
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM questions";
                        $result = mysqli_query($conn, $sql);
                        mysqli_close($conn);
                        $i = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<li>" .
                                    '<input type="radio" class="form-check-input mt-2" id="radio1" name="remove" value="' . $row['sno'] . '">' .
                                    '<h5>' . $i++ . "." . '</h5>' .
                                    '<h4>' . $row['question'] . '</h4>'
                                    . "</li>";
                            }
                        }
                        ?>
                    </ul>
                    <div class="text-center text-lg-start d-flex justify-content-center align-items-center">
                        <input type="submit" class="btn btn-primary btn-lg m-auto" value="Delete" name="delete" />
                    </div>
                </form>
            </div>
        </section>


        <!-- section 4 -->


        <section class="section4">
            <h1 class="text-center mb-5">View Regsitered Students</h1>
            <div class="section4-child">
                <ul>
                    <?php
                    $host = 'localhost';
                    $user = 'root';
                    $password = '';
                    $dbname = 'quiz';

                    $conn = mysqli_connect($host, $user, $password, $dbname);
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    $i = 1;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo
                            "<li class='d-flex justify-content-between'>" .
                                "<div>" .
                                " <h5>" . $i++ . "." . "</h5>" .
                                "<h4>" . $row['name'] . "</h4>" .
                                "</div>" .
                                "<h4>" . "Joined on: " . $row['joined_on'] . "</h4>" .
                                "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </section>


        <!-- section 5-->

        <section class="section5">
            <h1 class="text-center mb-5">Delete Students</h1>
            <div class="section5-child">
                <form action="AdminDashboard.php" method="post">
                    <?php
                    if ($check == true && !isset($_POST['removeStu'])) {
                        echo '<p class="text-danger"><strong>Please select a student to remove.</strong></p>';
                    } else if ($stu_remove == true) {
                        echo '<p class="text-success"><strong>Student removed successfully.</strong></p>';
                    }
                    ?>
                    <ul>
                        <?php
                        $host = 'localhost';
                        $user = 'root';
                        $password = '';
                        $dbname = 'quiz';

                        $conn = mysqli_connect($host, $user, $password, $dbname);
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($conn, $sql);
                        mysqli_close($conn);
                        $i = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<li class='d-flex justify-content-between mobile-li'>" .
                                    "<div class='mobile-div'>" .
                                    '<input type="radio" class="form-check-input mt-2" id="radio1" name="removeStu" value="' . $row['sno'] . '">' .
                                    '<h5>' . $i++ . "." . '</h5>' .
                                    '<h4>' . $row['name'] . '</h4>' .
                                    "</div>" .
                                    "<h4>" . "email: " . $row['email'] . "</h4>" .
                                    "</li>";
                            }
                        }
                        ?>
                    </ul>
                    <div class="text-center text-lg-start d-flex justify-content-center align-items-center">
                        <input type="submit" class="btn btn-primary btn-lg m-auto" value="Delete" name="deleteStu" />
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script src="./admin.js"></script>
    <script src="./utilities/delStudent.js"></script>
</body>

</html>