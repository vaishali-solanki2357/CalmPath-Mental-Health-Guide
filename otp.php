<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #121212; 
        }

        .otp-container {
            background-color: #ffffff; 
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px; 
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .otp-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #4CAF50; 
        }

        .otp-container p {
            font-size: 16px;
            color: #888; 
            margin-bottom: 20px;
        }

        .otp-input {
            width: 80%;
            padding: 15px;
            font-size: 20px;
            border-radius: 10px;
            border: 1px solid #ccc;
            margin: 10px 0;
            text-align: center;
            background-color: #f9f9f9; 
            color: #333;
        }

        .otp-input:focus {
            outline: none;
            border-color: #4CAF50; 
            box-shadow: 0 0 10px rgba(76, 175, 80, 0.2);
        }

        .submit-btn {
            width: 80%;
            padding: 15px;
            background-color: #4CAF50; 
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background-color: #388E3C; 
        }

        .submit-btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="otp-container">
    <h2>OTP Verification</h2>
    <p>Please enter the OTP sent to your email/phone.</p>
    
    <input type="text" id="otp" class="otp-input" placeholder="Enter OTP" maxlength="5" required>
    <button class="submit-btn" id="submitBtn" onclick="verifyOTP()" disabled>Submit</button>

    <p class="error" id="errorMessage"></p>
</div>

<script>
    function verifyOTP() {
        var otp = document.getElementById("otp").value.trim();
        var errorMessage = document.getElementById("errorMessage");

    
        if (otp === "") {
            errorMessage.textContent = "OTP is required!";
        } else if (otp.length !== 5 || isNaN(otp)) {
            errorMessage.textContent = "OTP must be a 5-digit number!";
        } else {
            errorMessage.textContent = ""; 
            alert("OTP Verified Successfully!");
            window.location.href = "index.html"; 
        }
    }

  
    document.getElementById("otp").addEventListener("input", function() {
        var otp = document.getElementById("otp").value.trim();
        var submitBtn = document.getElementById("submitBtn");

        if (otp.length === 5 && !isNaN(otp)) {
            submitBtn.disabled = false;
        } else {
            submitBtn.disabled = true;
        }
    });
</script>
