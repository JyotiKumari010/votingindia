<?php
session_start();  // Start session

// Include the database connection
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Form data validation
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $dob = $_POST['dob'];
    $aadhaar = mysqli_real_escape_string($conn, $_POST['aadhaar']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Calculate age
    $dob_date = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dob_date)->y;

    // Age validation (user must be at least 18 years old)
    if ($age < 18) {
        echo "<script>alert('You must be at least 18 years old to register.'); window.location='signup.php';</script>";
        exit();
    }

    // Check if password matches the confirmation
    if ($password != $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location='signup.php';</script>";
        exit();
    }


    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if Aadhaar is already taken
    $sql = "SELECT * FROM voters WHERE aadhaar='$aadhaar'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Aadhaar already registered!'); window.location='signup.php';</script>";
    } else {
        // Insert user into the database with the photo path
        $sql = "INSERT INTO voters (fullname, phone, dob, aadhaar, email, password) 
                VALUES ('$fullname', '$phone', '$dob', '$aadhaar', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful! Please log in.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "'); window.location='signup.php';</script>";
        }
    }
}




$conn->close();
?>
