<?php include 'nav.php'?>
<?php include 'visit.php';?>
<?php include("connection.php");



// Fetch FAQs with pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * 10;
$faqs = $conn->query("SELECT * FROM faq ORDER BY id DESC LIMIT 12 OFFSET $offset");
?>





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

/* Styling the container that holds all content */
.about-container {
    width: 100%; /* The container takes the full width of the screen */
    max-width: 2000px; /* Maximum width set to 2000px */
    margin: 0 auto; /* Center the container horizontally */
    padding: 20px 0; /* Add 20px padding to top and bottom */
    background-color: lavender; /* Set background color to lavender */
}

/* Hero section with a background image and centered text */
.about-hero {
    text-align: center; /* Center the text in the hero section */
    background: url('images/42.avif') no-repeat center center/cover; /* Set background image and ensure it covers the full section */
    padding: 100px 20px; /* Padding added to top and bottom */
   
    color: white; /* Set the text color to black */
    background-color: lightcoral; /* Set a light coral background color for the hero section */
}


/* Hero section title styling */
.about-hero h1 {
    font-size: 3rem; /* Set font size to 3rem */
    margin-bottom: 10px; /* Add bottom margin for spacing */
}

/* Hero section subtitle styling */
.about-hero p {
    font-size: 1.5rem; /* Set font size to 1.5rem */
    margin-bottom: 20px; /* Add bottom margin for spacing */
}

/* Styling buttons in the hero section */
.about-hero .cta-buttons {
    margin-top: 20px; /* Add margin to the top of the button container */
}

/* Button styles for call-to-action links */
.about-hero .cta-buttons a {
    text-decoration: none; /* Remove underlining from links */
    color: white; /* Set text color of buttons to white */
    background-color: #007BFF; /* Set button background color */
    padding: 10px 20px; /* Padding added to buttons */
    border-radius: 5px; /* Round the corners of the buttons */
    font-weight: bold; /* Make the font bold */
    margin: 0 10px; /* Add margin to left and right of buttons */
    transition: background-color 0.3s; /* Smooth transition effect for background color on hover */
}

/* Change background color on hover for buttons */
.about-hero .cta-buttons a:hover {
    background-color: #0056b3; /* Darker blue when hovering over the button */
}

/* General section styling for content */
.about-section {
    padding: 50px 20px; /* Add padding to top, bottom, left, and right */
    background-color: lavender; /* Set background color to light golden yellow */
    border: 1px solid #ddd; /* Add a light border around the section */
    margin-top: 20px; /* Add margin to top of each section */
    border-radius: 10px; /* Round the corners of the sections */
}

/* Section title styling */
.about-section h2 {
    font-size: 2.5rem; /* Set font size to 2.5rem */
    margin-bottom: 20px; /* Add bottom margin for spacing */
    text-align: center; /* Center the title text */
}

/* Paragraph styling within sections */
.about-section p {
    font-size: 1.2rem; /* Set font size to 1.2rem */
    line-height: 1.8; /* Increase line height for readability */
    text-align: center; /* Center the paragraph text */
    margin-bottom: 20px; /* Add bottom margin for spacing */
    
}

/* Layout for feature cards */
.about-features {
    display: flex; /* Use flexbox layout */
    flex-wrap: wrap; /* Allow cards to wrap in smaller screens */
    gap: 20px; /* Add gap between feature cards */
    justify-content: space-around; /* Distribute the cards evenly */
    margin-top: 30px; /* Add margin to the top */
}

/* Individual feature card styling */
.about-feature {
    flex: 1 1 calc(33.33% - 40px); /* Make cards flexible, take 33% width minus 40px for margin */
    text-align: center; /* Center the text in the card */
    padding: 20px; /* Add padding inside each card */
    border: 5px solid darkblue; /* Add light border to each card */
    border-radius: 10px; /* Round the corners of the cards */
    background-color: lavenderblush; /* Set a background color for feature cards */
    transition: transform 0.3s, box-shadow 0.3s; /* Smooth transitions for hover effects */
}

