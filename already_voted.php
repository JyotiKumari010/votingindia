<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting India</title>
    <link rel="shortcut icon" type="image/png" href="images/1.png" />
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(250, 224, 242); /* Soft light blue background */
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 500px;
            position: absolute;
        }

        .card h1 {
            font-size: 28px;
            color: #333;
        }

        /* Person (Image) Styles */
        .person {
            width: 250px; /* Increased image size */
            height: auto;
            position: absolute;
            bottom: 20px;
        }

        .left {
            left: -100px;
            animation: walk-left 4s linear infinite;
        }

        .right {
            right: -100px;
            animation: walk-right 4s linear infinite;
        }

        /* Walking animations */
        @keyframes walk-left {
            0% { transform: translateX(0); }
            100% { transform: translateX(110vw); }
        }

        @keyframes walk-right {
            0% { transform: translateX(0); }
            100% { transform: translateX(-110vw); }
        }
    </style>
</head>
<body>
    <!-- Left and Right Walking Images -->
    <img src="images/ink.png" alt="Person" class="person left">
    <img src="images/ink.png" alt="Person" class="person right">

    <!-- Message Card -->
    <div class="card">
        <h1>You Have Already Voted</h1>
    </div>
</body>
</html>
