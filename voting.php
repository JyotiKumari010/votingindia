<?php include 'nav.php';?>
<?php include("connection.php"); ?>
<?php include 'visit.php'; ?>

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


    
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
    }

    /* Slider Container */
    .slider-container {
      width: 100%;
      overflow: hidden;
      position: relative;
      background: #4B0082; /* Purple background */
      padding: 20px 0;
    }

    /* Slider */
    .slider {
      display: flex;
      animation: slide 10s infinite;
    }

    .slide {
      display: flex;
      flex: 1;
      min-width: 100%;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .slide img {
      width: 400px; /* Set image width */
      border: 6px solid white;
      border-radius: 10px;
      margin-right: 20px; /* Space between image and text */
    }

    .slide .text-container {
      color: white;
      font-size: 18px;
      text-align: left;
      max-width: 600px; /* Limit text width */
    }

    .slide .quote {
      margin-bottom: 10px; /* Space below the quote */
      font-size: 18px;
      line-height: 1.5;
    }

      .slide  .author {
      display: inline-block;
      background: white;
      color: black;
      font-style: italic;
      font-size: 16px;
      padding: 5px 10px;
      border-radius: 5px;
      float: right; /* Author name will move to the right */
      text-align: right; /* Align text inside the box to the right */
      margin-top: 10px; /* Space between quote and author name */
    }


    /* Animation for sliding */
    @keyframes slide {
      0%, 20% { transform: translateX(0); }
      25%, 55% { transform: translateX(-100%); }
      60%, 80% { transform: translateX(-200%); }
      85%, 90% { transform: translateX(0); }
    }

    h1{
      margin-top: 10px;
      text-align: center;
    }

    .quote {
      max-width: 650px; /* Limit text width */
      margin: 0 auto; /* Center the text horizontally */
      text-align: center; /* Center align the text */
    }

    .symbol{
      text-align: center;
      font-size: 170%;
      color: rgb(164, 8, 96);
    }
    .center-container {
  display: flex;
  justify-content: center; /* Horizontally center */
  align-items: center; /* Vertically center */
  height: 150px; /* Adjust height as per your layout */
}

.card {
    border: 1px solid #ddd;
    padding: 20px;
    margin: 10px;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.boxx-container {
    display: flex;
    justify-content: space-around; /* Space around the boxes */
    align-items: center; /* Center-align items vertically */
    margin: 20px auto; /* Center container horizontally */
    max-width: 80%; /* Set maximum width of container */
    gap: 20px; /* Add space between boxes */
  }

  /* Styles for Individual Boxes */
  .boxx {
    flex: 1; /* Make all boxes equal in width */
    min-width: 250px; /* Set minimum width for small screens */
    background: #f4f4f4; /* Light grey background */
    border: 2px solid #0056b3; /* Blue border */
    border-radius: 10px; /* Rounded corners */
    padding: 20px; /* Add padding inside boxes */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
    text-align: center; /* Center-align text */
  }

  select {
  width: 100%;
  padding: 8px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
}

  

  .boxx h2 {
    font-size: 22px; /* Larger heading */
    color: #0056b3; /* Blue text color */
    margin-bottom: 10px; /* Space below heading */
  }

  .boxx p {
    font-size: 16px; /* Regular font size for content */
    color: #333; /* Darker text */
  }

  
  .btnn{
        color: white;
      background-color: rgb(123, 200, 241); /* Green button */
      border-radius: 10px; /* Rounded corners */
      border: none; /* Remove default border */
      padding: 10px 20px; /* Add more padding for better size */
      text-align: center; /* Center align the button text */
      font-size: 16px; /* Slightly larger font for better appearance */
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3); /* Create elevation effect */
      cursor: pointer; /* Add pointer cursor on hover */
      transition: transform 0.2s ease, box-shadow 0.2s ease; /* Smooth hover effect */
      }

      
        button {
      color: white;
      background-color: rgb(17, 203, 33); /* Green button */
      border-radius: 10px; /* Rounded corners */
      border: none; /* Remove default border */
      padding: 10px 20px; /* Add more padding for better size */
      text-align: center; /* Center align the button text */
      font-size: 16px; /* Slightly larger font for better appearance */
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3); /* Create elevation effect */
      cursor: pointer; /* Add pointer cursor on hover */
      transition: transform 0.2s ease, box-shadow 0.2s ease; /* Smooth hover effect */
    }
    button:hover {
      transform: translateY(-3px); /* Move button up slightly on hover */
      box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4); /* Add a deeper shadow on hover */
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

    /*for mobile view*/
