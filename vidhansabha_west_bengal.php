<?php include 'visit.php'; ?>
<?php include 'connection.php';

// Function to encrypt the vote
function encryptVote($vote, $aadhaar) {
    $secret_key = hash('sha256', $aadhaar); // Generate secret key dynamically
    $cipher = "aes-256-cbc";
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
    $encrypted_vote = openssl_encrypt($vote, $cipher, $secret_key, 0, $iv);

    return base64_encode($iv . "::" . $encrypted_vote);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aadhaar_number = $_GET['aadhaar']; // Getting Aadhaar from URL
    $vote = $_POST['vote']; // Selected party (e.g., Party A, Party B, NOTA)

    // Step 1: Encrypt the vote
    $encrypted_vote = encryptVote($vote, $aadhaar_number);

    // Step 2: Save the encrypted vote
    $insert_vote_query = "INSERT INTO votes (aadhaar_number, encrypted_vote) VALUES ('$aadhaar_number', '$encrypted_vote')";
    
    if ($conn->query($insert_vote_query)) {
        // Step 3: Update the voter status to "has voted"
        $update_query = "UPDATE voters SET has_voted = 1 WHERE aadhaar = '$aadhaar_number'";
        $conn->query($update_query);

        // Step 4: Update vote count
        if ($vote === "NOTA") {
            $conn->query("UPDATE votes_count SET count = count + 1 WHERE party_name = 'NOTA'");
        } else {
            $conn->query("UPDATE party SET votes_count = votes_count + 1 WHERE party_name_english = '$vote'");
        }

        echo "<script>alert('Your vote has been securely registered!');</script>";
    } else {
        echo "<script>alert('Error in saving your vote: {$conn->error}');</script>";
    }
}

