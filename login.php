<?php include 'visit.php'; ?>
<?php
session_start();



// Include the database connection
include('connection.php');
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs
    $aadhaar = $_POST['aadhaar'];
    $password_input = $_POST['password'];

    // Query to check if Aadhaar exists
    $sql = "SELECT * FROM voters WHERE aadhaar = '$aadhaar'";
    $result = $conn->query($sql);

    // If Aadhaar exists, check password
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Check if the password is correct
        if (password_verify($password_input, $row['password'])) {
            // Set session variables if login is successful
            $_SESSION['user'] = $row['fullname'];
            $_SESSION['aadhaar'] = $row['aadhaar'];

            // Redirect to dashboard
            header("Location: welcome.php");
            exit();
        } else {
            // Incorrect password
            $error_message = "Incorrect password. Please try again.";
        }
    } else {
        // Aadhaar not found
        $error_message = "Aadhaar number not found. Please check and try again.";
    }

    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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

    /* Form Container Styling */
    .login-form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 450px;
      border: 2px solid #003366;
      display: flex;
      flex-direction: column;
    }

    /* Form Heading Styling */
    .login-form h2 {
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

    /* Input Focus Effect */
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

    /* Button Hover Effect */
    .btn:hover {
      background-color: #004080;
    }

    /* Forgot Password Link Styling */
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

    /* Link Hover Effect */
    .login-link a:hover {
      text-decoration: underline;
    }

    /* Forgot Password Modal Styling */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      padding-top: 60px;
    }

    .modal-content {
      background-color: white;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 400px;
      border-radius: 10px;
    }

    /* Cancel Button inside Modal */
    .cancel {
      background-color: #888;
    }

    /* Responsive Design */
    @media (max-width: 500px) {
      .login-form {
        width: 90%;
      }
    }
    </style>
</head>
<body>
    <form action="" method="post" class="login-form" id="loginForm">
        <h2>Login as Voter</h2>

        <!-- Aadhaar/Voter ID Field -->
        <div class="inputBox">
            <label for="aadhaar">Aadhaar</label>
            <input type="text" id="aadhaar" placeholder="Enter Aadhaar " name="aadhaar" required>
        </div>

        <!-- Email Field -->
        <div class="inputBox">
            <label for="email">Email Address</label>
            <input type="email" id="email" placeholder="Enter your email" name="email" required>
        </div>

        <!-- Password Field -->
        <div class="inputBox">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Enter your password" name="password" required>
        </div>

        <!-- Display error message if any -->
        <?php if (isset($error_message)) { ?>
            <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
        <?php } ?>

        <!-- Submit Button -->
        <input type="submit" value="Login" class="btn" name="login">

        <!-- Forgot Password Link -->
        <p class="login-link">Forgot your password? <a href="#" id="forgotPassword">Reset it here</a></p>

        <!-- Login Link -->
        <p class="login-link">Don't have an account? <a href="signup.php">Sign up here</a></p>
    </form>

    <!-- Forgot Password Modal (Optional) -->
    <div id="forgotPasswordModal" class="modal">
        <div class="modal-content">
            <h3>Forgot Password</h3>
            <form id="forgotPasswordForm">
                <div class="inputBox">
                    <label for="emailReset">Enter Your Email</label>
                    <input type="email" id="emailReset" name="emailReset" required>
                </div>
                <button type="submit" class="btn">Submit</button>
                <button type="button" class="btn cancel" id="cancelBtn">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        // Open the modal when 'Forgot Password' is clicked
        document.getElementById('forgotPassword').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('forgotPasswordModal').style.display = "block";
        });

        // Close the modal when 'Cancel' button is clicked
        document.getElementById('cancelBtn').addEventListener('click', function() {
            document.getElementById('forgotPasswordModal').style.display = "none";
        });

        // Handle form submission for Forgot Password
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const email = document.getElementById('emailReset').value;
            alert(`Password reset instructions sent to: ${email}`);
            document.getElementById('forgotPasswordModal').style.display = "none";
        });
    </script>

</body>
</html>

