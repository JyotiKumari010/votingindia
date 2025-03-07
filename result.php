<?php include 'visit.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'count.php'; ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTING INDIA</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            width: 100vw; /*make the container span the full width of the viewport*/
            height: 250px; /*box height*/
            padding: 0 0%;
        }
        .part {
            flex: 1;
            margin: 0 5px;
            overflow: hidden; /* Hide overflow for zoom effect */
            position: relative;
        }
        .part img {
            width: 100%;
            height: 250px; /* Update height */
            border-radius: 0px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .part img:hover {
            transform: scale(1.2); /* Zoom the image */
        }
        h1 {
            font-size: 40px;
            text-align: center;
            color: #333;
        }
        p{
            text-align: center;  
        }


            /* Styling the container that holds the entire statistics section */
        .statistics-container {
            max-width: 100%; /* Set maximum width of the container */
            margin: 0 auto; /* Center the container on the page */
            background: white; /* White background for contrast */
            padding: 20px; /* Inner spacing inside the container */
            border-radius: 10px; /* Rounded corners for a modern look */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
            position: relative; /* Needed to keep pseudo-elements contained */
            overflow: hidden; /* Prevent lines from spilling outside */
        }

        .statistics-title {
            text-align: center; /* Center-align the title text */
            font-size: 24px; /* Font size of the title */
            font-weight: bold; /* Make the text bold */
            color: #333; /* Dark gray color */
            margin-bottom: 20px; /* Add space below the title */
            position: relative; /* Required for positioning pseudo-elements */
            padding: 0 20px; /* Add some horizontal padding to keep lines inside */
        }

        /* Add dashed magenta lines on the left and right of the title */
        .statistics-title::before,
        .statistics-title::after {
            content: ""; 
            position: absolute; 
            top: 70%; 
            transform: translateY(-50%); 
            width: calc(42% - 40px); 
            height: 15px; 
            background: transparent; 
            border-top: 2px solid magenta; /* line type*/
        }

        /* Left dashed line */
        .statistics-title::before {
            left: 0; /* Stick to the left edge */
        }

        /* Right dashed line */
        .statistics-title::after {
            right: 0; /* Stick to the right edge */
        }


        /* Grid layout for the list of statistics */
        .statistics-grid {
            display: grid; /* Use grid layout for items */
            grid-template-columns: repeat(2, 1fr); /* Create 2 equal columns */
            gap: 20px; /* Add space between grid items */
        }

        /* Styling each item in the statistics list */
        .stat-item {
            display: flex; /* Use flexbox to align icon and text */
            align-items: center; /* Center-align the icon and text vertically */
            background: #f4f8ff; /* Light blue background for the item */
            border-radius: 10px; /* Rounded corners for the item */
            padding: 15px; /* Inner spacing inside the item */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }

        /* Styling the circular icon in each item */
        .stat-icon {
            background: #ffe9f5; /* Light pink background for the icon */
            width: 40px; /* Fixed width of the circle */
            height: 40px; /* Fixed height of the circle */
            border-radius: 50%; /* Make the icon container circular */
            display: flex; /* Use flexbox to center the checkmark */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            margin-right: 15px; /* Add space between the icon and text */
        }

        /* Styling the checkmark inside the icon */
        .stat-icon i {
            color: #1a73e8; /* Blue color for the checkmark */
            font-size: 20px; /* Font size for the checkmark */
        }

        /* Styling the text of each statistics item */
        .stat-text {
            font-size: 16px; /* Font size for the text */
            color: #1a2a3a; /* Dark blue color for the text */
            font-weight: 500; /* Slightly bold text */
        }

        /* Footer */
    .footer {
      background-color: #0056b3;
      color: white;
      text-align: center;
      padding: 20px 0;
      width: 100%;
      bottom: 0;
    }

    /* footer */
    .credit {
      font-size: 14px;
      text-align: center;
      color: white;
      padding-top: 20px;
      border-top: 1px solid #fff;
      margin-top: 20px;
    }
    .footer h1{
        color: #fff;
        text-align: left;
    }

    /* Additional Styles for Hover Zoom Effect */
    .box a {
        transition: transform 0.3s ease-in-out, color 0.3s ease;
    }

    .box a:hover {
        transform: scale(1.1);
        color:rgb(212, 183, 16) !important;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .box-container {
            flex-direction: column;
            gap: 20px;
        }
    }

    /* Footer Styling */
    .credit {
        font-size: 14px;
        text-align: center;
        color: white;
        padding-top: 20px;
        border-top: 1px solid #fff;
        margin-top: 20px;
    }

        
    </style>
</head>
<body>
    <div class="container">
        <div class="part">
            <img src="images/37.avif" alt="Image 1" loading="lazy">
        </div>
        <div class="part">
            <img src="images/38.webp" alt="Image 2">
        </div>
        <div class="part">
            <img src="images/39.jpg" alt="Image 3">
        </div>
    </div>
    <h1><strong>Result</strong></h1>
    <p><I>Your Efforts, Your Results – Celebrate Your Journey!</I></p>

    <!-- Main container for the statistics section -->
    <div class="statistics-container">
        <!-- Title of the section -->
        <h1 class="statistics-title">CATEGORY</h1>
        
        <!-- Grid layout to display the statistics items -->
                    <div class="statistics-grid">
                <!-- General Parliamentary Results -->
                <a href="india_result.php" target="_blank" class="stat-item" style="text-decoration: none;">
                    <div class="stat-icon">
                        <i>✔</i>
                    </div>
                    <div class="stat-text">General Parliamentary Results</div>
                </a>

                <!-- State Legislative Assemblies Results -->
                <a href="state_result.php" target="_blank" class="stat-item" style="text-decoration: none;">
                    <div class="stat-icon">
                        <i>✔</i>
                    </div>
                    <div class="stat-text">State Legislative Assemblies Results</div>
                </a>

                <!-- Local Governance Results -->
                <a href="work.php" target="_blank" class="stat-item" style="text-decoration: none;">
                    <div class="stat-icon">
                        <i>✔</i>
                    </div>
                    <div class="stat-text">Local Governance Results</div>
                </a>

                <!-- Detailed Bye-elections Results -->
                <a href="work.php" target="_blank" class="stat-item" style="text-decoration: none;">
                    <div class="stat-icon">
                        <i>✔</i>
                    </div>
                    <div class="stat-text">Detailed Bye-elections Results</div>
                </a>

                <!-- Bye-elections Results (Form 21 D & E) -->
                <a href="work.php" target="_blank" class="stat-item" style="text-decoration: none;">
                    <div class="stat-icon">
                        <i>✔</i>
                    </div>
                    <div class="stat-text">Bye-elections Results (Form 21 D & E)</div>
                </a>

                <!-- Miscellaneous Statistics -->
                <a href="work.php" target="_blank" class="stat-item" style="text-decoration: none;">
                    <div class="stat-icon">
                        <i>✔</i>
                    </div>
                    <div class="stat-text">Miscellaneous Statistics</div>
                </a>
            </div>

        </div>
    </div>

    <!-- footer  -->
    <footer>
   <section class="footer" style="background-color: #002855; color: white; padding: 50px 20px; font-family: Arial, sans-serif;">

<div class="box-container" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">

    <!-- Quick Links Section -->
    <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
        <h1 style="font-size: 20px; margin-bottom: 15px;">Quick Links</h1>
        <ul style="list-style-type: none; padding: 0;">
            <li><a href="home.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-house" style="margin-right: 8px;"></i> Home
            </a></li>
            <li><a href="about.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> About
            </a></li>
            <li><a href="dashboard.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-person" style="margin-right: 8px;"></i> Dashboard
            </a></li>
            <li><a href="election.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Election
            </a></li>
            <li><a href="voting.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Voting
            </a></li>
            <li><a href="result.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Result
            </a></li>
            <li><a href="help.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Contact
            </a></li>
        </ul>
    </div>

    <!-- Extra Links Section -->
    <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
        <h1 style="font-size: 20px; margin-bottom: 15px;">Extra Links</h1>
        <ul style="list-style-type: none; padding: 0;">
            <li><a href="help.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Ask Questions
            </a></li>
            <li><a href="about.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> About Us
            </a></li>
            <li><a href="review.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Feedback
            </a></li>
            <li><a href="#" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Privacy Policy
            </a></li>
            <li><a href="#" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Terms of Use
            </a></li>
        </ul>
    </div>

    <!-- Contact Info Section -->
    <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
        <h1 style="font-size: 20px; margin-bottom: 15px;">Contact Info</h1>
        <ul style="list-style-type: none; padding: 0;">
            <li><a href="help.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-telephone" style="margin-right: 8px;"></i> +91 1234567890
            </a></li>
            <li><a href="help.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-telephone" style="margin-right: 8px;"></i> +91 1234567890
            </a></li>
            <li><a href="help.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-envelope" style="margin-right: 8px;"></i> votingindia@gmail.com
            </a></li>
            <li><a href="help.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-geo-alt" style="margin-right: 8px;"></i> Bihar, India - 800012
            </a></li>
        </ul>
    </div>

    <!-- Follow Us Section -->
    <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
            <h1 style="font-size: 20px; margin-bottom: 15px;">Follow Us</h1>
            <ul style="list-style-type: none; padding: 0;">
                <li><a href="https://www.facebook.com/yourpage" target="_blank" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                    <i class="bi bi-facebook" style="margin-right: 8px;"></i> Facebook
                </a></li>
                <li><a href="https://twitter.com/yourprofile" target="_blank" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                    <i class="bi bi-twitter-x" style="margin-right: 8px;"></i> Twitter
                </a></li>
                <li><a href="https://www.instagram.com/yourprofile" target="_blank" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                    <i class="bi bi-instagram" style="margin-right: 8px;"></i> Instagram
                </a></li>
                <li><a href="https://www.youtube.com/in/yourprofile" target="_blank" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                    <i class="bi bi-youtube" style="margin-right: 8px;"></i> Youtube
                </a></li>
            </ul>
        </div>

    </div>

    <div class="credit" style="text-align: center; margin-top: 40px; font-size: 14px; padding-top: 20px; border-top: 1px solid #fff;">
       <span> Voting India</span> | @All rights reserved 2025
    </div>
</section> 
  </footer>

   

</body>
</html>
