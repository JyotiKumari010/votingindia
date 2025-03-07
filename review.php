<?php include 'visit.php'; ?>

<?php
// Database connection
include 'connection.php';




// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $comment = trim($_POST['comment']);

    // Insert data into feedback table
    $sql = "INSERT INTO feedback (name, email, rating, comment) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $name, $email, $rating, $comment);
    
    if ($stmt->execute()) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                openThankYouPopup();
            });
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

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
            background-color: #E3F2FD;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Centered popup container */
        .popup-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            width: 50%;
            max-width: 320px;
            padding: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            border: 2px solid #003b5c;
            display: none;
            z-index: 1000;
        }

        .popup-container.active {
            display: block;
        }

        /* Header section */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #003b5c;
            padding: 10px;
            color: white;
            border-radius: 8px;
        }

        .logo img {
            width: 40px;
            height: auto;
        }

        .header h1 {
            text-align: center;
            flex-grow: 1;
            margin: 0;
            font-size: 1.2rem;
        }

        /* Feedback form styling */
        .feedback-form {
            padding: 15px;
            background-color: #fff;
        }

        .input-group {
            margin-bottom: 1rem;
        }

        .input-group label {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            display: block;
            color: #003b5c;
        }

        .input-group input, .input-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #003b5c;
            font-size: 1rem;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        .input-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Star Rating Design */
        .stars {
            display: flex;
            justify-content: flex-start;
            gap: 8px;
            margin-top: 5px;
        }

        .stars span {
            font-size: 1.5rem;
            color: #ccc;
            cursor: pointer;
        }

        .stars span.active {
            color: gold;
        }

        /* Submit and Remind Later buttons */
        .submit-btn, .remind-btn {
            background-color: #003b5c;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 1rem;
            font-size: 1rem;
            width: 100%;
        }

        .submit-btn:hover, .remind-btn:hover {
            background-color: #005e8b;
        }

        .remind-btn {
            background-color: #aaa;
        }

        .remind-btn:hover {
            background-color: #888;
        }

        /* Close button */
        .close-btn {
            background-color: transparent;
            color: white;
            border: none;
            font-size: 1.8rem; /* Increased size */
            cursor: pointer;
            position: absolute;
            top: 10px; /* Adjusted position */
            right: 10px; /* Adjusted position */
        }

        .close-btn:hover {
            color: #ff0000; /* Change color when hovered */
        }

        /* Overlay to darken the background */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 500;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        .thank-you-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            border: 2px solid rgb(46, 87, 110);
        }

        .thank-you-popup h2 {
            color: #003b5c;
            font-size: 1.4rem;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 500;
            display: none;
        }

    </style>
</head>
<body>

    <!-- Overlay to darken the background -->
    <div class="overlay" id="overlay"></div>

    <!-- Popup Form Container -->
    <div class="popup-container" id="feedbackForm">
        <button class="close-btn" onclick="closeForm()">×</button>
        
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <img src="images/1.png" alt="Voting India Logo">
            </div>
            <h1>Voting India</h1>
        </div>

        <!-- Feedback Form -->
        <div class="feedback-form">
            <h2>Give Your Feedback</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="input-group">
                    <label for="rating">Rating:</label>
                    <div class="stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <input type="hidden" id="rating" name="rating">
                </div>
                <div class="input-group">
                    <label for="comment">Comments:</label>
                    <textarea id="comment" name="comment" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Submit Feedback</button>
                <button type="button" class="remind-btn" onclick="remindLater()">Remind Me Later</button>
            </form>
        </div>
    </div>

        <!-- Overlay -->
        <div class="overlay" id="overlay"></div>

        <!-- Thank You Popup -->
        <div class="thank-you-popup" id="thankYouPopup">
            <h2>Thank you for your feedback!</h2>
        </div>


    <!-- Script to open/close the popup -->
    <script>

        // Open feedback form popup
        function openForm() {
            document.getElementById("feedbackForm").classList.add("active");
            document.getElementById("overlay").classList.add("active");
        }

        // Close feedback form popup
        function closeForm() {
            document.getElementById("feedbackForm").classList.remove("active");
            document.getElementById("overlay").classList.remove("active");
        }


        function openThankYouPopup() {
            document.getElementById("feedbackForm").style.display = "none";
            document.getElementById("thankYouPopup").style.display = "block";
            document.getElementById("overlay").style.display = "block";

            setTimeout(function() {
                window.location.href = "home.php";
            }, 1200);
        }

        // Remind Me Later
        function remindLater() {
            closeForm();
            alert("We will remind you later!");
            window.location.replace("home.php");
        }

        // Close feedback form popup
        function closeForm() {
            window.location.href = "home.php";
        }

        const stars = document.querySelectorAll('.stars .star');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const ratingValue = star.getAttribute('data-value');
                ratingInput.value = ratingValue; // Set hidden input value

                // remove the active class from all stars
                stars.forEach(s => s.classList.remove('active'));

                // active till the selected stars
                for (let i = 0; i < ratingValue; i++) {
                    stars[i].classList.add('active');
                }
            });
        });

        // Automatically open form (for demonstration)
        window.onload = function() {
            openForm();
        };
    </script>

</body>
</html>