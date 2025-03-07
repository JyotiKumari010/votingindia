<?php include 'visit.php'; ?>

<?php
include 'connection.php'; // Include the connection script



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user input to avoid XSS attacks
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $category = htmlspecialchars($_POST['category']);
    $message = htmlspecialchars($_POST['message']);

    // Create the SQL query to insert the data
    $sql = "INSERT INTO contact_us (name, email, phone, category, message) 
            VALUES ('$name', '$email', '$phone', '$category', '$message')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        // Redirect to the home page after successful insertion
        header("Location: home.php");
        exit();
    } else {
        // Handle any errors during insertion
        die("Error saving your message: " . $conn->error);
    }
}
?>
