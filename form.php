<?php
ob_start();
include 'save.php';

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "dataform";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("<script>alert('Connection failed: " . $conn->connect_error . "');</script>");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $gender = $_POST['gender'];

    if (empty($fullname) || empty($email) || empty($password) || empty($gender)) {
        echo "<script>alert('All fields are required.');</script>";
    } else {
       
        $checkQuery = "SELECT * FROM savedinfo WHERE email = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

       {
          
            $query = "INSERT INTO savedinfo (fullname, email, password, gender) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $fullname, $email, $password, $gender);

            if ($stmt->execute()) {
               
                $otp = rand(10000, 99999);  
                sendOTPEmail($email, $otp); 

                header("Location: otp.php");
                exit(); 
            } else {
                echo "<script>alert('Failed to insert data: " . $stmt->error . "');</script>";
            }
            $stmt->close();
        }
        $checkStmt->close();
    }
}

$conn->close();
ob_end_flush();


function sendOTPEmail($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'calmpath421@gmail.com';  
        $mail->Password   = 'snfk ehbg irde csag';   
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

     
        $mail->setFrom('calmpath421@gmail.com', 'Calmpath');
        $mail->addAddress($email);


        $mail->isHTML(true);
        $mail->Subject = 'Here is your OTP';
        $mail->Body    = '' . $otp . '</b>';

        $mail->send();
        echo 'OTP has been sent to ' . htmlspecialchars($email);
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CalmPath</title>
    <style>
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black ;
            overflow: hidden; 
        }

        
        .background-video {
            position: fixed; 
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; 
            z-index: -1; 
        }

        .container {
            background: rgba(255, 255, 255, 0.85);
            padding: 3rem; 
            border-radius: 8px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            max-width: 500px; 
            width: 100%;
            text-align: center;
            z-index: 1; 
            position: relative; 
        }

        .logo {
            width: 120px; 
            height: 120px; 
            margin: 0 auto 1.5rem; 
            background: linear-gradient(to right, orange, blue);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 2.5rem; 
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        h1.brand {
            margin-bottom: 1.5rem; 
            font-size: 2rem; 
            font-weight: bold;
            color: #2575fc;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 1.5rem; 
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 1rem; 
            margin-bottom: 0.6rem; 
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 1rem; 
            font-size: 1.2rem; 
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #6a11cb;
            background-color: #f9f9f9;
        }

        .btn {
            background: linear-gradient(to right, orange, blue);
            color: #fff;
            padding: 1rem; 
            font-size: 1.2rem; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            width: 100%;
        }

        .btn:hover {
            background: linear-gradient(to right, blue, orange);
            transform: scale(1.05);
        }

    </style>
</head>
<body>
    <video class="background-video" autoplay muted loop playsinline>
        <source src="a.mp4" type="video/mp4">
    </video>
    <div class="container">
        <div class="logo">CP</div>
        <h1 class="brand">CalmPath</h1>
        <form class="login-form" action="" method="POST">
            <h4>Fill your Details</h4>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" placeholder="Enter your full name" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email">Email ID</label>
                <input type="email" placeholder="Enter your email" name="email" required>
            </div>
            <div class="form-group">
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" placeholder="Enter your password" name="password" required minlength="5" maxlength="5">
                </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <button type="submit" name="login" class="btn">Get Started</button>
        </form>
    </div>
</body>
</html>




