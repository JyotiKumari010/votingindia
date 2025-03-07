<?php
include 'connection.php';

// Function to decrypt the vote using a static key
function decryptVote($encrypted_vote) {
    $cipher = "aes-256-cbc";
    $secret_key = "your_static_secret_key"; // Replace with the correct secret key used for encryption

    // Split IV and encrypted data
    $parts = explode("::", base64_decode($encrypted_vote), 2);
    if (count($parts) < 2) {
        return false; // Invalid format
    }

    list($iv, $encrypted_data) = $parts;
    return openssl_decrypt($encrypted_data, $cipher, $secret_key, 0, $iv);
}

// Fetch only encrypted votes that haven't been counted yet
$get_votes_query = "SELECT id, encrypted_vote FROM state_votes WHERE is_counted = 0"; // Assuming `is_counted` is a column in `votes` table

if ($result = $conn->query($get_votes_query)) {
    if ($result->num_rows == 0) {
       // echo "No uncounted votes found in votes table!<br>";
    } else {
        while ($row = $result->fetch_assoc()) {
            $vote_id = $row['id'];
            $encrypted_vote = $row['encrypted_vote'];

            // Decrypt the vote
            $decrypted_vote = decryptVote($encrypted_vote);

            if (!$decrypted_vote) {
                //echo "Decryption failed for vote ID: $vote_id <br>";
                continue; // Skip if decryption fails
            } else {
               // echo "Decrypted vote: $decrypted_vote <br>";
            }

            // Update vote count
            $update_query = "INSERT INTO state_votes_count (party_name, total_votes) VALUES ('$decrypted_vote', 1) ON DUPLICATE KEY UPDATE total_votes = total_votes + 1";

            if (!$conn->query($update_query)) {
                // Handle the error here
                //echo "Error updating vote count: " . $conn->error;
            } else {
                // Mark the vote as counted
                $mark_counted_query = "UPDATE state_votes SET is_counted = 1 WHERE id = $vote_id";
                if (!$conn->query($mark_counted_query)) {
                    //echo "Error marking vote as counted: " . $conn->error;
                }
            }
        }
    }
} else {
    echo "SQL Error: " . $conn->error;
}
?>