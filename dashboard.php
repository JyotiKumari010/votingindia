<?php include 'visit.php'; ?>

<?php


session_start();
if(!isset($_SESSION['aadhaar'])) { 
    echo "
    <html>
    <head>
        <title>Access Denied</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color:rgb(215, 245, 248);
                text-align: center;
                padding: 50px;
            }
            .error-box {
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
                display: inline-block;
            }
            .error-text {
                color: #721c24;
                font-size: 18px;
                font-weight: bold;
            }
            .login-btn {
                margin-top: 10px;
                display: inline-block;
                padding: 10px 15px;
                color: white;
                background-color: #dc3545;
                text-decoration: none;
                border-radius: 5px;
                font-size: 16px;
            }
            .login-btn:hover {
                background-color: #c82333;
            }
        </style>
    </head>
    <body>
        <div class='error-box'>
            <p class='error-text'>Unauthorized Access! Please Login First.</p>
            <a href='login.php' class='login-btn'>Go to Login</a>
        </div>
    </body>
    </html>";
    exit();
}

include 'connection.php';
       include 'nav.php';
       


  

  $aadhaar = $_SESSION['aadhaar'];

  $query = "SELECT voters.fullname,voters.aadhaar, voters.dob, public. * 
          FROM voters 
          JOIN public ON voters.aadhaar = public.aadhaar 
          WHERE voters.aadhaar = '$aadhaar'";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    /* Global Styles */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(45deg, #f4f4f4, #d1e7ff);
      color: #333;
    }

    /* Header Section */
    .header {
      position: center;
      width: 100%;
      height: 250px;
      background-image: url('Images/bg2.jpg');
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 40px;
      font-weight: bold;
    }

    .header h3 {
      background-color: rgba(156, 148, 148, 0.5);
      padding: 15px 30px;
      border-radius: 10px;
      margin: 50px 50px;
      color: white;
    }

    /* Flexbox Container for Image and Profile Section */
    .main-container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin: 30px;
    }

    .img {
      margin-right: 20px;
      margin-left:50px;
      width: 600px;
      background-color:linear-gradient(45deg, #f4f4f4, #d1e7ff);
    }

      .profile-section {
      flex: 1;
      display: flex;
      justify-content: space-between;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      background: url("Images/R.jpg");
      padding: 30px;
      margin-right: 100px;
      margin-left: 100px;
      border: 3px solid blue;
      height: auto; /* Ensure height adjusts to content */
      min-height: 400px; /* Set a minimum height */
    }

    .profile-left img {
      width: 150px; /* Increase width for the image */
      border-radius: 10px;
      height: auto;
      border: 3px solid black;
      margin-top: 60px;
    }

    .profile-right {
      padding-left: 20px; /* Add some spacing between image and details */
      width: 300px; /* Adjust width to better utilize space */
    }

    .profile-right p {
      font-size: 18px;
      margin: 10px 0;
      word-wrap: break-word; /* Ensure text doesn't overflow */
    }


    /* Election Section */
    .election-section {
      display: flex;
      justify-content: space-between;
      margin: 40px;
      gap: 20px;
    }

    .election-container {
      width: 48%;
      background-color: white;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      border: 3px solid pink;
    }

    .election-container h2 {
      text-align: center;
      font-size: 24px;
      color: #0056b3;
    }

    .election-container p {
      font-size: 18px;
      color: #555;
    }

    /* Voting-related images */
    .image-section {
      text-align: center;
      margin: 30px;
    }

    .image-section img {
      width: 100px;
      height: auto;
      border-radius: 10px;
      max-width: 500px;
    }

    /* Card style for election details */
    .card {
      background-color: #e1f5fe;
      padding: 15px;
      border-radius: 8px;
      margin-top: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .card h3 {
      font-size: 20px;
      font-weight: bold;
    }

    .card p {
      font-size: 16px;
      color: #555;
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

  </style>
</head>
<body>

<!-- Header Section -->
<div class="header">
  <h3>Decide your future, vote and select the best for you and your country</h3>
</div>

<!-- Main Container: Image + Profile Section -->
<div class="main-container">
  <!-- Voting Image Section -->
  <div class="img">
    <img src="Images/02.jpg" alt="Voting is your right and your duty." width="350px">
  </div>

  <!-- Voter Profile Section -->
  <div class="profile-section">
    <div class="profile-left">
      <!-- Display Voter's Image -->
       <?php
       $image_path = './admin/'.$row['voters_photo'];
       echo "<img src='$image_path' alt='User Photo' width='80' height='10'>";
       ?>
    </div>
    <div class="profile-right">
      <h2>Voter Details</h2>
      <hr>
      <!-- Display Voter's Details -->
      <p><strong>Name:</strong> <?php echo $row['fullname']; ?></p>
      <p><strong>Father's/Husband's Name:</strong> <?php echo $row['father_name']; ?></p>
      <p><strong>D.O.B:</strong> <?php echo $row['dob']; ?></p>
      <p><strong>Voter ID:</strong> <?php echo $row['voter_id']; ?></p>
      <p><strong>Aadhaar:</strong> <?php echo $row['aadhaar']; ?></p>
      <p><strong>Address:</strong> <?php echo $row['voters_address']; ?></p>
      <p><strong>Constituency:</strong> <?php echo $row['constituency']; ?></p>
    </div>
  </div>
</div>



<body>

<?php

  // Active Elections 
  $activeElections = $conn->query("SELECT * FROM activeelection ORDER BY date DESC");

  // Upcoming Elections 
  $upcomingElections = $conn->query("SELECT * FROM upcomingelection ORDER BY date ASC");

  ?>

<div class="election-section">

        <!-- Active Elections Section -->
             <div class="election-container">

            <h2>Active Elections</h2>
            <?php while ($row = $activeElections->fetch_assoc()): ?>
                <div class="card">
                    <p><strong>Election Name:</strong><?php echo $row['ename']; ?></p>
                    <p><strong>Date:</strong> <?php echo $row['date']; ?></p>
                    <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
                    <p><strong>Description:</strong><?php echo $row['description']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Upcoming Elections Section -->
        <div class="election-container">
            <h2>Upcoming Elections</h2>
            <?php while ($row = $upcomingElections->fetch_assoc()): ?>
                <div class="card">
                    <p><strong>Election Name:</strong><?php echo $row['ename']; ?></p>
                    <p><strong>Date:</strong> <?php echo $row['date']; ?></p>
                    <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
                    <p><strong>Description:</strong><?php echo $row['description']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>


<!-- Voting-related Images -->
<div class="image-section">
  <h2>Voting India</h2>
  <img src="Images/v.jpg" alt="Voting Image">
  <p>Vote for a better future! Your vote matters.</p>
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
