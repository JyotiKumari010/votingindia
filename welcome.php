
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Voting India</title>
    <link rel="shortcut icon" type="image/png" href="images/1.png" />

    <style>
        body { 
            margin: 0; 
            overflow: hidden; 
            background: linear-gradient(to bottom, #b3d9ff, #ffffff); /* Softer gradient */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        #container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .character {
            position: absolute;
            bottom: 10%;
            width: 280px; /* Increased size */
            height: auto;
            transform: scale(0);
            transition: transform 2s ease-in-out;
        }

        #male-character {
            left: 10%;
        }

        #female-character {
            right: 10%;
        }

        #welcome-card {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            background: #ffffff;
            padding: 30px 60px;
            border-radius: 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            opacity: 0;
            transition: transform 1s ease-in-out, opacity 1s ease-in-out;
        }
    </style>
</head>
<body>
    <div id="container">
        <img id="male-character" class="character" src="images/m2.webp" alt="Male Character">
        <img id="female-character" class="character" src="images/f2.webp" alt="Female Character">
        <div id="welcome-card">WELCOME TO VOTING INDIA</div>
    </div>

    <script>
        // Zoom In effect for characters
        setTimeout(() => {
            document.getElementById('male-character').style.transform = 'scale(1)';
            document.getElementById('female-character').style.transform = 'scale(1)';
        }, 1000);

        // Show welcome card after images zoom in
        setTimeout(() => {
            document.getElementById('welcome-card').style.transform = 'translate(-50%, -50%) scale(1)';
            document.getElementById('welcome-card').style.opacity = '1';
        }, 2500);

        // Redirect to dashboard.php after 3 seconds of message display
        setTimeout(() => {
            window.location.href = 'dashboard.php';
        }, 7000); // 4s (animation) + 3s (wait) = 7s total
    </script>
</body>
</html>
