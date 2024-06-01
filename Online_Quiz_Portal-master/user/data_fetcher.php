<?php
session_start();

function marksFetch()
{
    $sever = "localhost";
    $username = "root";
    $password = "";
    $database = "quiz";
    $conn = mysqli_connect($sever, $username, $password, $database);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_SESSION['email'];
    $sql = "select * from users where email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['marks'];
    }
    return 0;
}

function questionFetch($conn)
{
    $sql = "SELECT question FROM `questions`";
    $result = $conn->query($sql);
    $rows = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $rows[$i] = $row['question'];
        $i++;
    }
    return $rows;
}

function optionFetch($conn)
{
    $sql = "SELECT ques_option FROM `options`";
    $result = $conn->query($sql);
    $rows = array(array());
    $i = 0;
    $j = 0;
    while ($row = $result->fetch_assoc()) {
        if ($j == 4) {
            $j = 0;
            $i++;
            echo "<br>";
        }
        $rows[$i][$j] = $row['ques_option'];
        $j++;
    }
    return $rows;
}


function answerFetch($conn)
{
    $sql = "SELECT answer FROM `answer`";
    $result = $conn->query($sql);
    $rows = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $rows[$i] = $row['answer'];
        $i++;
    }
    return $rows;
}

// Connect to the database
$sever = "localhost";
$username = "root";
$password = "";
$database = "quizdb";
$conn = mysqli_connect($sever, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

optionFetch($conn);

// Query the database
$result = mysqli_query($conn, "SELECT question FROM questions");
// store $rows array in session

$question_json = json_encode(questionFetch($conn));
$option_json = json_encode(optionFetch($conn));
$answer_json = json_encode(answerFetch($conn));
$_SESSION['questions'] = $question_json;
$_SESSION['options'] = $option_json;
$_SESSION['answers'] = $answer_json;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp</title>
</head>

<body>

    <script>
        // Parse the JSON string into a JavaScript array

        const arraysModule = (function() {
            var questions = JSON.parse('<?php echo $_SESSION['questions']; ?>');
            var option = JSON.parse('<?php echo $_SESSION['options']; ?>');
            var answers = JSON.parse('<?php echo $_SESSION['answers']; ?>');

            return {
                getQuestions: function() {
                    return questions;
                },
                getOptions: function() {
                    return option;
                },
                getAnswers: function() {
                    return answers;
                },
            };
        })();

        // Expose the module through the window object
        window.arraysModule = arraysModule;
    </script>
</body>

</html>