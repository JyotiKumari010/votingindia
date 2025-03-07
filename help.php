<?php include'nav.php'?>
<?php include("connection.php");
?>
<?php include 'visit.php';?>


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
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background-color: lightblue;
    color: #333;
    padding: 20px;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    margin: 0;
    padding: 0;
    box-sizing: border-box;

}

h1, h2 {
    color: #4b0082;
}

.contact-details {
    background-color: #e6e6fa;
    padding: 40px 20px;
    border-radius: 10px;
    margin-bottom: 40px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.contact-details h2 {
    font-size: 2em;
    text-align: center;
}

.intro-text {
    font-size: 1.2em;
    color: #555;
    margin-top: 10px;
    text-align: center;
}

.contact-info-box {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    gap: 15px;
}

.contact-item:hover {
    transform: translateY(-5px);
}

.contact-item i {
    font-size: 2.5em;
    color: #4b0082;
}

.contact-item div {
    flex-grow: 1;
}

.contact-item p {
    color: #555;
    margin-top: 5px;
    font-size: 1em;
}

.contact-item div strong {
    margin-bottom: 10px;
    display: inline-block;
}

.help-contact-block {
    background-color: #e6e6fa;
    padding: 40px 20px;
    border-radius: 10px;
    margin: 30px auto;
    max-width: 800px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    border: 2px solid #4b0082;
}

.help-contact-block h1 {
    font-size: 2.5em;
    margin-bottom: 10px;
}

.help-contact-block p {
    font-size: 1.2em;
    margin-bottom: 20px;
}

form {
    padding: 20px;
    border-radius: 10px;
    background-color: transparent;
    box-shadow: none;
}

.input-group {
    margin-bottom: 20px;
    text-align: left;
}

.input-group label {
    font-size: 1.1em;
    color: black;
    display: block;
    margin-bottom: 8px;
}

.input-group input,
.input-group select,
.input-group textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 10px;
    font-size: 1em;
    margin-bottom: 15px;
    background-color: white;
}

.btn-container {
    display: flex;
    justify-content: space-between;
}

button {
    background-color: darkblue;
    color: white;
    font-size: 1.2em;
    padding: 12px 20px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
}

button:hover {
    background-color: #7cc0f5;
}

.clear-btn {
    background-color: gray;
}

.clear-btn:hover {
    background-color: #b1b1b1;
}

.faq-list a {
    display: block;
    color: #4b0082;
    font-size: 1.1em;
    text-decoration: none;
    margin-top: 15px;
}

.faq-list a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .contact-info-box {
        grid-template-columns: 1fr;
    }

    .help-contact-block {
        padding: 20px;
    }

    form {
        padding: 15px;
    }

    button {
        font-size: 1em;
    }
}

    </style>
</head>
<body>





<section class="contact-details">
    <h2>Contact Information</h2>
    <p class="intro-text">We are here to assist you! Whether you have a question, issue, or feedback, we have multiple ways for you to get in touch. Please refer to the contact information below for assistance. Our team will respond as quickly as possible.</p>

    <div class="contact-info-box">
        <div class="contact-item">
            <i class="fas fa-phone-alt"></i>
            <div>
                <strong>Toll-Free Number:</strong>
                <p>9999</p>
                <p>If you're experiencing any issues or need urgent assistance, feel free to call our toll-free number, which is available 24/7. We strive to resolve your queries as quickly as possible.</p>
            </div>
        </div>

        <div class="contact-item">
            <i class="fas fa-building"></i>
            <div>
                <strong>Office Address:</strong>
                <p>Patna,Bihar</p>
                <p>Our office is located at Nirvachan Sadan, a central location in New Delhi. Feel free to visit us during business hours for in-person queries or support.</p>
            </div>
        </div>

        <div class="contact-item">
            <i class="fas fa-phone-square-alt"></i>
            <div>
                <strong>EPABX:</strong>
                <p>2305555 - 11, 25603212 - 19, 23045678, 23012089, 230543567</p>
                <p>For more detailed inquiries or department-specific assistance, you can reach our EPABX system. Different extensions are available for different departments or teams.</p>
            </div>
        </div>

        <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <div>
                <strong>Email:</strong>
                <p><a href="support@votingindia.com">support@votingindia.com</a></p>
                <p>If you prefer to communicate by email, feel free to send your queries or complaints to the above address. We will respond within a few business days.</p>
            </div>
        </div>

        <div class="contact-item">
            <i class="fas fa-fax"></i>
            <div>
                <strong>Faxline:</strong>
                <p>2309876, 23052345/43/40</p>
                <p>Fax is another method to send official documents. For fax-related queries or document submissions, use the provided fax numbers.</p>
            </div>
        </div>

        <div class="contact-item">
            <i class="fas fa-comments"></i>
            <div>
                <strong>For General Enquiries:</strong>
                <p>9999</p>
                <p>For general inquiries, you can call our dedicated helpline number. Whether it's about our services, guidelines, or any general question, we’re here to help.</p>
            </div>
        </div>
    </div>
</section>

<!-- Help Us & Contact Us Form in Lavender Color Box -->
<section class="help-contact-block">
    <h1>Help Us & Contact Us</h1>
    <p>We are here to assist you! If you have any questions or need support, feel free to reach out. Our team is dedicated to helping you with any queries you may have. Please fill out the form below, and we’ll get back to you shortly.</p>

    <!-- Contact Form -->
    <form id="contactForm" action="contact.php" method="POST" onsubmit="handleSubmit(event)">
        <div class="input-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="input-group">
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="input-group">
            <label for="phone">Phone Number (Optional)</label>
            <input type="tel" id="phone" name="phone">
        </div>

        <div class="input-group">
            <label for="category">Category of Inquiry</label>
            <select id="category" name="category">
                <option value="General">General Inquiry</option>
                <option value="Technical">Technical Support</option>
                <option value="Registration">Registration Issues</option>
                <option value="Election">Election Information</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="input-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>

        <div class="btn-container">
            <button type="submit">Submit</button>
            <button type="reset" class="clear-btn">Clear</button>
        </div>
    </form>

    <!-- FAQ Section with Links to the FAQ Part of the About Page -->
   <h2>Frequently Asked Questions</h2>
        <div class="faq-list">
            <a href="about.php#faq-reset-password">How do I reset my password?</a>
            <a href="about.php#faq-payment-methods">What payment methods do you accept?</a>
            <a href="about.php#faq-cancel-subscription">How can I cancel my subscription?</a>
            <a href="about.php#faq-report-issue">How to report a technical issue?</a>
        </div>
</section>


<!-- footer -->

<section class="footer" style="background-color: #002855; color: white; padding: 50px 20px; font-family: Arial, sans-serif;">

<div class="box-container" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">

    <!-- Quick Links Section -->
    <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
        <h1 style="font-size: 20px; margin-bottom: 15px;color:white">Quick Links</h1>
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
        <h1 style="font-size: 20px; margin-bottom: 15px;color:white">Extra Links</h1>
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
        <h1 style="font-size: 20px; margin-bottom: 15px;color:white">Contact Info</h1>
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
            <h1 style="font-size: 20px; margin-bottom: 15px; color:white">Follow Us</h1>
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

</body>
</html>