/* Feature card image styling */
.about-feature img {
    max-width: 100%; /* Ensure image does not exceed the width of the card */
    height: 100px; /* Set fixed height for images */
    margin-bottom: 20px; /* Add bottom margin for spacing */
}

/* Feature card title styling */
.about-feature h3 {
    font-size: 1.5rem; /* Set title font size */
    margin-bottom: 10px; /* Add bottom margin for spacing */
}

/* Feature card paragraph styling */
.about-feature p {
    font-size: 1rem; /* Set paragraph font size */
    color: #555; /* Set text color to dark grey */
}

/* Add hover effects to feature cards */
.about-feature:hover {
    transform: translateY(-10px); /* Move card up on hover */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Add subtle shadow effect */
}

/* Section for explaining how the platform works */
.about-how-it-works {
    margin-top: 50px; /* Add margin to top */
    text-align: center; /* Center the text */
    background-color: lightblue; /* Set light blue background color */
    padding: 30px; /* Add padding */
    border-radius: 10px; /* Round the corners */
}

/* Title styling for the how-it-works section */
.about-how-it-works h2 {
    margin-bottom: 20px; /* Add bottom margin for spacing */
}

/* Layout for steps in the how-it-works section */
.about-how-it-works .steps {
    display: flex; /* Use flexbox layout for steps */
    flex-wrap: wrap; /* Allow steps to wrap in smaller screens */
    gap: 20px; /* Add gap between steps */
    justify-content: center; /* Center the steps */
}

/* Individual step card styling */
.about-step {
    flex: 1 1 calc(25% - 40px); /* Make steps flexible, taking 25% width minus 40px */
    text-align: center; /* Center the text in the step cards */
    padding: 20px; /* Add padding inside each card */
    background-color: lavenderblush; /* Set medium orchid color for step cards */
    border-radius: 10px; /* Round the corners of the steps */
}

/* Step card image styling */
.about-step img {
    max-width: 100%; /* Ensure image fits within the card */
    height: 100px; /* Set height of the step images */
    margin-bottom: 15px; /* Add margin below images */
}

/* Styling for the FAQ section container */
.about-faq {
    margin-top: 80px; /* Increases the space at the top of the FAQ section to prevent overlap with other content */
    padding: 30px; /* Adds 30px padding inside the FAQ section to create space between content and edges */
    background-color: lavender; /* Sets a lavender color as the background for the FAQ section */
    border-radius: 15px; /* Rounds the corners of the FAQ section with a 15px radius for a soft, modern look */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); /* Adds a slightly stronger shadow around the section for depth */
    overflow: hidden; /* Ensures that no content overflows from the section */
}

/* Styling for the title of the FAQ section */
.about-faq h2 {
    text-align: center; /* Centers the FAQ section title horizontally */
    margin-bottom: 40px; /* Adds a 40px space below the title to create more separation from the content */
    font-size: 2.5rem; /* Sets a larger font size for the title to make it stand out */
    font-weight: 600; /* Sets the title to a semi-bold weight for better visibility */
    color: #5c6bc0; /* Sets the title color to a soft blue shade to complement the lavender background */
}

/* Container for all FAQ items */
.about-faq-items {
    display: flex; /* Uses flexbox to align FAQ items */
    flex-direction: column; /* Stacks the FAQ items vertically */
    gap: 25px; /* Adds a 25px space between each FAQ item for better readability */
}

/* Styling for each individual FAQ item */
.about-faq-item {
    background-color:lavenderblush; /* Sets the background of each FAQ item to white for contrast */
    padding: 20px; /* Adds 20px padding inside each FAQ box to give space around the content */
    border-radius: 50px; /* Rounds the corners of each FAQ item for a smooth, modern look */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Adds a soft shadow to each FAQ item for depth */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transitions for scaling and shadow effects on hover */
}

