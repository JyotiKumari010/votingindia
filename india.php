<?php include 'visit.php'; ?>

<?php include 'connection.php';



// Function to encrypt the vote
function encryptVote($vote) {
    $secret_key = "your_static_secret_key"; // Fixed key
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
    <title>Vote Page</title>
    <script src="timer.js"></script> 
    <style>
        /* Set the overall page styles */
        body {
                font-family: Arial, sans-serif; /* Use a clean sans-serif font for readability */
                margin: 0; /* Remove default browser margins */
                padding: 0; /* Remove default browser padding */
                background-color: #f4f4f4; /* Light gray background for the entire page */
                display: flex; /* Use flexbox for centering */
                justify-content: center; /* Center the container horizontally */
                align-items: flex-start; /* Align items at the top */
                min-height: 100vh; /* Ensure the page covers the full viewport height */
            }

            /* Styling for the voting container */
            .evm-container {
                text-align: center; /* Center-align all text inside the container */
                background-color: #fff; /* White background for contrast */
                border: 2px solid #ccc; /* Light gray border */
                border-radius: 10px; /* Round the corners of the container */
                padding: 20px; /* Add padding inside the container */
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* Add a shadow for depth */
                width: 90%; /* Set container width to 90% of the viewport width */
                max-width: 600px; /* Limit the maximum width of the container */
            }

            /* Styling for the heading */
            h1 {
                margin-bottom: 20px; /* Add space below the heading */
                color: #333; /* Dark gray color for the heading text */
            }

            /* Styling for the candidate list */
            .candidate-container {
                list-style-type: none; /* Remove default list bullet points */
                margin: 0; /* Remove default margin */
                padding: 0; /* Remove default padding */
            }

            /* Styling for each candidate item */
            .candidate {
                display: flex; /* Use flexbox to align content horizontally */
                align-items: center; /* Vertically align items in the center */
                justify-content: space-between; /* Space items evenly with space in-between */
                border: 1px solid #ccc; /* Add a border around each candidate item */
                border-radius: 5px; /* Round the corners of each item */
                padding: 10px; /* Add padding inside each item */
                margin: 10px auto; /* Add margin and center-align the item */
                background-color: #f9f9f9; /* Light background color for each item */
                max-width: 95%; /* Prevent items from overlapping the container */
            }

            /* Styling for candidate images */
            .candidate img {
                width: 50px; /* Set image width */
                height: 50px; /* Set image height */
                margin-right: 20px; /* Add space to the right of the image */
                border-radius: 5px; /* Slightly round the corners of the image */
            }

            /* Styling for candidate text */
            .candidate p {
                flex-grow: 1; /* Allow the text to take up remaining space */
                text-align: left; /* Align text to the left */
                margin: 0; /* Remove default margin */
            }

            /* Styling for the vote button */
            .vote-button {
                font-size: 16px; /* Set button text size */
                padding: 10px 20px; /* Add padding inside the button */
                background-color: #4CAF50; /* Green background color */
                color: white; /* White text color */
                border: none; /* Remove default border */
                border-radius: 5px; /* Round the corners of the button */
                cursor: pointer; /* Show a pointer cursor on hover */
            }

            /* Hover effect for the vote button */
            .vote-button:hover {
                background-color: #45a049; /* Darker green on hover */
            }

            /* Styling for the NOTA option */
            .nota-word {
                display: inline-block; /* Make the element a box */
                padding: 5px 10px; /* Add padding inside the box */
                border: 2px solid #333; /* Solid border for the box */
                border-radius: 5px; /* Rounded corners */
                font-weight: bold; /* Bold text */
                color: #333; /* Dark text color for contrast */
                margin-right: 10px; /* Add space to the right of the box */
            }

            .nota-text {
                display: inline-block; /* Keep text inline with NOTA */
                margin: 0; /* Remove default margin */
            }

            /* Modal styling */
            .modal {
                display: none; /* Hide the modal by default */
                position: fixed; /* Fixed position for the modal */
                z-index: 1; /* Set a high z-index to overlay other content */
                left: 0; /* Position at the left edge */
                top: 0; /* Position at the top edge */
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent black background */
            }

            /* Modal content box styling */
            .modal-content {
                background-color: #fff; /* White background for the modal */
                margin: 15% auto; /* Center the modal vertically and horizontally */
                padding: 20px; /* Add padding inside the modal */
                border: 1px solid #888; /* Light gray border */
                width: 300px; /* Set modal width */
                text-align: center; /* Center-align modal content */
            }

            /* Styling for the modal OK button */
            .modal-button {
                padding: 10px 20px; /* Add padding inside the button */
                background-color: #4CAF50; /* Green background */
                color: white; /* White text */
                border: none; /* Remove default border */
                cursor: pointer; /* Show pointer cursor on hover */
                border-radius: 5px; /* Round the corners */
            }

            .modal-button:hover {
                background-color: #45a049; /* Darker green on hover */
            }

            /* Styling for the "CAST YOUR VOTE" button */
            .show-popup-btn {
                background-color: #452882; /* Purple background color */
                color: white; /* White text color */
                padding: 12px 20px; /* Add padding inside the button */
                font-size: 16px; /* Set button text size */
                border: none; /* Remove default border */
                cursor: pointer; /* Show pointer cursor on hover */
                border-radius: 5px; /* Round the corners of the button */
                margin-top: 20px; /* Add space above the button */
            }

            .show-popup-btn:hover {
                background-color: #371c69; /* Darker purple on hover */
            }
    </style>
</head>
<body>
    <div class="evm-container">
        <h1>Voting For Lok Sabha</h1>
        <div id="timer"></div>

        <!-- Candidate Section -->
        <ul class="candidate-container">
            <?php
            // Fetch party details from the database
            $partyQuery = $conn->query("SELECT * FROM party");
            $candidateCounter = 1;
            while ($party = $partyQuery->fetch_assoc()) {
            ?>
                <li class="candidate">
                    <td><img src="admin/<?php echo $party['party_symbol']; ?>" width="60" height="50" alt="Party Symbol"></td>
                    <p>
                        <?php echo $party['party_name_english']; ?>
                        <br><?php echo $party['party_name_urdu']; ?>
                        <br><?php echo $party['party_name_local']; ?>
                    </p>
                    <button class="vote-button" onclick="handleVote(this, '<?php echo $party['party_name_english']; ?>')">
                        <?php echo $candidateCounter; ?>
                    </button>
                </li>
            <?php
                $candidateCounter++;
            }
            ?>

            

        <!-- Popup button -->
        <button class="show-popup-btn" onclick="showModal()">CAST YOUR VOTE</button>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <p>Your vote has been securely registered!</p>
                <button class="modal-button" onclick="closeModal()">OK</button>
            </div>
        </div>

        <!-- Display vote count 
        <h2>Live Voting Results</h2>
        <table border="1">
            <tr>
                <th>Party Name</th>
                <th>Votes</th>
            </tr>
            <?php while ($result = $vote_results->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $result['party_name_english']; ?></td>
                <td><?php echo $result['votes_count']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>-->

    <script>
        function handleVote(button, partyName) {
            button.style.backgroundColor = 'red'; // Highlight the clicked button
            const allButtons = document.querySelectorAll('.vote-button');
            allButtons.forEach(btn => btn.disabled = true); // Disable all buttons

            // Submit the vote
            fetch(window.location.href, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `vote=${encodeURIComponent(partyName)}`
            }).then(response => response.text()).then(data => console.log(data));
        }

        function showModal() {
            document.getElementById("myModal").style.display = "block";
        }

        
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
            alert("Thank you for voting!");
            window.location.href = 'badge.php';
        }
    </script>
</body>
</html>
