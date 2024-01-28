<?php
require 'connect.php';
$errorMsg = '';
// session_start();
// if (!isset($_SESSION["privilleged"])) {
//     header("Location: login.php");
//     exit();
// }

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['eemail'];
    $password = $_POST['password'];
    $national = $_POST['national'];

    // Check if the email or national already exists
    $checkExisting = "SELECT * FROM user WHERE eemail = :email OR national = :national";
    $checkStatement = $pdo->prepare($checkExisting);
    $checkStatement->bindParam(":email", $email, PDO::PARAM_STR);
    $checkStatement->bindParam(":national", $national, PDO::PARAM_STR);
    $checkStatement->execute();

    if ($checkStatement->rowCount() > 0) {
        $errorMsg  = "Error: Email or national number already exists. Please choose a different one.";
    } else {
        // Proceed with the signup if email and national are unique
        $sql = "INSERT INTO user (username, eemail, password, national) VALUES (:username, :eemail, :password, :national)";
        $statement = $pdo->prepare($sql);

        $statement->bindParam(":username", $username, PDO::PARAM_STR);
        $statement->bindParam(":eemail", $email, PDO::PARAM_STR);
        $statement->bindParam(":password", $password, PDO::PARAM_STR);
        $statement->bindParam(":national", $national, PDO::PARAM_INT);

        $statement->execute();
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="icon" href="jordangov.jpg">
    <link rel="stylesheet" href="overall.css">
</head>

<body class="bodysignup">
    <form action="" method="post" class="formsign">
        <img src="jordangov.jpg" class="imagesign"><br>
        <label for="n">Your Name</label>
        <input type="text" name="username" id="n" required class="inputsign">
        <label for="e">Your Email</label>
        <input type="email" name="eemail" id="e" required class="inputsign">
        <label for="new-password">Password</label>
        <input type="password" id="password" name="password" required class="inputsign">
        <label for="c">Your national number</label>
        <input type="text" name="national" id="c" required class="inputsign">


        <span class="errormessage" id="errormessage"><?php echo $errorMsg; ?></span>

        <button type="submit" class="h button" name="signup" id="boot">Signup</button>
        <button type="button" class="h button" onclick="redirectToLoginPage()" id="boot">Have an account?</button>
    </form>

    <script>
        function redirectToLoginPage() {
            window.location.href = "login.php";
        }

        // You can set the error message using JavaScript
        const errorMessageSpan = document.getElementById('errormessage');
    </script>
</body>

</html>