<?php
include("connection.php");
include("auth.php");

// Add Notice
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_notice'])) {
    $notice_text = $_POST['notice_text'];
    $notice_link = $_POST['notice_link'];

    $stmt = $conn->prepare("INSERT INTO moving (notice_text, notice_link) VALUES (?, ?)");
    $stmt->bind_param("ss", $notice_text, $notice_link);
    $stmt->execute();
    $stmt->close();
}

// Delete Notice
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $conn->query("DELETE FROM moving WHERE id = $id");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting India </title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/1.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kMVqNz4U35RhdPjrcwq2e4+V6qEmIyyjW1EYzP7mVFiEbRQU8I8HmlTY+pMYYBEMZ8EvoIQ7Mv9lw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: lavenderblush;
            color: #333;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #fff;
            height: 100vh;
            position: fixed;
            padding: 15px;
            overflow-y: auto;
        }

        .sidebar a {
            color: #bdc3c7;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background-color: #34495e;
            color: #fff;
        }

        .main-content {
            margin-left: 270px;
            padding: 20px;
            background-color: #fff;
            min-height: 100vh;
        }

        h1, h2 {
            color: #34495e;
            text-align: center; /* Center the heading */
            margin-bottom: 20px; /* Adds space below the heading */
        }

        .form-container {
            margin-bottom: 20px;
            background: #ecf0f1;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        form label {
            font-weight: bold;
            color: #2c3e50;
        }

        form input {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
        }

        form button {
            background-color: #3498db;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #ecf0f1;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #34495e;
            color: #fff;
        }

        table td a {
            color: #3498db;
            text-decoration: none;
        }

        table td a:hover {
            text-decoration: underline;
        }

        .delete-btn {
            color: red;
            font-weight: bold;
            cursor: pointer;
        }

        .delete-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <?php include("sidebar.php"); ?>
    </div>

    <div class="main-content">
        <h1>Manage Notices</h1>

        <div class="form-container">
            <h2>Add a New Notice</h2>
            <form method="POST" action="" style="display: flex; flex-direction: column; gap: 15px;">
                <div style="display: flex; flex-direction: column;">
                    <label for="notice_text">Notice Text:</label>
                    <input 
                        type="text" 
                        id="notice_text" 
                        name="notice_text" 
                        placeholder="Enter notice text here" 
                        required 
                        style="font-size: 14px; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <div style="display: flex; flex-direction: column;">
                    <label for="notice_link">Notice Link:</label>
                    <input 
                        type="text" 
                        id="notice_link" 
                        name="notice_link" 
                        placeholder="Enter link for the notice (e.g., http://example.com)" 
                        required 
                        style="font-size: 14px; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <button 
                    type="submit" 
                    name="add_notice" 
                    style="background-color: #3498db; color: white; padding: 12px 20px; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
                    Add Notice
                </button>
            </form>
        </div>

        <h2>Existing Notices</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Notice Text</th>
                <th>Notice Link</th>
                <th>Action</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM moving");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['notice_text']}</td>
                    <td><a href='{$row['notice_link']}' target='_blank'>{$row['notice_link']}</a></td>
                    <td><a href='?delete_id={$row['id']}' class='delete-btn'>Delete</a></td>
                </tr>";
            }
            ?>
        </table>
    </div>

    
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
<?php $conn->close(); ?>
