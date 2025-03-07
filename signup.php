<?php 
include 'visit.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voting India</title>
  <link rel="shortcut icon" type="image/png" href="images/1.png" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet"  href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    /* Global Body Styling */
    body {
      font-family: 'Poppins', sans-serif;
      background-color: rgba(234, 246, 255, 0.7);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      box-sizing: border-box;
    }

    /* Main Form Container Styling */
    .voter-form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 450px;
      height: auto;
      border: 2px solid #003366;
      display: flex;
      flex-direction: column;
    }

    /* Form Heading Styling */
    .voter-form h2 {
      color: #003366;
      font-size: 28px;
      margin-bottom: 20px;
      font-weight: 600;
      text-align: center;
    }

    /* Input Box Styling */
    .inputBox {
      margin-bottom: 15px;
    }

    /* Label Styling */
    .inputBox label {
      color: #003366;
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 8px;
      display: block;
    }

    /* Input Fields Styling */
    .inputBox input {
      width: 100%;
      padding: 12px;
      border: 2px solid #003366;
      border-radius: 10px;
      font-size: 16px;
      color: #333;
      background-color: #f1f8ff;
      box-sizing: border-box;
      transition: border-color 0.3s ease;
    }

    .inputBox input:focus {
      outline: none;
      border-color: #4facfe;
      background-color: #fff;
    }

    /* Submit Button Styling */
    .btn {
      width: 100%;
      padding: 15px;
      border: none;
      background-color: #003366;
      color: white;
      font-weight: bold;
      font-size: 18px;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #004080;
    }

    /* Login Link Styling */
    .login-link {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #555;
    }

    .login-link a {
      color: #003366;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    /* CAPTCHA Section Styling */
    .captcha-container {
      margin-bottom: 20px;
      padding: 20px;
      background: #f1f8ff;
      border-radius: 10px;
      border: 2px solid #003366;
    }

    .captcha-container h3 {
      font-size: 16px;
      color: #003366;
      margin-bottom: 10px;
    }

    canvas {
      border-radius: 8px;
      border: 1px solid #003366;
      margin-top: 10px;
    }

    /* Responsive Design */
    @media (max-width: 500px) {
      .voter-form {
        width: 90%;
      }
    }
  </style>
</head>
<body>






<form action="signup_process.php" method="post" class="voter-form" id="signUpForm" enctype="multipart/form-data">

    <h2>Voter Registration</h2>

    <!-- Full Name -->
    <div class="inputBox">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" placeholder="Enter your full name" name="fullname" required>
    </div>

    <!-- Phone Number -->
    <div class="inputBox">
        <label for="phone">Phone Number</label>
        <input type="text" id="phone" placeholder="Enter your phone number" name="phone" maxlength="14" required>
    </div>

    <!-- Date of Birth -->
    <div class="inputBox">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required>
    </div>

    <!-- Aadhaar or Voter ID -->
<div class="inputBox">
    <label for="aadhaar">Aadhaar </label>
    <input type="text" id="aadhaar" placeholder="Enter your Aadhaar " name="aadhaar" maxlength="12" required>
    <small>Enter a valid 12-digit Aadhaar </small>
    <span id="aadhaar-status" style="color: red; font-weight: bold;"></span> 
</div>


    <!-- Email Address -->
    <div class="inputBox">
        <label for="email">Email Address</label>
        <input type="email" id="email" placeholder="Enter your email" name="email" required>
    </div>

    <!-- Password -->
    <div class="inputBox">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password" name="password" required>
    </div>

    <!-- Confirm Password -->
    <div class="inputBox">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" placeholder="Confirm your password" name="confirm_password" required>
    </div>

    <!-- Passport Photo Upload -->
    
   

    <!-- CAPTCHA Section -->
    <div class="captcha-container">
        <h3>Enter CAPTCHA</h3>
        <canvas id="captchaCanvas" width="150" height="50"></canvas>
        <br>
        <button type="button" id="refreshCaptcha">Refresh CAPTCHA</button>
        <br>
        <input type="text" id="captchaInput" placeholder="Enter CAPTCHA" name="captcha" required>
    </div>

    <!-- Submit Button -->
    <input type="submit" value="Register" class="btn" name="register">

    <!-- Login Link -->
    <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
</form>


<!--aastha-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#aadhaar').on('keyup', function () {
        var aadhaar = $(this).val();
        if (aadhaar.length === 12) {
            $.ajax({
                url: 'check_aadhaar.php',
                type: 'POST',
                data: {aadhaar: aadhaar},
                success: function (response) {
                    if (response === 'valid') {
                        $('#aadhaar-status').text('Aadhaar verified').css('color', 'green');
                    } else {
                        $('#aadhaar-status').text('You are not a valid user').css('color', 'red');
                    }
                }
            });
        } else {
            $('#aadhaar-status').text('');
        }
    });

    $('#signUpForm').on('submit', function (event) {
        if ($('#aadhaar-status').text() !== 'Aadhaar verified') {
            alert('You are not a valid user.');
            event.preventDefault();
        }
    });
});
</script>


