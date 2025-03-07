<?php
include("connection.php");
include("auth.php");

if (isset($_POST['add_party'])) {
    $target_dir = "uploads/";
    $file_name = basename($_FILES["party_symbol"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate party symbol file type
    if (!in_array($imageFileType, ["jpg", "png", "jpeg"])) {
        echo "Sorry, only JPG, JPEG, & PNG files are allowed for party symbol.";
        $uploadOk = 0;
    }

    // Handle background file if uploaded
    $background_file = null;
    if (!empty($_FILES["background"]["name"])) {
        $bg_file_name = basename($_FILES["background"]["name"]);
        $background_file = $target_dir . time() . "bg" . $bg_file_name;
        $bgFileType = strtolower(pathinfo($background_file, PATHINFO_EXTENSION));

        // Validate background file type
        if (!in_array($bgFileType, ["jpg", "png", "jpeg"])) {
            echo "Sorry, only JPG, JPEG, & PNG files are allowed for background.";
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 1) {
        // Upload files
        if (move_uploaded_file($_FILES["party_symbol"]["tmp_name"], $target_file)) {
            if ($background_file && !move_uploaded_file($_FILES["background"]["tmp_name"], $background_file)) {
                echo "Sorry, there was an error uploading the background file.";
                $background_file = null;
            }

            $party_name_english = $conn->real_escape_string($_POST['party_name_english']);
            $party_name_urdu = $conn->real_escape_string($_POST['party_name_urdu']);
            $party_name_local = $conn->real_escape_string($_POST['party_name_local']);

            $sql = "INSERT INTO state_party (party_symbol, party_name_english, party_name_urdu, party_name_local, background) 
                    VALUES ('$target_file', '$party_name_english', '$party_name_urdu', '$party_name_local', '$background_file')";
            if ($conn->query($sql)) {
                // Redirect to the same page after successful insertion
                header("Location: state_party.php");
                exit();
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading the party symbol.";
        }
    }
}



// Delete Party
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // Sanitize input
    $sql = "DELETE FROM state_party WHERE id = $id";
    if ($conn->query($sql)) {
        header("Location: state_party.php"); // Redirect after deletion
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if (isset($_POST['update_state_party'])) {
    $id = intval($_POST['id']); // Sanitize input
    $party_name_english = $conn->real_escape_string($_POST['party_name_english']);
    $party_name_urdu = $conn->real_escape_string($_POST['party_name_urdu']);
    $party_name_local = $conn->real_escape_string($_POST['party_name_local']);

    $setClause = "party_name_english = '$party_name_english', 
                  party_name_urdu = '$party_name_urdu', 
                  party_name_local = '$party_name_local'";

    // Handle party symbol update
    if (!empty($_FILES["party_symbol"]["name"])) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["party_symbol"]["name"]);
        $target_file = $target_dir . time() . "_" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ["jpg", "png", "jpeg"])) {
            if (move_uploaded_file($_FILES["party_symbol"]["tmp_name"], $target_file)) {
                $setClause .= ", party_symbol = '$target_file'";
            } else {
                echo "Error uploading party symbol.";
            }
        } else {
            echo "Invalid file type for party symbol.";
        }
    }

    // Handle background update
    if (!empty($_FILES["background"]["name"])) {
        $bg_file_name = basename($_FILES["background"]["name"]);
        $background_file = $target_dir . time() . "_bg_" . $bg_file_name;
        $bgFileType = strtolower(pathinfo($background_file, PATHINFO_EXTENSION));

        if (in_array($bgFileType, ["jpg", "png", "jpeg"])) {
            if (move_uploaded_file($_FILES["background"]["tmp_name"], $background_file)) {
                $setClause .= ", background = '$background_file'";
            } else {
                echo "Error uploading background.";
            }
        } else {
            echo "Invalid file type for background.";
        }
    }

    // Ensure SQL statement is always valid
    $sql = "UPDATE state_party SET $setClause WHERE id = $id";

    if ($conn->query($sql)) {
        header("Location: state_party.php"); // Redirect after update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


// Fetch all parties
$party = $conn->query("SELECT * FROM state_party");
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: white;
            padding: 15px;
            min-height: 100vh;
            position: fixed;
            overflow-y: auto;
        }
        .main-content {
            margin-left: 270px;
            padding: 20px;
            width: calc(100% - 270px);
        }
        .container {
            max-width: 1000px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #004494;
            margin-bottom: 20px;
        }
        form {
            background: #5d99d8;
            color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }
        form label {
            font-weight: bold;
        }
        form input, form button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }
        form button {
            background: #0056b3;
            color: white;
            cursor: pointer;
        }
        form button:hover {
            background: #004494;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        .actions button {
            margin: 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .update { background-color: #28a745; color: white; }
        .update:hover { background-color: #218838; }
        .delete { background-color: #dc3545; color: white; }
        .delete:hover { background-color: #c82333; }
        .update-form {
            display: none;
            background: #5d99d8;
            color: white;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-top: 10px;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                min-height: auto;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <?php include("sidebar.php"); ?>
    </div>
    <div class="main-content">
        <div class="container">
            <h1>Manage Political Parties</h1>
            <form method="POST" enctype="multipart/form-data">
                <label>Upload Party Symbol:</label>
                <input type="file" name="party_symbol" required>
                <label>Party Name (English):</label>
                <input type="text" name="party_name_english" required>
                <label>Party Name (Urdu):</label>
                <input type="text" name="party_name_urdu" required>
                <label>Party Name (Local):</label>
                <input type="text" name="party_name_local" required>
                <label>Add Background (Optional):</label>
                <input type="file" name="background">
                <button type="submit" name="add_party">Add Party</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Symbol</th>
                        <th>Party Name (English)</th>
                        <th>Party Name (Urdu)</th>
                        <th>Party Name (Local)</th>
                        <th>Background</th>
                        <th>Actions</th>
                        <th>Uploaded At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $party->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><img src="<?php echo $row['party_symbol']; ?>" width="50" height="50"></td>
                            <td><?php echo $row['party_name_english']; ?></td>
                            <td><?php echo $row['party_name_urdu']; ?></td>
                            <td><?php echo $row['party_name_local']; ?></td>
                            <td><?php echo !empty($row['background']) ? '<img src="' . $row['background'] . '" width="50" height="50">' : 'No background'; ?></td>
                            <td>
                                <button class="update" onclick="showUpdateForm(<?php echo $row['id']; ?>)">Update</button>
                                <form id="update-form-<?php echo $row['id']; ?>" class="update-form" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="text" name="party_name_english" value="<?php echo $row['party_name_english']; ?>" required>
                                    <input type="text" name="party_name_urdu" value="<?php echo $row['party_name_urdu']; ?>" required>
                                    <input type="text" name="party_name_local" value="<?php echo $row['party_name_local']; ?>" required>
                                    <label>Change Symbol (Optional):</label>
                                    <input type="file" name="party_symbol">
                                    <label>Change Background (Optional):</label>
                                    <input type="file" name="background">
                                    <button type="submit" name="update_party">Update</button>
                                </form>
                                <a href="?delete=<?php echo $row['id']; ?>" class="delete">Delete</a>
                            </td>
                            <td><?php echo $row['uploaded_at']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
function showUpdateForm(id) {
    var form = document.getElementById("update-form-" + id);
    form.style.display = form.style.display === "none" ? "block" : "none";
}
</script>

</html>
