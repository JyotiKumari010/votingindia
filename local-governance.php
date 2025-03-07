<?php 
include 'visit.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Under Maintenance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .maintenance-container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 36px;
            color: #ff4d4d;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }

        .message {
            font-size: 24px;
            color: #ff6347;
            font-weight: bold;
        }

        .timer {
            font-size: 18px;
            color: #888;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid #007bff;
            border-radius: 5px;
        }

        .back-link:hover {
            background-color: #007bff;
            color: white;
        }

    </style>
</head>
<body>

    <div class="maintenance-container">
        <h1>We'll Be Back Soon!</h1>
        <p class="message">This page is currently under maintenance. We are working hard to bring it back online.</p>
        <p class="timer">Please check back later.</p>

        <a href="home.php" class="back-link">Go Back to Home</a>
    </div>

</body>
</html>