/* Hover effect on FAQ items */
.about-faq-item:hover {
    transform: scale(1.003); /* Slightly enlarges the FAQ box on hover */
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15); /* Increases shadow intensity for a deeper effect on hover */
}

/* Styling for each FAQ question */
.about-faq-item h3 {
    font-size: 1.5rem; /* Sets the font size of the question to 1.5rem for readability */
    font-weight: 500; /* Sets the question text to medium weight to differentiate from the answer */
    color: #333; /* Sets a dark gray color for the question to ensure it's easy to read */
    margin-bottom: 15px; /* Adds a 15px space below the question for clear separation from the answer */
}

/* Styling for each FAQ answer text */
.about-faq-item p {
    font-size: 1.1rem; /* Sets the font size of the answer text to 1.1rem for better legibility */
    line-height: 1.8; /* Increases the line height for better readability and less crowded text */
    color: #666; /* Sets a lighter gray color for the answer text to provide a subtle contrast */
}

/* Styling for the "Load More" button container */
.load-more-container {
    text-align: center; /* Centers the button inside the container */
    margin-top: 20px; /* Adds some space between the FAQ list and the button */
}
/* Styling for the "Load More" button container */
.load-more-container {
    text-align: center; /* Centers the button inside the container */
    margin-top: 30px; /* Increased space between the FAQ list and the button */
    clear: both; /* Ensures no floating elements around */
}

/* Styling for the "Load More" button */
.load-more-btn {
    display: inline-block; /* Keeps the button inline while allowing styling */
    padding: 10px 20px; /* Slightly larger padding for better spacing */
    font-size: 1rem; /* Slightly smaller font size */
    background-color: #5c6bc0; /* Sets the background color of the button */
    color: white; /* Sets the text color of the button to white for contrast */
    border: none; /* Removes the default border */
    border-radius: 8px; /* Rounds the corners of the button */
    cursor: pointer; /* Changes the cursor to a pointer when hovering over the button */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition for hover effects */
    z-index: 10; /* Ensures button stays on top of other content */
    margin-bottom: 20px;
}

/* Hover effect on the "Load More" button */
.load-more-btn:hover {
    background-color: #3f4db7; /* Darkens the button color on hover */
    transform: scale(1.05); /* Slightly enlarges the button for interactivity */
}

/* Ensure the "Load More" button does not overlap content */
.clearfix::after {
    content: "";
    display: table;
    clear: both;
}





/* Adjusting layout for smaller screens */
@media screen and (max-width: 768px) {
    .about-feature,
    .about-step {
        flex: 1 1 100%; /* Make the feature cards and step cards take full width on smaller screens */
    }
}


</style>


</head>
<body>


<!-- Hero Section: Introductory area with title, subtitle, and buttons -->
<div class="about-hero">
  <h1>Welcome to Voting India</h1>
  <p>Empowering Democracy, One Vote at a Time</p>
  <div class="cta-buttons">
    <a href="#" class="btn btn-primary me-2" onclick="window.location.href='signup.php'">Get Started</a>
    <a href="work.php" class="btn btn-outline-light" onclick="window.location.href='learn-more.php'">Learn More</a>
  </div>
</div>
<!-- Mission Section: Overview of the platform's mission -->
<div class="about-how-it-works" style="font-size:22px;">
  <h1>Our Mission</h1>
  <p ;>At Voting India, we strive to create a seamless and secure digital platform that connects every Indian citizen to the democratic process. Our mission is to foster trust, transparency, and efficiency in the voting process while making it accessible to all. By leveraging cutting-edge technology, we aim to eliminate barriers to voting and empower citizens to actively participate in shaping the future of our nation.</p>
</div>

