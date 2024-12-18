<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calm Path - Mental Health Solutions</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f4f4f9;
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
      animation: fadeIn 1s ease-out; 
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .hero {
      background-color: #3a8d99; 
      color: white;
      text-align: center;
      padding: 100px 20px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
      transform: scale(0.95);
      animation: scaleUp 0.5s ease-in-out forwards; 
    }

    @keyframes scaleUp {
      from {
        transform: scale(0.95);
      }
      to {
        transform: scale(1);
      }
    }

    .hero h1 {
      font-size: 3em;
      margin-bottom: 20px;
      letter-spacing: 1px;
      animation: slideIn 1s ease-out; 
    }

    @keyframes slideIn {
      from {
        transform: translateY(-50px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .hero .quote {
      font-size: 1.5em;
      margin-bottom: 40px;
      font-style: italic;
      color: rgba(255, 255, 255, 0.8);
      animation: fadeInUp 1.2s ease-out; 
    }

    @keyframes fadeInUp {
      from {
        transform: translateY(20px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .hero .button {
      background-color: #f4a261;
      padding: 15px 30px;
      font-size: 1.2em;
      border-radius: 5px;
      text-decoration: none;
      color: white;
      font-weight: 600;
      transition: background-color 0.3s ease, transform 0.3s ease; 
      cursor: pointer;
    }

    .hero .button:hover {
      background-color: #e76f51;
      transform: scale(1.1); 
    }

    .hero .button:active {
      transform: scale(1); 
    }

    .hero-content {
      opacity: 0;
      animation: fadeInContent 1.5s ease-out forwards; 
    }

    @keyframes fadeInContent {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
  </style>
</head>
<body>

  <div class="hero">
    <div class="hero-content">
      <h1>Calm Path</h1>
      <p class="quote">"Your Journey to Mental Wellness Begins Here."</p>
      <a href="form.php" class="button">Get Started</a>
      
    </div>
  </div>

</body>
</html>
