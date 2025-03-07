<?php include 'visit.php'; ?>
<?php
session_start();
include 'connection.php';

if (isset($_POST['submit'])) {
    $aadhaar = $_POST['aadhaar'];
    $electionType = $_POST['electionType'];
    //$state = $_POST['state'];

    // Verify Aadhaar and check if the user has already voted
    // $stmt = $conn->prepare("SELECT id, has_voted FROM voters WHERE aadhaar = ?");
    // $stmt->bind_param("s", $aadhaar);
    // $stmt->execute();
    // $result = $stmt->get_result();
    //$voter = $result->fetch_assoc();

    //check if aadhaar matches first login aardhaar
    if (! isset($_SESSION['aadhaar']) || $_SESSION['aadhaar'] !== $aadhaar) {
       echo' <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Voting India</title>
            <link rel="shortcut icon" type="image/png" href="images/1.png" />
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color:rgb(233, 224, 250); /* Soft light blue background */
                    height: 100vh;
                    margin: 0;
                    overflow: hidden;
                    position: relative;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                     }

            .card {
                background-color: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 500px;
                position: absolute;
            }

            .card h1 {
                font-size: 28px;
                color: #333;
            }

            /* Person (Image) Styles */
            .person {
                width: 150px; /* Increased image size */
                height: auto;
                position: absolute;
                bottom: 20px;
            }
                  .left {
                left: -100px;
                animation: walk-left 4s linear infinite;
            }

            .right {
                right: -100px;
                animation: walk-right 4s linear infinite;
            }

            /* Walking animations */
            @keyframes walk-left {
                0% { transform: translateX(0); }
                100% { transform: translateX(110vw); }
            }

            @keyframes walk-right {
                0% { transform: translateX(0); }
                100% { transform: translateX(-110vw); }
            }
        </style>
    </head>
    <body>
        <!-- Left and Right Walking Images -->
        <img src="images/invalid.webp" alt="Person" class="person left">
        <img src="images/invalid.webp" alt="Person" class="person right">
<!-- Message Card -->
        <div class="card">
            <h1>Invalid Aadhar!Not a Logged User!</h1>
        </div>
    </body>
    </html>';
    exit();
} 

    $sql = "SELECT * FROM voters WHERE aadhaar='$aadhaar'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // // Step 2: If valid user, proceed to voting page
        // header("Location: ani.php?aadhaar=" . $aadhaar_number);
        // exit();

            if ($user['has_voted'] == 1) {
                // Display the HTML message if the user has already voted
                echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Voting India</title>
    <link rel="shortcut icon" type="image/png" href="images/1.png" />
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color:rgb(233, 224, 250); /* Soft light blue background */
                            height: 100vh;
                            margin: 0;
                            overflow: hidden;
                            position: relative;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                             }

                    .card {
                        background-color: #fff;
                        padding: 30px;
                        border-radius: 10px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        text-align: center;
                        width: 500px;
                        position: absolute;
                    }

                    .card h1 {
                        font-size: 28px;
                        color: #333;
                    }

                    /* Person (Image) Styles */
                    .person {
                        width: 250px; /* Increased image size */
                        height: auto;
                        position: absolute;
                        bottom: 20px;
                    }
                          .left {
                        left: -100px;
                        animation: walk-left 4s linear infinite;
                    }

                    .right {
                        right: -100px;
                        animation: walk-right 4s linear infinite;
                    }

                    /* Walking animations */
                    @keyframes walk-left {
                        0% { transform: translateX(0); }
                        100% { transform: translateX(110vw); }
                    }

                    @keyframes walk-right {
                        0% { transform: translateX(0); }
                        100% { transform: translateX(-110vw); }
                    }
                </style>
            </head>
            <body>
                <!-- Left and Right Walking Images -->
                <img src="images/ink.png" alt="Person" class="person left">
                <img src="images/ink.png" alt="Person" class="person right">
 <!-- Message Card -->
                <div class="card">
                    <h1>You Have Already Voted</h1>
                </div>
            </body>
            </html>';
            exit(); // Stop further script execution
        }
    } else {
        die('
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                     <title>Voting India</title>
    <link rel="shortcut icon" type="image/png" href="images/1.png" />
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color:rgb(233, 224, 250); /* Soft light blue background */
                            height: 100vh;
                            margin: 0;
                            overflow: hidden;
                            position: relative;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                             }

                    .card {
                        background-color: #fff;
                        padding: 30px;
                        border-radius: 10px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        text-align: center;
                        width: 500px;
                        position: absolute;
                    }

                    .card h1 {
                        font-size: 28px;
                        color: #333;
                    }

                    /* Person (Image) Styles */
                    .person {
                        width: 250px; /* Increased image size */
                        height: auto;
                        position: absolute;
                        bottom: 20px;
                    }
                          .left {
                        left: -100px;
                        animation: walk-left 4s linear infinite;
                    }

                    .right {
                        right: -100px;
                        animation: walk-right 4s linear infinite;
                    }

                    /* Walking animations */
                    @keyframes walk-left {
                        0% { transform: translateX(0); }
                        100% { transform: translateX(110vw); }
                    }

                    @keyframes walk-right {
                        0% { transform: translateX(0); }
                        100% { transform: translateX(-110vw); }
                    }
                </style>
            </head>
            <body>
                <!-- Left and Right Walking Images -->
                <img src="images/invalid.png" alt="Person" class="person left">
                <img src="images/invalid.png" alt="Person" class="person right">
 <!-- Message Card -->
                <div class="card">
                    <h1>Invalid Aadhar!</h1>
                </div>
            </body>
            </html>');

    }




    // Update `has_voted column to 1 after successful form submission

    $updateStmt = $conn->prepare("UPDATE voters SET has_voted = 1 WHERE aadhaar = ?"); $updateStmt->bind_param("s",$aadhaar);
    if (!$updateStmt->execute()) {
    die("Error updating vote status."); }

    // Store election type and state in session for the next page
    $_SESSION['election_type'] = $electionType;
   $_SESSION['state'] = $state;
    $_SESSION['aadhaar'] = $aadhaar; // Pass Aadhaar to the next page for verification


        
    // Redirect to the next voting page
    header("Location: india.php");
    exit();
}


