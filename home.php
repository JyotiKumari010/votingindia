<?php include 'nav.php'?>
<?php include 'visit.php';?>
<?php include 'count.php';  ?>

<?php include 'connection.php';  ?>




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
    <style>


 /* Custom CSS */
 .carousel-item .d-flex img {
    width: 33.33%; /* Equal width for all three images */
    height: 400px; /* Fixed height for all images */
    object-fit: cover; /* Ensures images don't stretch or distort */
    border-right: 2px solid black; /* White vertical line between images */
    
}
/* Remove border for the last image in each row */
.carousel-item .d-flex img:last-child {
    border-right: none;
}

h1{
    font-size: 40px;
    position: center;
    justify-content: center; /* Horizontally center */
    align-items: center;    /* Vertically center */
}
    </style>


</head>
<body>

     <!-- Image Slider -->
     <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2"></button>
        </div>

        <!-- Carousel Content -->
        <div class="carousel-inner">
            <!-- First Slide -->
            <div class="carousel-item active">
                <div class="d-flex">
                    <img src="images/43.avif" class="d-block w-33" style="height:400px;" alt="Image 1">
                    <img src="images/43.jpg" class="d-block w-33" style="height:400px;" alt="Image 2">
                    <img src="images/41.avif" class="d-block w-33" style="height:400px;" alt="Image 3">

                </div>
                <div class="carousel-caption d-none d-md-block">
                <h1><strong>Welcome to Voting India</strong></h1>
                <p>Your vote, your voice. Participate in a democratic process like never before, from the comfort of your home.</p>
                </div>
            </div>

            <!-- Second Slide -->
            <div class="carousel-item">
                <div class="d-flex">
                    <img src="images/45.avif" alt="Image 4">
                    <img src="images/44.png" alt="Image 5">
                    <img src="images/45.jpg" alt="Image 6">
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h1><strong>Modernizing Democracy</strong></h1>
                    <p>Our platform embraces technology, offering a seamless and transparent voting experience for every citizen of India.</p>
                </div>
            </div>

            <!-- Third Slide -->
            <div class="carousel-item">
                <div class="d-flex">
                    <img src="images/46.jpg" alt="Image 7">
                    <img src="images/48.jpg" alt="Image 9">
                    <img src="images/41.png" alt="Image 8">
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h1><strong>Shaping the Future</strong></h1>
                    <p>Your vote matters! Take part in building a stronger, more inclusive democracy for the next generation.</p>
                </div>
            </div>
        </div>
       <!-- Controls -->
       <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>



<style>
  /* Ensuring carousel text (titles and paragraphs) are black and more visible */
  .carousel-caption h5,
  .carousel-caption p {
    color: white !important; /* Force black text */
  }

  /* Increase font size for better visibility */
  .carousel-caption h5 {
    font-size: 36px !important; /* Larger title size */
    font-weight: bold;
  }

  .carousel-caption p {
    font-size: 20px !important; /* Larger paragraph size */
    font-weight: 400;
  }
</style>












<?php
 $result = $conn->query("SELECT * FROM moving");
?>
<div class="notices">
    <div class="notice-track">
        <?php while ($row = $result->fetch_assoc()): ?>
            <a href="work.php?id=<?php echo $row['notice_link']; ?>" class="notice"><?php echo $row['notice_text']; ?></a>
        <?php endwhile; ?>
    </div>
</div>


<!-- Stylish Notes Section -->
<div class="notes-container">
    <div class="note-box">
        <h3>Mahatma Gandhi</h3>
        <p>"I understand democracy as something that gives the weak the same chance as the strong." – This reflects the very essence of a democratic voting system that ensures everyone’s voice is heard.</p>
    </div>
    <div class="note-box">
        <h3>Dr. B.R. Ambedkar</h3>
        <p>"Democracy is not a form of government, but a form of social organization." – Empowering every citizen to vote online strengthens the social fabric of India.</p>
    </div>
    <div class="note-box">
        <h3>Jawaharlal Nehru</h3>
        <p>"The service of India means the service of the millions who suffer. It means the ending of poverty and ignorance and disease and inequality of opportunity." – Online voting brings us one step closer to equal opportunities for every citizen to make their voice count.</p>
    </div>
    <div class="note-box">
        <h3>Indira Gandhi</h3>
        <p>"The power to question is the basis of all human progress." – Online voting gives citizens the power to question and choose their leaders freely and fairly.</p>
    </div>
    <div class="note-box">
        <h3>Subhas Chandra Bose</h3>
        <p>"Give me blood, and I will give you freedom." – Today, through online voting, we have the power to decide our future and freedom in a peaceful, democratic way.</p>
    </div>
</div>




<!---- map of india ---->

