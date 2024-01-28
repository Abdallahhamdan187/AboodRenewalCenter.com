<?php

require "connect.php";

session_start();

$errorMsg = '';
if (isset($_POST['login'])) {

    $sql = "SELECT * FROM user WHERE eemail = :email AND password = :password";
    $statement = $pdo->prepare($sql);

    $eemail = $_POST['eemail'];
    $password = $_POST['password'];

    $statement->bindParam(":email", $eemail, PDO::PARAM_STR);
    $statement->bindParam(":password", $password, PDO::PARAM_STR);
    $statement->execute();
    $count = $statement->rowCount();

    if ($count == 1) {
        $_SESSION['privilleged'] = $eemail;
        header("location: index.php");
        exit();
    } else {

        $errorMsg = '<h3 class="invaled">Invalid Email or password</h3>';
    }

    $pdo = null;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="overall.css">
    <link rel="icon" href="jordangov.jpg">

</head>

<body class="bodylogin">
    <form action="" method="post" class="formlog">
        <img src="jordangov.jpg" alt="" class="imglog"><br>
        <br>
        <label for="e">Enter Your Email</label><br>
        <input type="email" name="eemail" id="e" class="hover" required placeholder="example@gmail.com">
        <br><br>
        <label for="pass">Enter Your Password</label><br>
        <input type="password" name="password" id="pass" required class="hover">
        <br> <span class="errormessage" id="errormessage"><?php echo $errorMsg; ?></span>
        <button type="submit" name="login" class="h" id="boot">Login</button><br>

        <button type="button" onclick="redirectTo('signup.php')" class="h" id="boot">Create Account</button>
    </form>

    <script>
        function redirectTo(page) {
            window.location.href = page;
        }
    </script>
</body>

</html>