@media (max-width: 768px) {
    .card {
        margin: 10px 0;
    }
}

  </style>
</head>
<body>
  <div class="slider-container">
    <div class="slider">
      <!-- Slide 1 -->
      <div class="slide">
        <img src="images/31.jpg" alt="Slide 1">
        <div class="text-container">
          <p class="quote">"Talk is cheap, voting is free; take it to the polls."</p>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="slide">
        <img src="images/38.jpg" alt="Slide 2">
        <div class="text-container">
          <p class="quote">"Every citizen of India must remember that he/she is an Indian and he/she has every right in this country but with certain duties."</p>
          <p class="author">- Sardar Vallabhbhai Patel</p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="slide">
        <img src="images/35.jpg" alt="Slide 3">
        <div class="text-container">
          <p class="quote">"Remember, for your progress, for your welfare, your happiness, never fail to cast your vote in elections."</p>
          <p class="author">- Dr A.P.J. Abdul Kalam</p>
        </div>
      </div>
    </div>
  </div>

 
    <h1><strong>Voting</strong></h1>
    <p class="quote"><I>India is a constitutional democracy with a parliamentary system of government, and at the heart of
       the system is a commitment to hold regular, free and fair elections.</I></p>
       <p class= "symbol"> ~ </p>

       <!--two box for page-->

       <div class="boxx-container">
  <div class="boxx">
    <h2>Instructions</h2>
    <p>Let's know HOW TO CAST VOTE.</p>
    <a href="pdf/instructionsforvoters.pdf" target="_blank">Download Instructions (PDF)</a>
  </div>


  <div class="boxx">
    <h2>Know Your Polling Booth</h2>
    <p><i>Step closer to shaping the future. Know your Booth NOW! </i></p>
    <button class="btnn" id="getStartedButton" onclick="showForm()">Get Started</button>

    <form id="boothForm" style="display: none; margin-top: 10px;">
      <!-- State Dropdown -->
      <label for="state">State:</label>
      <select id="state" name="state" onchange="populateDistricts()">
        <option value="">Select State</option>
        <option value="state1">Bihar</option>
        <option value="state2">West Bengal</option>
        <option value="state3">Delhi</option>
      </select>

      <!-- District Dropdown -->
      <label for="district">District:</label>
      <select id="district" name="district" onchange="populateBooths()" disabled>
        <option value="">Select District</option>
      </select>

      <!-- Booth Dropdown -->
      <label for="booth">Booth:</label>
      <select id="booth" name="booth" disabled>
        <option value="">Select Booth</option>
      </select>

      <!-- PDF Link -->
      <div id="pdfLink" style="margin-top: 10px;"></div>
    </form>
  </div>
</div>


    <!--vote now btn-->
       <div class="center-container">
  <button onclick="openModal()">Vote Now</button>
</div>

<!-- Instruction Modal -->
<div id="instructionModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 999;">
  <div style="background: white; width: 80%; max-width: 600px; margin: 10% auto; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
    <h2 style="text-align: center;">Instructions</h2>
    <p>Please read the following instructions carefully before proceeding:</p>
    <ul>
      <li>Ensure you have your Aadhar card ready.</li>
      <li>Make sure you are voting for the correct candidate.</li>
      <li>Do not refresh or navigate away during voting.</li>
      <li>You will get only one chance to CAST YOUR VOTE.</li>
      <small><strong><i> Let's make a small change..by casting your vote.</i></strong></small>
    </ul>
    <div style="text-align: center; margin-top: 20px;">
      <button onclick="closeModal()" style="background: red; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-right: 10px; cursor: pointer;">Close</button>
      <button onclick="proceedNow()" style="background: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Proceed Now</button>
    </div>
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

