<?php
session_start();

if (!isset($_SESSION["privilleged"])) {
    // Redirect to the login page if the user is not authenticated
    header("Location: login.php");
    exit();
}

require 'connect.php';

$username = '';
$eemail = '';
$national = '';
$email = $_SESSION['privilleged'];
$errorMsg = '';

$sql = "SELECT * FROM user WHERE eemail=:email";
$statement = $pdo->prepare($sql);
$statement->bindParam(":email", $email, PDO::PARAM_STR);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $username = $user['username'];
    $eemail = $user['eemail'];
    $national = $user['national'];
} else {

    echo "User not found";
}
?>
<?php
if ($user) {
    $userId = $user['userId']; // Retrieve the user ID

    if (isset($_POST['change'])) {
        $currentPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $newPassword = filter_input(INPUT_POST, 'newpassword', FILTER_SANITIZE_STRING);
        $confirmPassword = filter_input(INPUT_POST, 'confirm-password', FILTER_SANITIZE_STRING);

        // Use $user['password'] instead of $password
        if ($currentPassword == $user['password']) {
            if ($newPassword === $confirmPassword) {
                $updateSql = "UPDATE user SET password=:password WHERE userId=:userId";
                $updateStatement = $pdo->prepare($updateSql);
                $updateStatement->bindParam(':password', $newPassword, PDO::PARAM_STR);
                $updateStatement->bindParam(':userId', $userId, PDO::PARAM_INT);
                $updateStatement->execute();

                $errorMsg = "Password successfully updated.";
            } else {
                $errorMsg = "New password and confirm password do not match.";
            }
        } else {
            $errorMsg = "The current password is wrong";
        }
    }
} else {
    // Handle the case where the user is not found
    $errorMsg = "User not found";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyVehicle Services - Government Profile</title>
    <link rel="stylesheet" href="overall.css">

    <link rel="icon" href="jordangov.jpg">
</head>

<body class="bodypro">

    <header class="headerd">
        <h1 class="ebed">Vehicle Services - Government Profile</h1><br><br>
        <nav class="navmon">
            <a href="index.php"><img src="25694.png" alt="" class="imgproo">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            </a>
            <a href="logout.php">
                <i class="fa fa-sign-out log"></i>
            </a>
        </nav>
    </header>

    <main class="mainmon">
        <img src="default-avatar.png" alt="" class="imgpro">
        <h1 class="ham"><?php echo $username ?></h1>
        <div class="government-info">
            <p class="paras">National number: <?php echo $national ?> </p>
            <p class="paras">Email: <?php echo $eemail ?></p>
        </div><br><br><br>
        <p class="error-message" style="color: red; font-size: 1.5em; text-align: center;"><?php echo $errorMsg; ?></p>
        <br>
        <form action="" method="post" class="formpro">
            <input type="hidden" name="userId" value="1" class="inp">
            <label for="current">Current Password:</label>
            <input type="password" id="current" name="password" required class="inp">

            <label for="new-password">New Password:</label>
            <input type="password" id="new-password" name="newpassword" required class="inp">

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required class="inp">

            <input type="submit" value="Change Password" class="ah inp" name="change">
        </form>
    </main>

</body>

</html>