<!-- Features Section: Highlight key platform benefits -->
<div class="about-section">
  <h2>Why Choose Voting India?</h2>
  <div class="about-features row">
    <div class="col-md-4 about-feature">
      <img src="images/15.jpg" alt="Secure Voting">
      <h3>Secure Voting</h3>
      <p>We use state-of-the-art encryption and blockchain technology to ensure every vote remains anonymous and tamper-proof. Our commitment to data security ensures that your personal information and voting preferences are protected at all times.</p>
    </div>
    <div class="col-md-4 about-feature">
      <img src="images/19.jpg" alt="Transparency">
      <h3>Transparency</h3>
      <p>Our platform provides real-time updates on election processes, offering full visibility into each stage. From registration to results, we maintain open communication to build trust and confidence in the electoral process.</p>
    </div>
    <div class="col-md-4 about-feature">
      <img src="images/20.jpg" alt="Convenience">
      <h3>Convenience</h3>
      <p>Vote anytime, anywhere! With our online platform, you can cast your vote from the comfort of your home or any location, eliminating the need for long queues or travel to polling stations.</p>
    </div>
    <div class="col-md-4 about-feature">
      <img src="images/21.png" alt="Voter Education">
      <h3>Voter Education</h3>
      <p>We provide resources and educational materials to ensure every voter is well-informed. Learn about candidates, parties, and important electoral processes to make an educated decision.</p>
    </div>
    <div class="col-md-4 about-feature">
      <img src="images/21.avif" alt="24/7 Support">
      <h3>24/7 Support</h3>
      <p>Our dedicated support team is available round-the-clock to assist you with any issues you may face. Whether it's during registration, voting, or any stage of the election process, we are here to help.</p>
    </div>
    <div class="col-md-4 about-feature">
      <img src="images/23.png" alt="Accessibility">
      <h3>Accessibility</h3>
      <p>Designed with inclusivity in mind, our platform ensures that every citizen, regardless of technical proficiency, can easily participate. Features like multilingual support and a simple interface cater to diverse needs across the country.</p>
    </div>
  </div>
</div>

<!-- How It Works Section: Steps for using the platform -->
<div class="about-how-it-works">
  <h2>How Voting India Works</h2>
  <div class="steps row">
    <div class="col-md-3 about-step">
      <img src="images/22.webp" alt="Register">
      <h3>Register</h3>
      <p>Sign up using your Aadhaar or Voter ID to ensure your eligibility for voting. Our secure system verifies your identity to prevent fraudulent registrations.</p>
    </div>
    <div class="col-md-3 about-step">
      <img src="images/24.webp" alt="Login">
      <h3>Login</h3>
      <p>Access your dashboard securely with multi-factor authentication. This ensures that only authorized users can access their accounts.</p>
    </div>
    <div class="col-md-3 about-step">
      <img src="images/24.avif" alt="Vote">
      <h3>Vote</h3>
      <p>Cast your vote during the election period through our user-friendly interface. The process is intuitive, quick, and ensures that your voice is heard.</p>
    </div>
    <div class="col-md-3 about-step">
      <img src="images/25.jpeg" alt="Results">
      <h3>Track Results</h3>
      <p>View live results and detailed analytics on the elections in real time. Our platform offers insights and trends to keep you informed.</p>
    </div>
  </div>
</div>


  <!-- FAQ part    -->

<div class="container">
    <!-- Heading centered with its own styles -->
    <h1 class="faq-heading" style="text-align: center; margin-bottom: 20px;">Frequently Asked Questions</h1>

    <!-- FAQ List -->
    <div class="about-faq">
      <?php while ($row = $faqs->fetch_assoc()): ?>
        <div class="about-faq-item">
          <h3><?php echo $row['question']; ?></h3>
          <p><?php echo $row['answer']; ?></p>
        </div>
      <?php endwhile; ?>
    </div>

    <!-- Load More Button (Center aligned below the FAQ box) -->
    <div class="load-more-container">
      <a href="work.php?page=<?php echo $page + 1; ?>" class="load-more-btn">Load More</a>
    </div>
</div>







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





















