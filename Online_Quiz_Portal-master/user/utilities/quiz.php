<?php
include("../data_fetcher.php");
include("../scoreSetter.php");

if (isset($_COOKIE['logout'])) {
    setcookie('logout', '', time() - 3600);
    header("Location: ../userLogout.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
        <div class="logo d-flex justify-content-between p-9 temp">
            <img src="../../Assets/logo-white.png" alt="logo" width="110" height="30">
            <a href="./quiz.php">
                <button type="button" class="btn btn-outline-light" id="logout-btn">
                    Logout
                </button>
            </a>
        </div>
    </nav>



    <!-- main content -->
    <main>
        <div class="tries">
            <div class="title text-center">
                You have attempted your quiz! <br>
                and got <span id='obtained text-bold'><?php echo marksFetch(); ?></span> out of
                <span class='total-ques'></span> marks
            </div>
            <div class="text-center" style='font-size:100px;'>&#128512;</div>
        </div>


        <div class="zero">
            <div class="title text-center">
                No questions available to show!
            </div>
            <div class="text-center" style='font-size:100px;'>&#128577;</div>
        </div>


        <div class="info">
            <div class="title">Rules for this Quiz</div>
            <div class="rules">
                <ul>
                    <li class="list">1. Each question will be of <span>15 seconds</span> duration.</li>
                    <li class="list">2. Four options will be given for one question.</li>
                    <li class="list">3. Obtained marks will be shown at the end.</li>
                </ul>
            </div>
            <div class="info-buttons">
                <button class="info-btn info-exit">
                    Back
                </button>
                <button class="info-btn info-con">
                    Continue
                </button>
            </div>
        </div>



        <div class="question">
            <div class="index">
                <div class="ques-state">
                    <span>Question #</span>
                    <span id='ques-no'>1</span>
                </div>
                <div class="time">
                    Time left: <span id='sec'>15</span>
                </div>
            </div>
            <div class="quiz-section">
                <h2 class="ques">What is html?</h2>
                <ul>
                    <li class="options">
                    </li>
                    <li class="options">
                    </li>
                    <li class="options">
                    </li>
                    <li class="options">
                    </li>
                </ul>
            </div>
            <div class="next">
                <div class='remaining'>
                    <span id="left">1</span>
                    <span>of</span>
                    <span class="total-ques"></span>
                    <span>Questions</span>
                </div>
                <button class="next-btn">Next Question</button>
            </div>
        </div>

        <div class="end">
            <div class="crown">
                <h2>Congratulations!!!</h2>
            </div>
            <div class="text">
                You have completed your quiz.<br>You got <span id='obtained'>0</span> out of
                <span class='total-ques'></span> marks
            </div>
            <div class="end-buttons">
                <form action="./quiz.php" method="post">
                    <button class="info-btn info-exit exit-quiz">Exit</button>
                </form>
            </div>
        </div>

    </main>
    <script>
        let tries_user = document.querySelector('.tries');
        let info_user = document.querySelector('.info');
        $temp = <?php echo json_encode(marksFetch()); ?>;
        if ($temp != -1) {
            tries_user.style.display = 'block';
            info_user.style.display = 'none';
        }
    </script>
    <script src="index.js"></script>
</body>

</html>