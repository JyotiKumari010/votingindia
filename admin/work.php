<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>voting india</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/1.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            background: #fff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 60%;
        }

        .container h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 20px;
        }

        .progress-container {
            width: 100%;
            background-color: #f0f0f0;
            border-radius: 25px;
            height: 25px;
            margin-bottom: 30px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            height: 100%;
            width: 0%;
            background-color: #007bff;
            border-radius: 25px;
            animation: progress 4s ease-out forwards;
        }

        @keyframes progress {
            0% {
                width: 0%;
            }

            100% {
                width: 80%;
            }
        }

        .container .message {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff9900;
        }

        .container .icon {
            font-size: 5rem;
            color: #ff9900;
            margin-bottom: 20px;
        }

        .container .sub-text {
            font-size: 1rem;
            color: #999;
            margin-top: 20px;
        }

        .container .sub-text a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .container .sub-text a:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body>

    <div class="container">
        <div class="icon">
            <i class="fas fa-cogs"></i>
        </div>
        <h1>Work in Progress</h1>
        <p>We are working hard to bring you something awesome. Stay tuned!</p>

        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>

        <div class="message">
            <p>Please check back later!</p>
        </div>

        <div class="sub-text">
            <p>If you have any questions, feel free to <a href="help.php">contact us</a>.</p>
        </div>
    </div>

</body>

</html>