if(!isset($_SESSION['aadhaar'])) { 
    echo "
    <html>
    <head>
        <title>Voting India</title>
            <link rel='shortcut icon' type= 'image/png' href='images/1.png' />
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting India</title>
    <link rel="shortcut icon" type="image/png" href="images/1.png" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #003366;
            padding: 10px 20px;
        }

        .container {
            display: flex;
            width: 100%;
        }

        .left-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #1E90FF;
            padding: 20px;
        }

        .map-container {
            width: 80%;
            margin-bottom: 20px;
        }

        .map-container img {
            width: 100%;
            height: auto;
            border: 2px solid #ccc;
            border-radius: 10px;
        }

        .right-section {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #1E90FF;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .captcha {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .captcha span {
            font-size: 18px;
            font-weight: bold;
        }

        .captcha input {
            width: 50%;
            margin-left: 10px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            display: none;
        }

        .language-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <!-- Left Section with Image and Map -->
        <div class="left-section">
            <div class="map-container">
                <img src="images/36.webp" alt="India Map">
            </div>
        </div>

        <!-- Right Section with Form -->
        <div class="right-section">
            <!-- Language Toggle -->
            <div class="language-toggle">
                <div class="toggle-switch" id="languageToggle">
                    <span class="toggle-text en"><b>En</b></span>
                    <span class="toggle-text hi"><b>आ</b></span>
                </div>
            </div>

            <!-- Election Form -->
            <div class="form-container">
                <h1 id="formTitle">VOTERS</h1>
                <form  method="POST" action="ani.php">
                    <!-- Election Type Selection -->
                    <div class="form-group">
                        <label for="electionType" id="electionLabel">Select Election Type</label>
                        <select id="electionType" name="electionType" required>
                            <option value="">--Select--</option>
                            <option value="lokSabha">Lok Sabha Election</option>
                            <option value="vidhanSabha">Vidhan Sabha Election</option>
                            <option value="localElection">Local Election</option>
                        </select>
                    </div>

                    <!-- State Selection -->
                    <div class="form-group">
                        <label for="state" id="stateLabel">Select State</label>
                        <select id="state" name="state" required disabled>
                            <option value="">--Select State--</option>
                        </select>
                    </div>

                    <!-- Aadhaar Input -->
                    <div class="form-group">
                        <label for="aadhaar" id="aadhaarLabel"> Aadhaar Number</label>
                        <input type="text" id="aadhaar" name="aadhaar" maxlength="12" required>
                    </div>

                    <!-- CAPTCHA -->
                    <div class="form-group captcha">
                        <span id="captchaQuestion"></span>
                        <input type="text" id="captchaAnswer" name="captchaAnswer" required>
                    </div>

                    <div class="error-message" id="error-message">Incorrect CAPTCHA. Please try again.</div>

                    <?php if (isset($success_message)): ?>
                        <p style="color: green;"><?php echo $success_message; ?></p>
                    <?php elseif (isset($error_message)): ?>
                        <p style="color: red;"><?php echo $error_message; ?></p>
                    <?php endif; ?>

                    <button type="submit" id="submitButton" name="submit">Submit</button>
                    
                </form>
            </div>
        </div>
    </div>

    <script>
        // Translations
        const translations = {
            en: {
                formTitle: "VOTERS",
                electionLabel: "Select Election Type",
                stateLabel: "Select State",
                adharLabel: "Aadhaar",
                errorMessage: "Incorrect CAPTCHA. Please try again.",
                submitButton: "Submit",
            },
            hi: {
                formTitle: "\u092E\u0924\u0926\u093E\u0924\u093E",
                electionLabel: "\u091A\u0941\u0928\u093E\u090F\u0902 \u091A\u0941\u0928\u093E\u0935",
                stateLabel: "\u0930\u093E\u091C\u094D\u092F \u091A\u0941\u0928\u093E\u090F\u0902",
                adharLabel: "\u0906\u0927\u093E\u0930 \u0915\u0947 \u0905\u0902\u0924\u093F\u092E 12 \u0905\u0902\u0915",
                errorMessage: "\u0917\u0932\u0924 CAPTCHA। \u0915\u0943\u092A\u092F\u093E \u092A\u0941\u0928\u0930\u094D\u0928 \u092A\u094D\u0930\u092F\u093E\u0938 \u0915\u0930\u0947\u0902।",
                submitButton: "\u091C\u092E\u093E \u0915\u0930\u0947\u0902",
            }
        };

        let currentLanguage = "en";

        // Update Language
        function updateLanguage() {
            const lang = translations[currentLanguage];
            document.getElementById("formTitle").textContent = lang.formTitle;
            document.getElementById("electionLabel").textContent = lang.electionLabel;
            document.getElementById("stateLabel").textContent = lang.stateLabel;
            document.getElementById("adharLabel").textContent = lang.adharLabel;
            document.getElementById("error-message").textContent = lang.errorMessage;
            document.getElementById("submitButton").textContent = lang.submitButton;
        }

        document.getElementById("languageToggle").addEventListener("click", () => {
            currentLanguage = currentLanguage === "en" ? "hi" : "en";
            updateLanguage();
        });

        // Dynamic Dropdown Logic
        const states = {
            lokSabha: ["Uttar Pradesh", "Bihar", "Maharashtra"],
            vidhanSabha: ["Bihar"],
            localElection: ["Delhi", "Kolkata", "Mumbai"],
        };

        document.getElementById("electionType").addEventListener("change", function () {
            const electionType = this.value;
            const stateSelect = document.getElementById("state");
            stateSelect.disabled = electionType !== "vidhanSabha";
            stateSelect.innerHTML = "<option value=''>--Select State--</option>";

            if (electionType === "vidhanSabha") {
                states.vidhanSabha.forEach((state) => {
                    const option = document.createElement("option");
                    option.value = state;
                    option.textContent = state;
                    stateSelect.appendChild(option);
                });
            }
        });

        // CAPTCHA
        function generateCaptcha() {
            const num1 = Math.floor(Math.random() * 10);
            const num2 = Math.floor(Math.random() * 10);
            document.getElementById("captchaQuestion").textContent = `${num1} + ${num2}`;
            return num1 + num2;
        }

        let correctCaptcha = generateCaptcha();

        // Form Submission
        document.getElementById("electionForm").addEventListener("submit", (event) => {
            event.preventDefault();

            const captchaAnswer = document.getElementById("captchaAnswer").value;
            if (parseInt(captchaAnswer) !== correctCaptcha) {
                document.getElementById("error-message").style.display = "block";
                correctCaptcha = generateCaptcha();
            } else {
                const electionType = document.getElementById("electionType").value;
                const state = document.getElementById("state").value;

                if (!electionType) {
                    alert(
                        currentLanguage === "en"
                            ? "Please select an election type."
                            : "\u0915\u0943\u092A\u092F\u093E \u091A\u0941\u0928\u093E\u0935 \u091A\u0941\u0928\u0947\u0902।"
                    );
                    return;
                }

                let pageUrl = "";
                if (electionType === "lokSabha") {
                    pageUrl = "india.php";
                } else if (electionType === "vidhanSabha") {
                    if (!state) {
                        alert(
                            currentLanguage === "en"
                                ? "Please select a state for Vidhan Sabha Election."
                                : "\u0915\u0943\u092A\u092F\u093E \u0935\u093F\u0927\u093E\u0928 \u0938\u092D\u093E \u091A\u0941\u0928\u0928\u0947 \u0915\u0947 \u0932\u093F\u090F \u0930\u093E\u091C\u094D\u092F \u091A\u0941\u0928\u0947\u0902।"
                        );
                        return;
                    }
                    pageUrl= 'vidhansabha_$ {state.toLowerCase().replace(" ","_")}.php'
                } else if (electionType === "localElection") {
                    pageUrl = "localElection.html";
                }

                if (pageUrl) {
                    window.location.href = pageUrl;
                }
            }
        });

        updateLanguage();

        document.getElementById("electionForm").addEventListener("submit", (event) => {
    event.preventDefault();

    const captchaAnswer = document.getElementById("captchaAnswer").value;
    if (parseInt(captchaAnswer) !== correctCaptcha) {
        document.getElementById("error-message").style.display = "block";
        correctCaptcha = generateCaptcha();
    } else {
        const electionType = document.getElementById("electionType").value;
        const state = document.getElementById("state").value;

        if (!electionType) {
            alert(
                currentLanguage === "en"
                    ? "Please select an election type."
                    : "\u0915\u0943\u092A\u092F\u093E \u091A\u0941\u0928\u093E\u0935 \u091A\u0941\u0928\u0947\u0902।"
            );
            return;
        }

        // Save timer start time in localStorage
        const startTime = new Date().getTime();
        localStorage.setItem("timerStart", startTime);

        let pageUrl = "";
        if (electionType === "lokSabha") {
            pageUrl = "india.php";
        } else if (electionType === "vidhanSabha") {
            if (!state) {
                alert(
                    currentLanguage === "en"
                        ? "Please select a state for Vidhan Sabha Election."
                        : "\u0915\u0943\u092A\u092F\u093E \u0935\u093F\u0927\u093E\u0928 \u0938\u092D\u093E \u091A\u0941\u0928\u0928\u0947 \u0915\u0947 \u0932\u093F\u090F \u0930\u093E\u091C\u094D\u092F \u091A\u0941\u0928\u0947\u0902।"
                );
                return;
            }
            pageUrl = `vidhanSabha_${state.toLowerCase()}.php`;
        } else if (electionType === "localElection") {
            pageUrl = "localElection.html";
        }

        if (pageUrl) {
            window.location.href = pageUrl;
        }
    }
});



    </script>
</body>
</html>
