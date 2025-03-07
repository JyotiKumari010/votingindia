<?php
include 'connection.php';


// Page ka naam aur current date
$page_name = basename($_SERVER['PHP_SELF']); // Current page ka naam
$date = date("Y-m-d");

// Check karein ki aaj ke date ke liye page pehle visit hua hai ya nahi
$sql = "SELECT * FROM user_visits WHERE page_name = '$page_name' AND visit_date = '$date'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Agar visit already exist hai to visit_count ko increase karein
    $conn->query("UPDATE user_visits SET visit_count = visit_count + 1 WHERE page_name = '$page_name' AND visit_date = '$date'");
} else {
    // Naya visit insert karein
    $conn->query("INSERT INTO user_visits (page_name, visit_date) VALUES ('$page_name', '$date')");
}


//echo "Success";
$conn->close();


?>