<script>
// Validate file size for passport photo
//document.getElementById('passport_photo').addEventListener('change', function () {
 // const file = this.files[0];
 // if (file) {
 //   const fileSize = file.size / 1024; // size in KB
  //  if (fileSize > 200) {
   //   alert('File size must be under 200KB. Please upload a smaller file.');
    //  this.value = ''; // Clear the input
   // }
 // }
//});

// Generate CAPTCHA
const canvas = document.getElementById('captchaCanvas');
const ctx = canvas.getContext('2d');
let captchaCode = '';
function generateCaptcha() {
  captchaCode = '';
  const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  for (let i = 0; i < 6; i++) {
    captchaCode += characters.charAt(Math.floor(Math.random() * characters.length));
  }

  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.fillStyle = '#f5f5f5';
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  ctx.font = '22px Poppins';
  ctx.fillStyle = '#333';
  ctx.fillText(captchaCode, 20, 35);

  // Add random lines for complexity
  for (let i = 0; i < 5; i++) {
    ctx.strokeStyle = '#' + Math.floor(Math.random() * 16777215).toString(16);
    ctx.beginPath();
    ctx.moveTo(Math.random() * canvas.width, Math.random() * canvas.height);
    ctx.lineTo(Math.random() * canvas.width, Math.random() * canvas.height);
    ctx.stroke();
  }
}
document.getElementById('refreshCaptcha').addEventListener('click', generateCaptcha);
generateCaptcha();

// Validate Aadhaar or Voter ID
const aadhaarField = document.getElementById('aadhaar');
aadhaarField.addEventListener('input', function () {
  const value = aadhaarField.value;
  const aadhaarRegex = /^\d{12}$/; // 12 digits for Aadhaar
  const voterIdRegex = /^[A-Z]{3}\d{7}$/i; // 3 letters followed by 7 digits for Voter ID

  if (aadhaarRegex.test(value) || voterIdRegex.test(value)) {
    aadhaarField.setCustomValidity(''); // Valid input
  } else {
    aadhaarField.setCustomValidity('Enter a valid 12-digit Aadhaar or 10-character Voter ID');
  }
});

// Validate phone number (Indian format)
const phoneField = document.getElementById('phone');
phoneField.addEventListener('input', function () {
  const phoneRegex = /^[6-9]\d{9}$/; // Starts with 6-9 and is 10 digits long
  if (phoneRegex.test(phoneField.value)) {
    phoneField.setCustomValidity(''); // Valid input
  } else {
    phoneField.setCustomValidity('Enter a valid 10-digit Indian phone number');
  }
});

// Age Restriction (Must be at least 18 years old)
document.getElementById('signUpForm').addEventListener('submit', function (event) {
  const dob = document.getElementById('dob').value;
  const today = new Date();
  const birthDate = new Date(dob);
  const age = today.getFullYear() - birthDate.getFullYear();
  const m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }

  if (age < 18) {
    alert('You must be at least 18 years old to register.');
    event.preventDefault(); // Prevent form submission
  }

  // CAPTCHA Validation
  const captchaInput = document.getElementById('captchaInput').value;
  if (captchaInput !== captchaCode) {
    alert('Invalid CAPTCHA. Please try again.');
    event.preventDefault(); // Prevent form submission
  }
});



</script>
</body>
</html>
