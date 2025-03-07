<!-- // Database connection  -->
 <?php include 'visit.php'?> 
<?php include 'nav.php'?>
<?php include("connection.php"); ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting India</title>
    <link rel="shortcut icon" type="image/png" href="images/1.png" />
    <link rel="stylesheet"  href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <style>
            body {
                font-family: Arial, sans-serif;
               
                background-color: lightblue;
            }

            header {
                position: relative;
                text-align: center;
                color: white;
            }

            header img {
                width: 100%;
                height: auto;
            }

            header .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }

            header .overlay h1 {
                font-size: 48px;
                font-weight: bold;
                margin: 0;
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            }

            header .overlay p {
                font-size: 20px;
                margin-top: 10px;
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            }

            .content {
                padding: 20px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }

            .election-box {
                background-color: white;
                border: 3px solid blue;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                width: 300px;
                text-align: center;
                overflow: hidden;
                transition: transform 0.2s, box-shadow 0.2s;
            }

            .election-box:hover {
                transform: translateY(-10px);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            .election-box img {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

            .election-box h2 {
                margin: 15px 0;
                font-size: 22px;
                color: #333;
            }

            .election-box a {
                display: block;
                text-decoration: none;
                color: white;
                background-color: #2d89ef;
                padding: 10px 0;
                margin: 10px auto 20px;
                width: 80%;
                border-radius: 5px;
                font-size: 18px;
                transition: background-color 0.3s;
            }

            .election-box a:hover {
                background-color: #1c5bbf;
            }

            .info-section {
                display: flex;
                justify-content: center;
                gap: 20px;
                padding: 0px;
                flex-wrap: wrap;
            }

            .info-box {
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 20px;
                width: 45%;
                text-align: center;
                display: flex;
                align-items: center;
                gap: 20px;
            }

            .info-box img {
                width: 400px;
                /* height: 100px; */
                object-fit: cover;
                border-radius: 5px;
            }

            .info-box h2 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .info-box a {
                display: block;
                text-decoration: none;
                color: white;
                background-color: #2d89ef;
                padding: 10px;
                margin: 0;
                border-radius: 5px;
                font-size: 16px;
                transition: background-color 0.3s;
                text-align: center;
            }

            .info-box a:hover {
                background-color: #1c5bbf;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .info-box {
                    width: 100%;
                }
            }
            /* Voting-related images */
        .image-section {
        text-align: center;
        margin: 30px;
        }
        .image-section p {
            font-size:20px;
        }


        .image-section img {
        width: 100px;
        height: auto;
        border-radius: 10px;
        max-width: 500px;
        }
  /* footer */

    /* Additional Styles for Hover Zoom Effect */
    .box a {
        transition: transform 0.3s ease-in-out, color 0.3s ease;
    }

 
    .box a:hover {
    transform: scale(1.1) !important;
    color: #FFD700 !important;
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

       
      
    /* New container for stacked info boxes */
    .info-container {
        background-color: white;
        border: 3px solid blue !important;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px auto;
        width: 80%; /* Adjust width as needed */
        max-width: 600px;
    }

    /* Style for individual info boxes inside the container */
    .info-box {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px; /* Add spacing between boxes */
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 600px;
    }
    .info-box1 {
        background-color:rgb(70, 146, 159);
        border: 2px solid blue ;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px; /* Add spacing between boxes */
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 600px;
    }

    /* Optional: Adjust upload input styling */
    #upload-nomination {
        margin-top: 10px;
        padding: 5px;
        font-size: 16px;
    }

    .container{
        display: flex;
                justify-content: center;
                gap: 20px;
                padding: 20px;
                flex-wrap: wrap;

    }
    </style>
    </head>
    <body>

    <header>
            <img src="Images/bg2.jpg" alt="Election Banner">
            <div class="overlay">
                <h1>Election Management - Voting India</h1>
                <p>"Your vote is your voice. Let it be heard."</p>
            </div>
        </header>

        <!-- New Info Section -->
        <div class="info-section">
            <!-- Rules of Nomination Box -->
            <div class="info-box1">
            <div class="info-box" style=" width:500px; margin: 50px; border: 3px solid pink; margin: 70px; ">
                <img src="Images/n2.jpg" alt="Rules Icon">
                <div>
                    <h2>Rules of Nomination</h2>
                    <a href="https://www.eci.gov.in/eci-backend/public/api/download?url=LMAhAK6sOPBp%2FNFF0iRfXbEB1EVSLT41NNLRjYNJJP1KivrUxbfqkDatmHy12e%2FzVx8fLfn2ReU7TfrqYobgInKGhv1lnghUoZTxD843teraql%2BVUMzjF42USdRCuZPhfhLTHuwJXKwyEIHay%2F6584TqpHRZRnYsuoB6TfgUV31x39BpRO8t%2F8UA0M8OMhfJ" target="_blank">View Rules</a>
                </div>
    </div>
            </div>

    <!-- Existing UI Structure -->
    <div class="info-container">
        <div class="info-box" style=" border: 2px solid pink; height: 160px; width:550px;">
            <h2>Nomination Form</h2>
            <a href="Documents/NFA.pdf" target="_blank">Download Form</a>
        </div>

        <div class="info-box" style=" border: 2px solid pink; height: 160px;width:550px;">
            <h2>Upload Nomination Form</h2>
            <input type="file" name="upload-nomination" id="upload-nomination">
        </div>

        <div class="info-box" style=" border: 2px solid pink; height: 160px;width:550px;">
            <h2>Know Your Competitors</h2>
            <?php
            $result = $conn->query("SELECT pdf_path FROM uploads WHERE selected_item = 'Nominated Candidates' ORDER BY uploaded_at DESC LIMIT 1");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<a href='{$row['pdf_path']}' target='_blank'>View Nominated Candidates</a>";
            } else {
                echo "<p>No data available</p>";
            }
            ?>
        </div>
    </div>

    <div class="container" >
    <div class="info-container">
        <div class="info-box" style=" border: 2px solid pink; height: 160px;width:550px;">
            <h2>New Voter Registration</h2>
            <a href="Documents/NFA.pdf" target="_blank">Download Voter Registration Form</a>
        </div>

        <div class="info-box" style=" border: 2px solid pink; height: 160px;width:550px;">
            <h2>Upload Voter Registration Form</h2>
            <input type="file" name="upload-registration" id="upload-registration">
        </div>

        <div class="info-box" style=" border: 2px solid pink; height: 160px;width:550px;">
            <h2>Download your Voter Id Card</h2>
            <a href="work.php" target="_blank">Download</a>
        </div>
    </div>
    <div class="info-box1" style=" background-color:rgb(211, 166, 220); ">
        <div class="info-box" style=" width:500px; margin: 50px; border: 3px solid pink;  ">
            <img src="Images/polling.jpg" alt="Rules Icon" >
            <div>
                <h2>Rules for Voter Registration</h2>
                <a href="Documents/NR.pdf" target="_blank">View Rules</a>
            </div>
            </div>
    </div>
        </div>

    <div class="content">
        <div class="election-box">
            <h2>Lok Sabha Elections</h2>
            <?php
            $result = $conn->query("SELECT pdf_path FROM uploads WHERE selected_item = 'Lok Sabha Election Candidate List' ORDER BY uploaded_at DESC LIMIT 1");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<a href='{$row['pdf_path']}' target='_blank'>View Candidates</a>";
            } else {
                echo "<p>No data available</p>";
            }
            ?>
        </div>

        <div class="election-box">
            <h2>State Assembly Elections</h2>
            <?php
            $result = $conn->query("SELECT pdf_path FROM uploads WHERE selected_item = 'State Assembly Election Candidate List' ORDER BY uploaded_at DESC LIMIT 1");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<a href='{$row['pdf_path']}' target='_blank'>View Candidates</a>";
            } else {
                echo "<p>No data available</p>";
            }
            ?>
        </div>

        <div class="election-box">
            <h2>Municipal Elections</h2>
            <?php
            $result = $conn->query("SELECT pdf_path FROM uploads WHERE selected_item = 'Municipal Election Candidate List' ORDER BY uploaded_at DESC LIMIT 1");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<a href='{$row['pdf_path']}' target='_blank'>View Candidates</a>";
            } else {
                echo "<p>No data available</p>";
            }
            ?>
        </div>

        <div class="election-box">
            <h2>Panchayat Elections</h2>
            <?php
            $result = $conn->query("SELECT pdf_path FROM uploads WHERE selected_item = 'Panchayat Election Candidate List' ORDER BY uploaded_at DESC LIMIT 1");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<a href='{$row['pdf_path']}' target='_blank'>View Candidates</a>";
            } else {
                echo "<p>No data available</p>";
            }
            ?>
        </div>
    </div>

    <!-- Voting-related Images -->
    <div class="image-section">
        <h2>Voting India</h2>
        <img src="Images/v.jpg" alt="Voting Image">
        <p>Vote for a better future! Your vote matters.</p>
    </div>


        <!-- footer  -->
        <section class="footer" style="background-color: #002855; color: white; padding: 20px 20px; font-family: Arial, sans-serif ;height:450px;width:100%;margin:0 auto;margin: right 0;">

    <div class="box-container" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 0px;">

        <!-- Quick Links Section -->
        <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
            <h1 style="font-size: 20px; margin-bottom: 15px; text-align: left;">Quick Links</h1>
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
            <h1 style="font-size: 20px; margin-bottom: 15px; text-align: left;">Extra Links</h1>
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
            <h1 style="font-size: 20px; margin-bottom: 15px; text-align: left;">Contact Info</h1>
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
                <h1 style="font-size: 20px; margin-bottom: 15px; text-align: left;">Follow Us</h1>
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


    </body>
    </html>
