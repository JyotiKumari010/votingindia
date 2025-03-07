<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting India</title>
    <link rel="shortcut icon" type="image/png" href="images/1.png" />
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <style>
        /* Center the page */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(224, 244, 250); /* Soft light blue background */
            margin: 0;
        }

        /* Card styling */
        .vote-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.38);
            text-align: center;
            width: 350px;
            transition: transform 0.3s;
        }

        /* Image styling */
        .vote-image {
            width: 100%;
            max-width: 250px;
            margin-bottom: 15px;
        }

        /* Message styling */
        .vote-message {
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="vote-card">
        <img src="images/badge.png" alt="I Have Voted - India" class="vote-image">
        <div class="vote-message">
            🎉 Congratulations! <br> You are now a proud and responsible citizen-your vote makes a difference! 🎉
        </div>
    </div>

    <script>
        // Confetti animation
        function startConfetti() {
            var duration = 10 * 1000; // 3 seconds
            var end = Date.now() + duration;

            (function frame() {
                confetti({
                    particleCount: 5,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 }
                });
                confetti({
                    particleCount: 5,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 }
                });

                if (Date.now() < end) {
                    requestAnimationFrame(frame);
                }
            })();
        }

        // Start confetti when the page loads
        window.onload = function() {
            startConfetti();

            // Redirect after 5 seconds
            setTimeout(function() {
                window.location.href = "review.php";
            }, 5000);
        };
    </script>

</body>
</html>