// Fetch total votes per party
$vote_results = $conn->query("SELECT party_name_english, votes_count FROM party ORDER BY votes_count DESC");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VOTING INDIA</title>
        <link rel="shortcut icon" type="image/png" href="images/1.png" />
        <script src="timer.js"></script> 


        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color:rgba(184, 101, 243, 0.93);
                display: flex;
                justify-content: center;
                align-items: flex-start; /* Align to top to prevent centering issues */
                min-height: 100vh; /* Use min-height to allow scrolling if needed */
                
                background-image: url('images/27.jpg');
              
                background-size: cover;
            }

            .evm-container {
                text-align: center;
                background-color: #fff;
                border: 2px solid #ccc;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                width: 90%;
                max-width: 600px;
                max-height: none;
                
            }

            h1 {
                margin-bottom: 20px;
                color: #333;
            }

            /* Candidate Section in Single Row Layout */
            .candidate-container {
                list-style-type: none; /* Remove list bullet points */
                margin: 0;
                padding: 0;
            }

            .candidate {
                display: flex;
                align-items: center;
                justify-content: space-between;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 10px;
                margin: 10px auto;
                background-color: #f9f9f9;
                max-width: 95%; /* Prevent wide candidates from overlapping the container */
            }
            

            .candidate img {
                width: 50px;
                height: 50px;
                margin-right: 20px;
                border-radius: 5px;
            }

            .candidate p {
                flex-grow: 1;
                text-align: left;
                margin: 0;
            }

            .vote-button {
                font-size: 16px;
                padding: 10px 20px;
                background-color:rgb(22, 54, 234);
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .vote-button:hover {
                background-color:rgb(22, 54, 234);
            }

                        /* Style for the NOTA word */
            .nota-word {
                display: inline-block; /* Makes the element behave like a box */
                padding: 5px 10px; /* Add padding inside the box */
                border: 2px solid #333; /* Solid border for the box */
                border-radius: 5px; /* Rounded corners */
                background-color:none; /* Light yellow background */
                font-weight: bold; /* Bold text */
                color: #333; /* Dark text color for contrast */
                margin-right: 10px;
            }

             .nota-text {
                display: inline-block;
                margin: 0;
            }

            

            /* Modal Styles */
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.4);
            }

            .modal-content {
                background-color: #fff;
                margin: 15% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 300px;
                text-align: center;
            }

            .modal-button {
                margin: 10px;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
            }

            .yes-btn {
                background-color: #4CAF50;
                color: white;
            }

            .no-btn {
                background-color:rgb(157, 0, 37);
                color: white;
            }

            .show-popup-btn {
                background-color:rgb(147, 68, 169);
                color: white;
                padding: 12px 20px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                border-radius: 5px;
                margin-top: 20px;
            }

            .show-popup-btn:hover {
                background-color: #371c69;
            }
        </style>
    </head>
    <body>
        <div class="evm-container">
            <h1>VidhanSabha Bhotdan</h1>
            <div id="timer"></div>


            <!-- Candidate Section -->
            <ul class="candidate-container">

            <li class="candidate">
                    <img src="images/4.png" alt="Symbol for Candidate 1">
                    <p>All India Trinamool Congress (AITC)
                    <br>অল ইন্ডিয়া তৃণমূল কংগ্রেস 
                    <br>آل انڈیا ترنمول کانگریس
                    </p>
                    <button class="vote-button" onclick="changeColor(this)">01</button>
                </li>
                
                <li class="candidate">
                    <img src="images/2.jpeg" alt="Symbol for Candidate 2">
                    <p>Indian National Congress (INC)
                    <br> भारतीय राष्ट्रीय कांग्रेस
                    <br>انڈین نیشنل کانگریس</p>
                    <button class="vote-button" onclick="changeColor(this)">02</button>
                </li>
                <li class="candidate">
                    <img src="images/28.jpeg" alt="Symbol for Candidate 3">
                    <p>All India Forward Bloc (AIFB)
                    <br>অল ইন্ডিয়া ফরওয়ার্ড ব্লক
                    <br>آل انڈیا فارورڈ بلاک</p>
                    <button class="vote-button" onclick="changeColor(this)">03</button>
                </li>

                <li class="candidate">
                    <img src="images/3.webp" alt="Symbol for Candidate 3">
                    <p>Communist Party of India (CPI)
                    <br>ভারতের কমিউনিস্ট পার্টি
                    <br>کمیونسٹ پارٹی آف انڈیا</p>
                    <button class="vote-button" onclick="changeColor(this)">04</button>
                </li>

                <li class="candidate">
                    <img src="images/29.jpeg" alt="Symbol for Candidate 1">
                    <p>Akhil Bharat Hindu Mahasabha (ABHM)
                        <br>অখিল ভারত হিন্দু মহাসভা
                    <br>اکھل بھارت ہندو مہاسبھا
                </p>
                    <button class="vote-button" onclick="changeColor(this)">05</button>
                </li>


                <li class="candidate">
                    <img src="images/1.jpg" alt="Symbol for Candidate 1">
                    <p>Bharatiya Janata Party (BJP)
                        <br>ভারতীয় জনতা পার্টি
                    <br>بھارتیہ جنتا پارٹی</p>
                    <button class="vote-button" onclick="changeColor(this)">06</button>
                </li>

               

                <li class="candidate">
                    <img src="images/18.jpeg" alt="Symbol for Candidate 3">
                    <p>Hindustani Awam Morcha(Secular)  (HAMS)
                    <br>হিন্দুস্তানি আওয়াম মোর্চা (ধর্মনিরপেক্ষ) 
                    <br>ہندوستانی عوام مورچہ (سیکولر)
                </p>
                    <button class="vote-button" onclick="changeColor(this)">07</button>
                </li>

                <li class="candidate">
                    <img src="images/6.png" alt="Symbol for Candidate 6">
                    <p>Bahujan Samaj Party (BSP)
                        <br>বহুজন সমাজ পার্টি
                        <br>بہوجن سماج پارٹی
                    </p>
                    <button class="vote-button" onclick="changeColor(this)">08</button>
                </li>

                <li class="candidate">
                    <img src="images/30.jpeg" alt="Symbol for Candidate 7">
                    <p>All India Majlis-E-Ittehadul Muslimeen (AIMIM)
                        <br>অল ইন্ডিয়া মজলিস-ই-ইত্তেহাদুল মুসলিমীন
                        <br>وکاسیل انسان پارٹی
                    </p>
                    <button class="vote-button" onclick="changeColor(this)">09</button>
                </li>
                
                <li class="candidate">
                    <img src="images/32.jpeg" alt="Symbol for Candidate 7">
                    <p>AJSU Party (AJSUP)
                        <br>এজেএসইউ পার্টি
                        <br>اے جے ایس یو پارٹی
                    </p>
                    <button class="vote-button" onclick="changeColor(this)">10</button>
                </li>

                <li class="candidate">
                    <img src="images/31.png" alt="Symbol for Candidate 7">
                    <p>Lok Jan Shakti Party (LJP)
                        <br>লোক জনশক্তি পার্টি
                       <br>لوک جن شکتی پارٹی
                    </p>
                    <button class="vote-button" onclick="changeColor(this)">11</button>
                </li>


                <!-- NOTA Section -->
                <li class="candidate">
                <span class="nota-word">NOTA</span>
                        <p  class="nota-text">None Of The Above
                        <br>ইনমে থেকে কোনটিও নেই
                        <br>اوپر سے کوئی نہیں۔
                        </p>
            
                        <button class="vote-button" onclick="changeColor(this)">12</button>
                    
                </li>
            </ul>

            <!-- Popup button -->
            <button class="show-popup-btn" onclick="showModal()">CAST YOUR VOTE</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <p>Your vote has been casted Successfully!!</p>
                    <button class="modal-button yes-btn" onclick="handleYes()">ok</button>
                </div>
            </div>

            

        </div>

        <script>
            function changeColor(button) {
                // Change the clicked button color to red and disable all other buttons
                button.style.backgroundColor = 'red';
                disableOtherButtons(button);
            }

            function disableOtherButtons(exceptButton) {
                const allButtons = document.querySelectorAll('.vote-button');
                allButtons.forEach(button => {
                    if (button !== exceptButton) {
                        button.disabled = true; // Disable all buttons except the clicked one
                    }
                });
            }

            // Modal Handling
            function showModal() {
                document.getElementById("myModal").style.display = "block";
            }

            function handleYes() {
                alert("Thank you for voting.");
                closeModal();
            }

            function handleNo() {
                closeModal();
            }

            function closeModal() {
                document.getElementById("myModal").style.display = "none";
            }

                    //!--To choose one button at atime-->
                            let isVoteCast = false;  // Flag to check if any vote is cast

                function changeColor(button) {
                    // Change the clicked button color to red and disable all other buttons
                    button.style.backgroundColor = 'red';
                    disableOtherButtons(button);
                    
                    // Set the flag to true when a vote is cast
                    isVoteCast = true;
                    
                    // Enable the "Cast Your Vote" button after a vote is cast
                    enableCastVoteButton();
                }

                function disableOtherButtons(exceptButton) {
                    const allButtons = document.querySelectorAll('.vote-button');
                    allButtons.forEach(button => {
                        if (button !== exceptButton) {
                            button.disabled = true; // Disable all buttons except the clicked one
                        }
                    });
                }

                function enableCastVoteButton() {
                    // Enable the "Cast Your Vote" button only if a vote has been cast
                    if (isVoteCast) {
                        document.getElementById("castVoteButton").disabled = false;
                    }
                }

                function showModal() {
                    // Check if any vote has been cast
                    if (!isVoteCast) {
                        alert("Please cast your vote first!");
                        return;  // Prevent showing the modal if no vote is cast
                    }
                    document.getElementById("myModal").style.display = "block";
                }

                function closeModal() {
            document.getElementById("myModal").style.display = "none";
            alert("Thank you for voting!");
            window.location.href = 'review.php';
        }

                

                function closeModal() {
                    document.getElementById("myModal").style.display = "none";
                }


               // Redirect Back and Refresh Actions
            function redirectToHome() {
                window.location.href = "review.php"; // Replace with your home page URL
            }

            // Prevent Back Navigation
            history.pushState(null, null, location.href);
            window.onpopstate = redirectToform;

            // Prevent Page Refresh
            window.onbeforeunload = function () {
                redirectToform();
            };
            // Prevent Back Navigation
                history.pushState(null, null, location.href);
                window.onpopstate = function () {
                    history.pushState(null, null, location.href);
                    alert("Back button is disabled for security reasons!");
                };

                window.onbeforeunload = function () {
    return "Are you sure you want to leave this page? Your vote may not be recorded!";
};



           
        </script>
        
    </body>
</html>
