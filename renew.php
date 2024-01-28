<?php
session_start();
if (!isset($_SESSION["privilleged"])) {
    header("Location: login.php");
    exit();
}
$host = 'localhost';
$dbname = 'website';
$user = 'root';
$password = '';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

if (isset($_POST['renew'])) {
    $sql = "INSERT INTO license (license, Issue, Exp, center) 
            VALUES (:license, :Issue, :Exp, :center)";
    $statement = $pdo->prepare($sql);

    $license = $_POST['license'];
    $Issue = $_POST['Issue'];
    $Exp = $_POST['Exp'];
    $center = $_POST['center'];

    // $Issue = date('Y-m-d', strtotime($Issue));
    // $Exp = date('Y-m-d', strtotime($Exp));

    $statement->bindParam(":license", $license, PDO::PARAM_STR);
    $statement->bindParam(":Issue", $Issue, PDO::PARAM_STR);
    $statement->bindParam(":Exp", $Exp, PDO::PARAM_STR);
    $statement->bindParam(":center", $center, PDO::PARAM_STR);

    $statement->execute();
    header("location: thanslic.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renew License</title>
    <link rel="icon" href="jordangov.jpg">
    <link rel="stylesheet" href="overall.css">

    </style>
</head>

<body class="renbody">
    <a href="index.php"><img class="arrren" src="arrow-left-solid.svg" alt=""></a>
    <form action="" method="post" class="formren">

        <img src="jordangov.jpg" alt="" class="renimage"><br>
        <h1>License Renew</h1><br> <br>
        <label for="license">license Number</label>
        <input type="text" id="license" name="license" required>

        <label for="Issue">Issue Date</label>
        <input type="date" id="Issue" name="Issue" required>

        <label for="year">Exp Date</label>
        <input type="date" id="Exp" name="Exp" required>

        <label for="center">License Center:</label>
        <input type="text" id="plate" name="center" required><br><br>


        <a href="thanslic.php"><button type="submit" class="h" name="renew">Renew license</button></a>
    </form>

</body>

</html>