<script>
function showForm(){
  document.getElementById("boothForm").style.display= "none";
  document.getElementById("boothForm").style.display= "block";
  

}

  // State to District Mapping
const stateDistrictMap = {
  state1: ["178-MOKAKM", "179-BARH", "181-DIGHA", "184-PATNA SAHIB", "186-DANAPUR"],
  state2: ["162-CHOWRANGEE", "163-ENTALLY", "167-MANIKTALA", "168-KASHIPUR-BELGACHHIA"],
  state3: ["Preet Vihar", "East Delhi"],
};

// District to Booth Mapping
const districtBoothMap = {
  "178-MOKAKM": ["Booth 178"],
  "179-BARH": ["Booth 179"],
  "181-DIGHA": ["Booth 181"],
  "184-PATNA SAHIB": ["Booth 184"],
  "186-DANAPUR": ["Booth 186"],
  "162-CHOWRANGEE": ["Booth 162"],
  "163-ENTALLY": ["Booth 162"],
  "167-MANIKTALA": ["Booth 162"],
  "168-KASHIPUR-BELGACHHIA": ["Booth 162"],
  "Preet Vihar": ["Booth Delhi"],
  "East Delhi": ["Booth Delhi"],
};

// Populate District Dropdown
function populateDistricts() {
  const state = document.getElementById("state").value;
  const districtDropdown = document.getElementById("district");
  const boothDropdown = document.getElementById("booth");
  const pdfLinkDiv = document.getElementById("pdfLink");

  // Reset the District and Booth dropdowns and PDF link
  districtDropdown.innerHTML = '<option value="">Select District</option>';
  boothDropdown.innerHTML = '<option value="">Select Booth</option>';
  pdfLinkDiv.innerHTML = ""; // Clear the PDF link
  boothDropdown.disabled = true;

  if (state && stateDistrictMap[state]) {
    districtDropdown.disabled = false;
    stateDistrictMap[state].forEach((district) => {
      const option = document.createElement("option");
      option.value = district;
      option.textContent = district;
      districtDropdown.appendChild(option);
    });
  } else {
    districtDropdown.disabled = true;
  }
}

// Populate Booth Dropdown
function populateBooths() {
  const district = document.getElementById("district").value;
  const boothDropdown = document.getElementById("booth");
  const pdfLinkDiv = document.getElementById("pdfLink");

  // Reset the Booth dropdown and PDF link
  boothDropdown.innerHTML = '<option value="">Select Booth</option>';
  pdfLinkDiv.innerHTML = ""; 

  if (district && districtBoothMap[district]) {
    boothDropdown.disabled = false;
    districtBoothMap[district].forEach((booth) => {
      const option = document.createElement("option");
      option.value = booth;
      option.textContent = booth;
      boothDropdown.appendChild(option);
    });
  } else {
    boothDropdown.disabled = true;
  }
}

// Generate PDF Link
document.getElementById("booth").addEventListener("change", () => {
  const booth = document.getElementById("booth").value;
  const pdfLinkDiv = document.getElementById("pdfLink");

  if (booth) {
    pdfLinkDiv.innerHTML = `<a href="pdf/${booth.replace(/\s+/g, "_")}.pdf" target="_blank">
      Download Details for ${booth} (PDF)
    </a>`;
  } else {
    pdfLinkDiv.innerHTML = "";
  }
});
  // Modal Open Function
  function openModal() {
    document.getElementById("instructionModal").style.display = "block";
  }

  // Modal Close Function
  function closeModal() {
    document.getElementById("instructionModal").style.display = "none";
  }

  // Proceed Button Action
  function proceedNow() {
    window.location.href = "ani.php"; // Replace 'newpage.php' with the actual page URL.
  }
</script>

</html>
