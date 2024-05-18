<?php
if(isset($_POST['submit'])){
    include "connection.php";
    $username = $_POST['username'];
    $email= $_POST['email']; 
    $password = trim($_POST['password']); 
    $cpassword = trim($_POST['cpassword']); 
    
    // Check if username already exists
    $stmt = $conn->prepare("SELECT * FROM user WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result_username = $stmt->get_result();
    $count_username = $result_username->num_rows;

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result_email = $stmt->get_result();
    $count_email = $result_email->num_rows;

    if($count_username == 0 && $count_email == 0){
        if($password === $cpassword){ // Use strict comparison (===)
            // Hash the password
            $hash = password_hash($password , PASSWORD_DEFAULT);
            // Insert user data into the database
            $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hash);
            $stmt->execute();
            // Redirect to login page
            header("Location: login.php");
            exit(); // Ensure that no more output is sent to the browser
        } else {
            echo '<script>
            alert("Passwords do not match!!!");
            window.location.href="signup.php";
            </script>';
        }
    } else {
        echo '<script>
        alert("User already exists!!");
        window.location.href = "index.php";
        </script>';
    }
}
?>


<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="form_container">
        <div class="overlay"></div>
        <div class="titlediv">
            <h1 class="title">REGISTER</h1>
            <span class="subtitle">THANKS FOR CHOOSING US!</span>
        </div>
        
        <?php if (!empty($error)) { echo '<p class="error">' . $error . '</p>'; } ?>

        <form method="POST"action="login.php">
            <div class="row grid">
                <div class="row">
                    <label for="username">User Name</label>
                    <input type="text" id="username" name="username" placeholder="Enter User Name" required>
                </div>
                <div class="row">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="row">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
                </div>
                <div class="row">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Your Password" required>
                </div>
                
                <div class="row">
                    <input type="submit" id="submitBtn" name="submit" value="Register">
                    <span >Have an account already? <a href="login.php">LOGIN</a></span>
                    <span>Go back to Home page? <a href="index.php">HOME</a></span>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

