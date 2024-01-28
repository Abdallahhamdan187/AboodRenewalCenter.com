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

if (isset($_POST['regisetr'])) {
    $sql = "INSERT INTO car (CarCompany, model, year, platenumber, owner, motornumber, engine) 
            VALUES (:CarCompany, :model, :year, :platenumber, :owner, :motornumber, :engine)";
    $statement = $pdo->prepare($sql);

    $CarCompany = $_POST['CarCompany'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $platenumber = $_POST['platenumber'];
    $owner = $_POST['owner'];
    $motornumber = $_POST['motornumber'];
    $engine = $_POST['engine'];

    $statement->bindParam(":CarCompany", $CarCompany, PDO::PARAM_STR);
    $statement->bindParam(":model", $model, PDO::PARAM_STR);
    $statement->bindParam(":year", $year, PDO::PARAM_INT);
    $statement->bindParam(":platenumber", $platenumber, PDO::PARAM_INT);
    $statement->bindParam(":owner", $owner, PDO::PARAM_STR);
    $statement->bindParam(":motornumber", $motornumber, PDO::PARAM_INT);
    $statement->bindParam(":engine", $engine, PDO::PARAM_INT);
    $statement->execute();
    header("location: thankres.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Registration</title>
    <link rel="icon" href="jordangov.jpg">
    <link rel="stylesheet" href="overall.css">


    </style>
</head>

<body class="bodyreg">


    <form action="" method="post" class="formreg">
        <a href="index.php" onclick="goBack()"><img class="arr" src="arrow-left-solid.svg" alt=""></a>
        <img src="jordangov.jpg" class="reimage" alt=""><br>
        <h1>Car Registration</h1><br> <br>
        <label for="make">Car Company:</label>
        <input type="text" id="make" name="CarCompany" required>

        <label for="model">Car Model:</label>
        <input type="text" id="model" name="model" required>

        <label for="year">Year of Manufacture:</label>
        <input type="number" id="year" name="year" min="1990" max="2023" required>

        <label for="plate">License Plate Number:</label>
        <input type="text" id="plate" name="platenumber" required>

        <label for="owner">Owner's Name:</label>
        <input type="text" id="owner" name="owner" required>
        <label for="motor">Motor Number:</label>
        <input type="text" id="motor" name="motornumber" required>
        Engine Capacity:
        <label for="Engine">
            <select name="engine" id="s" required>
                <option value="">Engine Capacity</option>
                <option value="1000 cc">1000 cc</option>
                <option value="1200 cc">1200 cc</option>
                <option value="1400 cc">1400 cc</option>
                <option value="1600 cc">1600 cc</option>
                <option value="1800 cc">1800 cc</option>
                <option value="2000 cc">2000 cc</option>
                <option value="2500 cc">2500 cc</option>
                <option value="3000 cc">3000 cc</option>

            </select>
        </label>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>

        <a href="thankres.php"><button type="submit" class="h" name="regisetr">Register Car</button></a>
    </form>

</body>

</html>