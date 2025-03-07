<?php
// Database connection (Make sure $conn is defined before this block)
include 'connection.php'; // Change this to your actual database connection file

if (isset($_POST['aadhaar'])) {
    // Trim and sanitize Aadhaar input
    $aadhaar = trim($_POST['aadhaar']);
    $aadhaar = preg_replace('/\D/', '', $aadhaar); // Remove non-numeric characters

    // Check if connection exists
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements for better security
    $stmt = $conn->prepare("SELECT * FROM public WHERE aadhaar = ?");
    $stmt->bind_param("s", $aadhaar);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'valid'; 
    } else {
        echo 'invalid'; 
    }

    $stmt->close();
}
?>
