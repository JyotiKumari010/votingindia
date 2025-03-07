<?php

include("connection.php");
include("auth.php");

// Handle form submission for adding a new entry
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $selectedItem = $_POST['dropdown'];
    $pdfFile = $_FILES['pdf']['name'];

    if (!empty($selectedItem) && !empty($pdfFile)) {
        // Upload PDF
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($pdfFile);
        if (move_uploaded_file($_FILES['pdf']['tmp_name'], $targetFile)) {
            // Insert into database
            $stmt = $conn->prepare("INSERT INTO uploads (selected_item, pdf_path) VALUES (?, ?)");
            $stmt->bind_param("ss", $selectedItem, $targetFile);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    }
}

// Handle deletion
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM uploads WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

// Handle update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $selectedItem = $_POST['dropdown'];
    $pdfFile = $_FILES['pdf']['name'];
    $updateQuery = "UPDATE uploads SET selected_item = ?";
    $params = [$selectedItem];
    $types = "s";

    if (!empty($pdfFile)) {
        // Upload PDF if provided
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($pdfFile);
        if (move_uploaded_file($_FILES['pdf']['tmp_name'], $targetFile)) {
            $updateQuery .= ", pdf_path = ?";
            $params[] = $targetFile;
            $types .= "s";
        }
    }

    $updateQuery .= " WHERE id = ?";
    $params[] = $id;
    $types .= "i";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $stmt->close();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting India</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/1.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kMVqNz4U35RhdPjrcwq2e4+V6qEmIyyjW1EYzP7mVFiEbRQU8I8HmlTY+pMYYBEMZ8EvoIQ7Mv9lw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* General Body Style */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            background-color: #f9f9f9;
            overflow-x: hidden;  /* Prevent horizontal scrolling */
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 300px;
            background-color: #fff;
            color: #495057;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 15px;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Main Content Area */
        .main-content {
            margin-left: 320px;  /* Adjusted to make room for the sidebar */
            padding: 20px;
            flex: 1;
            overflow-x: hidden;  /* Prevents horizontal scroll */
            overflow-y: auto;  /* Allow vertical scrolling */
        }

        /* Content Container - Centering the form and table */
        .content-container {
            width: 80%;  /* Adjust the width of the content box */
            max-width: 1000px;  /* Set a maximum width */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
            overflow-y: auto;  /* Allows vertical scrolling */
        }

        /* Header Text */
        h1, h2 {
            font-size: 24px;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Form Style */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        input[type="file"],
        select,
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Table Style */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        td a {
            color: #007bff;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions form {
            display: inline;
        }

        .actions a {
            color: #e74c3c;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 250px;
            }

            .main-content {
                margin-left: 270px;
            }

            table, th, td {
                font-size: 14px;
            }

            .content-container {
                width: 90%;
            }
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <?php include("sidebar.php"); ?>
</div>

<div class="main-content">
    <div class="content-container">
        <h1>Upload Pdf For Election Management</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="dropdown">Choose an option:</label>
            <select name="dropdown" id="dropdown" required>
                <option value="" disabled selected>Select an option</option>
                <option value="Nominated Candidates">Nominated Candidates</option>
                <option value="Lok Sabha Election Candidate List">Lok Sabha Election Candidate List</option>
                <option value="State Assembly Election Candidate List">State Assembly Election Candidate List</option>
                <option value="Municipal Election Candidate List">Municipal Election Candidate List</option>
                <option value="Panchayat Election Candidate List">Panchayat Election Candidate List</option>
            </select>
            
            <label for="pdf">Upload PDF:</label>
            <input type="file" name="pdf" id="pdf" accept=".pdf">
            
            <button type="submit" name="submit">Upload</button>
        </form>

        <h2>Uploaded Data</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Selected Type</th>
                    <th>PDF</th>
                    <th>Uploaded At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM uploads");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['selected_item']}</td>
                            <td><a href='{$row['pdf_path']}' target='_blank'>View PDF</a></td>
                            <td>{$row['uploaded_at']}</td>
                            <td class='actions'>
                                <a href='?delete={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                <form method='POST' enctype='multipart/form-data'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <select name='dropdown' required>
                                        <option value='' disabled>Select an option</option>
                                        <option value='Nominated Candidates'>Nominated Candidates</option>
                                        <option value='Lok Sabha Election Candidate List'>Lok Sabha Election Candidate List</option>
                                        <option value='State Assembly Election Candidate List'>State Assembly Election Candidate List</option>
                                        <option value='Municipal Election Candidate List'>Municipal Election Candidate List</option>
                                        <option value='Panchayat Election Candidate List'>Panchayat Election Candidate List</option>
                                    </select>
                                    <input type='file' name='pdf' accept='.pdf'>
                                    <button type='submit' name='update'>Update</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

    <?php include("footer.php"); ?>


<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/sidebarmenu.js"></script>
<script src="assets/js/script.min.js"></script>

</body>
</html>
