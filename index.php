<?php
session_start();
if (!isset($_SESSION["privilleged"])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Services</title>
    <link rel="icon" href="jordangov.jpg">
    <link rel="stylesheet" href="overall.css">

</head>

<body class="bodyhome">
    <nav class="navov">
        <a href="index.php"><img src="25694.png" alt="" width="50px" height="50px" class="array"></a>
        <a href="profile.php"><img src="default-avatar.png" alt="" width="50px" height="50px" class="array"></a>
    </nav>
    <header>
        <h1>Vehicle Services</h1><br>
        <p>Your one-stop solution for vehicle registration and license renewal</p>
    </header>

    <section><br><br>
        <h2 style="text-align: center;">Quick Links</h2>
        <div class="links">
            <div class="service-box">
                <h3>Register Your Vehicle</h3>
                <p>Effortless automobile registration for your vehicle online.</p>
                <button type="button" class="button" id="butt"><a href="register.php">Register Now</a></button>

            </div>
            <div class="service-box">
                <h3>Renew Your License</h3>
                <p>Easily renew your driver's license online using our service.
                </p>
                <button type="button" class="button" id="butt">
                    <a href="Renew.php">Renew Now</a>
                </button>

            </div>
        </div>
    </section>

    <section>
        <h1>Step-by-Step Guides for Vehicle Services</h1>

        <section>
            <section>
                <h2>1. Vehicle Registration:</h2><br>
                <ol>
                    <li>Navigate to the "Register Your Vehicle" page.</li>
                    <li>Click on the "Register Now" button.</li>

                    <li>Provide the required information about your vehicle, including make, model, and plate number.
                    </li>
                    <li>Upload necessary documents, such as proof of ownership and identification.</li>
                    <li>Review the entered information and submit the registration form.</li>
                    <li>Receive a confirmation message and you may go to the nearest licensing center.
                    </li>
                </ol>
            </section>

            <section>
                <h2>2. License Renewal:</h2><br>
                <ol>
                    <li>Go to the "Renew Your License" section.</li>
                    <li>Select the "Renew Now" option.</li>
                    <li>Log in using your existing credentials or create a new account.</li>
                    <li>Verify your personal information and check the expiration date of your current license.</li>
                    <li>Follow the on-screen instructions to renew your license, including payment if applicable.</li>
                    <li>Receive a confirmation of the license renewal along with a digital copy of the renewed license.
                    </li>
                    <li>Go to the nearest licensing center.</li>
                </ol>
            </section>
            </ol>
        </section>
    </section>


    <section>
        <h2>Contact Information</h2>

        <p>If you have any questions, feel free to <a href="mailto:getrektplub@gmail.com">Email Us</a> or
            call
            us at <strong>0799888566</strong>.</p>

        <p>CopyRight<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
                <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512Z" />
            </svg></p>
    </section>


</body>

</html>