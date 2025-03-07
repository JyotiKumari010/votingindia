<?php
// Include database connection
include('connection.php');

// Fetch contact form submissions from the database
$sql = "SELECT * FROM feedback ORDER BY submitted_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting India</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/1.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
/* General Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color:lavenderblush; /* Light background color */
    color: #333;
}

/* Sidebar Styles */
.sidebar {
    width: 280px;
    background-color: #2c3e50; /* Darker sidebar */
    color: #fff;
    height: 100vh;
    position: fixed;
    padding: 20px;
    overflow-y: auto;
    box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
}

.sidebar a {
    color: #ffffff;
    text-decoration: none;
    display: block;
    padding: 12px 20px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-size: 1.1em;
    transition: background-color 0.3s;
}

.sidebar a:hover {
    background-color: #34495e;
}

/* Main Content Styles */
.main-content {
    margin-left: 300px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center; /* Center content horizontally */
}

/* Content Container */
.content {
    background-color: #ffffff;
    padding: 40px;
    width: 100%;
    max-width: 1200px;
    border-radius: 12px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.content:hover {
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
}

/* Headings */
h1 {
    color: #2c3e50;
    font-size: 2.4em;
    margin-bottom: 25px;
    font-weight: 700;
    text-align: center; /* Center align headings */
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden; /* Ensure rounded corners */
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 14px 20px;
    text-align: left;
    font-size: 1em;
}

th {
    background-color: darkblue;
     
    color: #fff;
    font-weight: bold;
}

td {
    background-color: #ecf0f1;
    color: #555;
}

tr:hover {
    background-color: #dfe6e9;
}

/* Form Container */
.form-container {
    background: #ffffff;
    padding: 40px; /* Uniform padding */
    margin: 20px auto; /* Center and add spacing */
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    border: 1px solid #e1e1e1;
    width: 100%;
    max-width: 800px; /* Add max width */
    box-sizing: border-box; /* Include padding in width */
    transition: all 0.3s ease;
}

.form-container h3 {
    color:#2980b9;
    margin-bottom: 15px;
    font-size: 1.9em;
    font-weight: 700;
    text-align: center; /* Center align heading */
}

.form-container input,
.form-container textarea,
.form-container button {
    display: block;
    width: 100%;
    margin: 12px 0;
    padding: 16px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: all 0.3s ease;
    box-sizing: border-box; /* Ensure consistent sizing */
}

.form-container input:focus,
.form-container textarea:focus {
    outline: none;
    border-color: #2980b9;
}



.form-container button {
        background-color: #2980b9;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 16px 20px;
        font-size: 16px;
        font-weight: 600;
        transition: background-color 0.3s ease;
        border-radius: 8px;
    }

    .form-container button:hover {
        background-color: #1f6fa6;
    }


    </style>
</head>
<body>

    <div class="sidebar">
        <?php include("sidebar.php"); ?>
    </div>

    <div class="main-content">
        <div class="content">
            <h1>Feedback</h1>

            <!-- Contact Submissions Table -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Submitted At</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any results
                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['rating'] . "</td>
                                <td>" . $row['comment'] . "</td>
                                <td>" . $row['submitted_at'] . "</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No feedback till now</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>

 
  <!-- Footer (if necessary) -->
  <?php include("footer.php"); ?>
  
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>

</body>
</html>