<div class="india-section">
        <!-- Map Section -->
        <div class="india-map"></div>

        <!-- State Names Section -->
        <div class="state-names">
            <h2>India - The Land of Diversity</h2>
            <!-- Links to PDFs for each state -->
            <a href="work.php" target="_blank">Andhra Pradesh</a>
            <a href="work.php" target="_blank">Arunachal Pradesh</a>
            <a href="work.php" target="_blank">Assam</a>
            <a href="work.php" target="_blank">Bihar</a>
            <a href="work.php" target="_blank">Chhattisgarh</a>
            <a href="work.php" target="_blank">Goa</a>
            <a href="work.php" target="_blank">Gujarat</a>
            <a href="work.php" target="_blank">Haryana</a>
            <a href="work.php" target="_blank">Himachal Pradesh</a>
            <a href="work.php" target="_blank">Jharkhand</a>
            <a href="work.php" target="_blank">Jammu & Kashmir</a> <!-- Added Jammu & Kashmir -->
            <a href="work.php" target="_blank">Karnataka</a>
            <a href="work.php" target="_blank">Kerala</a>
            <a href="work.php" target="_blank">Madhya Pradesh</a>
            <a href="work.php" target="_blank">Maharashtra</a>
            <a href="work.php" target="_blank">Manipur</a>
            <a href="work.php" target="_blank">Meghalaya</a>
            <a href="work.php" target="_blank">Mizoram</a>
            <a href="work.php" target="_blank">Nagaland</a>
            <a href="work.php" target="_blank">Odisha</a>
            <a href="work.php" target="_blank">Punjab</a>
            <a href="work.php" target="_blank">Rajasthan</a>
            <a href="work.php" target="_blank">Sikkim</a>
            <a href="work.php" target="_blank">Tamil Nadu</a>
            <a href="work.php" target="_blank">Telangana</a>
            <a href="work.php" target="_blank">Uttar Pradesh</a>
            <a href="work.php" target="_blank">Uttarakhand</a>
            <a href="work.php" target="_blank">West Bengal</a> <!-- Ensure West Bengal is included -->
        </div>
    </div>


<!--  gallery  -->


    <div class="page">
        <div class="gallery-box">
            <div class="gallery-heading"><h1>Gallery</h1></div>
            <div class="gallery-container">
                <!-- Square image with a comment box -->
                <div class="gallery-item square">
                    <img src="images/3.jpeg" alt="Square Image">
                    <div class="overlay">vote india </div>
                    
                </div>

                <!-- Horizontal image with a comment box -->
                <div class="gallery-item horizontal">
                    <img src="images/11.jpg" alt="Horizontal Image">
                    <div class="overlay">President </div>
                 
                </div>

                <!-- Vertical image with a comment box -->
                <div class="gallery-item vertical">
                    <img src="images/7.jpeg" alt="Vertical Image">
                    <div class="overlay">nation voting day </div>
                  
                </div>
            </div>

            <div class="load-more-container">
            <a href="work.php"><button class="load-more-btn">Load More</button></a>
            </div>
        </div>
    </div>

</div>

  <!---- video--->
  <div class="custom-layout"> <!-- Main container for split layout -->
    <!-- Video Section -->
    <div class="video-section"> <!-- Section for video content -->
        <iframe width="560" height="315" src="https://www.youtube.com/embed/to324JIljf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <!-- Embed the YouTube video using iframe -->
        <a href="work.php"><button class="load-more">Load More</button></a> <!-- Button to load additional content -->
    </div>

    <!-- Text Section about Voting -->
    <div class="text-section" style=" margin-top: -20px;  margin-bottom: 20px;  margin-right: 20px,position: relative; z-index: 1; padding: -5px"> <!-- Section for displaying text -->
        <h1>Voting India</h1> <!-- Heading about voting -->
        <h3>Your Vote Matters</h3> <!-- Subheading about voting -->
        <p>Voting is not just a civic duty; it is a powerful voice in shaping the future of our society. By participating in elections, we decide the leaders who will guide our communities, make vital decisions, and protect our rights. Every vote carries the potential for change, so don't miss your chance to be heard. Your voice can make a difference, and together, we can create a brighter, more inclusive future for all.</p> <!-- Text about voting -->
    </div>
</div>



    <!-- event and notice Section-->

    
<?php
// Make sure that the connection is open before running queries
if ($conn) {
    // Fetch notices from the database
    $notices = $conn->query("SELECT * FROM notices ORDER BY id DESC");

    // Fetch events from the database
    $events = $conn->query("SELECT * FROM events ORDER BY id DESC");
} else {
    die("Database connection is not established.");
}
?>

<div id="unique-notices-events" class="container">
    <div class="section notices">
        <h2>Notices</h2>
        <div class="notice-boxes">
            <!-- Dynamic content for notices -->
            <?php while ($notice = $notices->fetch_assoc()): ?>
                <div class="notice">
                    <p><a href="work.php?id=<?php echo $notice['id']; ?>">Notice: <?php echo $notice['title']; ?></a></p>
                    <p><?php echo substr($notice['description'], 0, 100); ?>... <a href="work.php?id=<?php echo $notice['id']; ?>">Read More</a></p>
                </div>
            <?php endwhile; ?>
        </div>
        <a href="work.php"><button class="load-more" id="loadNotices">Load More</button></a>
    </div>

    <div class="section events">
        <h2>Events</h2>
        <div class="event-boxes">
            <!-- Dynamic content for events -->
            <?php while ($event = $events->fetch_assoc()): ?>
                <div class="event">
                    <p><a href="work.php?id=<?php echo $event['id']; ?>">Event: <?php echo $event['title']; ?></a></p>
                    <p><?php echo substr($event['description'], 0, 100); ?>... <a href="work.php?id=<?php echo $event['id']; ?>">Read More</a></p>
                </div>
            <?php endwhile; ?>
        </div>
        <a href="work.php"><button class="load-more" id="loadEvents">Load More</button></a>
    </div>
</div>

<?php
// Close the connection after all queries and data processing is done
$conn->close();
?>




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














