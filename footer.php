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

/* footer */

  /* Additional Styles for Hover Zoom Effect */
  .box a {
      transition: transform 0.3s ease-in-out, color 0.3s ease;
  }

  .box a:hover {
      transform: scale(1.1);
      color: #FFD700;
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

   <!-- footer  -->
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
            <li><a href="work.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Privacy Policy
            </a></li>
            <li><a href="work.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Terms of Use
            </a></li>
        </ul>
    </div>

    <!-- Contact Info Section -->
    <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
        <h1 style="font-size: 20px; margin-bottom: 15px;">Contact Info</h1>
        <ul style="list-style-type: none; padding: 0;">
            <li><a href="#" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-telephone" style="margin-right: 8px;"></i> +91 1234567890
            </a></li>
            <li><a href="#" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-telephone" style="margin-right: 8px;"></i> +91 1234567890
            </a></li>
            <li><a href="#" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-envelope" style="margin-right: 8px;"></i> votingindia@gmail.com
            </a></li>
            <li><a href="#" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
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

<!-- Swiper JS Script -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script>
    // Zoom effect on hover for links
    document.querySelectorAll('.box a').forEach(function (link) {
        link.addEventListener('mouseenter', function () {
            this.style.transform = 'scale(1.1)';
            this.style.color = '#FFD700'; // Change text color on hover
        });
        link.addEventListener('mouseleave', function () {
            this.style.transform = 'scale(1)';
            this.style.color = 'white'; // Reset text color
        });
    });




</script>






<script src="js.js"></script>

</body>
</html>














