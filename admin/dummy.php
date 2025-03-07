<?php
include("connection.php");
include("auth.php");

if (isset($_POST['add_voters'])) {
    $target_dir = "uploads/";
    $file_name = basename($_FILES["voters_photo"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate party symbol file type
    if (!in_array($imageFileType, ["jpg", "png", "jpeg", "webp"])) {
        echo "Sorry, only JPG, JPEG, & PNG files are allowed for party symbol.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["voters_photo"]["tmp_name"], $target_file)) {
            $aadhaar = $conn->real_escape_string($_POST['aadhaar']);
            $father_name = $conn->real_escape_string($_POST['father_name']);
            $voter_id = $conn->real_escape_string($_POST['voter_id']);
            $voters_address = $conn->real_escape_string($_POST['voters_address']);
            $constituency = $conn->real_escape_string($_POST['constituency']);

            $sql = "INSERT INTO public (aadhaar, voters_photo, father_name, voter_id, voters_address, constituency) 
                            VALUES ('$aadhaar', '$target_file', '$father_name', '$voter_id', '$voters_address', '$constituency')";
            if ($conn->query($sql)) {
                // Redirect to the same page after successful insertion
                header("Location: dummy.php");
                exit();
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading the voters photo.";
        }
    }
}
    



// Delete Voters
if (isset($_GET['delete'])) {
    $aadhaar = $conn->real_escape_string($_GET['delete']); // Sanitize input
    $sql = "DELETE FROM public WHERE aadhaar = '$aadhaar'";
    if ($conn->query($sql)) {
        header("Location: dummy.php"); // Redirect after deletion
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Update Party
if (isset($_POST['update_public'])) {
    $aadhaar = $conn->real_escape_string($_POST['aadhaar']); // Sanitize input
    $father_name = $conn->real_escape_string($_POST['father_name']);
    $voter_id = $conn->real_escape_string($_POST['voter_id']);
    $voters_address = $conn->real_escape_string($_POST['voters_address']);
    $constituency = $conn->real_escape_string($_POST['constituency']);

    // Check if a new file is uploaded
    if (!empty($_FILES["voters_photo"]["name"])) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["voters_photo"]["name"]);
        $target_file = $target_dir . time() . "_" . $file_name;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($imageFileType, ["jpg", "png", "jpeg", "webp"])) {
            if (move_uploaded_file($_FILES["voters_photo"]["tmp_name"], $target_file)) {
                $sql = "UPDATE public 
                        SET voters_photo = '$target_file', 
                            father_name = '$father_name', 
                            voter_id = '$voter_id', 
                            voters_address = '$voters_address',
                            constituency = '$constituency' 
                        WHERE aadhaar = '$aadhaar'";
            }
        }
    } else {
        $sql = "UPDATE public 
                        SET father_name = '$father_name', 
                            voter_id = '$voter_id', 
                            voters_address = '$voters_address',
                            constituency = '$constituency' 
                        WHERE aadhaar = '$aadhaar'";
    }

    if ($conn->query($sql)) {
        header("Location: dummy.php"); // Redirect after update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


// Fetch all parties
$party = $conn->query("SELECT * FROM public");
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
    flex-direction: row;
    height: 100vh;
}

.sidebar {
    width: 300px;
    background-color: white;
    color: #495057;
    height: 100vh; /* Ensure sidebar takes the full screen height */
    position: fixed;
    padding: 15px;
    overflow-y: auto;
}

.main-content {
    margin-left: 300px; /* Sidebar width */
    padding: 20px;
    width: calc(100% - 300px); /* Main content takes the remaining width */
    height: 100%; /* Full height to prevent content from being cut off */
    overflow-y: auto; /* Ensures the main content is scrollable if necessary */
}

.container {
    width: 100%;
    max-width: 100%; /* Increased max-width for container */
    margin-left: 15%; /* Set margin-left to 20% or any other value */
    margin-top: 0px;
    padding: 0;
}

.form-table-container {
    width: 80%;
    margin: auto;
    margin-top: 40px;
    padding: 20px;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

h1 {
    text-align: center;
    color: rgb(1, 4, 7);
}

form {
    background: rgb(93, 153, 216);
    color: white;
    padding: 30px; /* Increased padding inside the form */
    border-radius: 10px; /* Slightly larger border radius */
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3); /* Larger shadow */
    margin-bottom: 80px;
    width: 100%;
    max-width: 850px; /* Increased max-width of the form */
    margin: auto;
}

form label {
    font-weight: bold;
    margin: 0;
}

form input[type="text"],
form input[type="file"],
form button {
    display: block;
    width: 100%;
    margin-bottom: 15px;
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
    margin-top: 50px;
}

table th,
table td {
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

.actions .update {
    background-color: #28a745;
    color: white;
}

.actions .update:hover {
    background-color: #218838;
}

.actions .delete {
    background-color: #dc3545;
    color: white;
}

.actions .delete:hover {
    background-color: rgb(197, 29, 45);
}

.update-form {
    display: none;
    background: rgb(93, 153, 216);
    color: white;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 50px;
    width: 80%;
    margin: 0 auto;
}

@media (max-width: 768px) {
    .container {
        width: 100%;
        padding: 10px;
    }

    table {
        font-size: 14px;
    }

    table th,
    table td {
        padding: 8px;
    }

    form input[type="text"],
    form input[type="file"],
    form button {
        padding: 8px;
    }

    form {
        padding: 15px;
    }

    h1 {
        font-size: 24px;
    }

    .actions button {
        font-size: 12px;
        padding: 5px 8px;
    }
}

@media (max-width: 480px) {
    h1 {
        font-size: 20px;
    }

    form {
        padding: 10px;
    }

    form input[type="text"],
    form input[type="file"],
    form button {
        padding: 6px;
    }

    table th,
    table td {
        font-size: 12px;
        padding: 6px;
    }

    .actions button {
        font-size: 10px;
        padding: 4px 6px;
    }
}

    </style>
</head>

<body>

<!--sidebar-->
<div class="sidebar">
        <?php include("sidebar.php"); ?>
    </div>



    <div class="container">
    <div class="form-table-container">
        <h1>Manage Voters </h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="aadhaar">Aadhaar:</label>
            <input type="text" name="aadhaar" id="aadhaar" required>

            <label for="voters_photo">Upload Voter Photo:</label>
            <input type="file" name="voters_photo" id="voters_photo" >

            <label for="father_name">Father's/Husband's Name:</label>
            <input type="text" name="father_name" id="father_name" required>

            <label for="voter_id">Voter ID:</label>
            <input type="text" name="voter_id" id="voter_id">

            <label for="voters_address">Voters Address:</label>
            <input type="text" name="voters_address" id="voters_address" required>

            <label for="constituency">Constituency:</label>
            <input type="text" name="constituency" id="constituency" required>

            <button type="submit" name="add_voters">Add Voters</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Aadhaar</th>
                    <th>Voter's Photo</th>
                    <th>Father's Name</th>
                    <th>Voter ID</th>
                    <th>Voters Address</th>
                    <th>Constituency</th>
                    <th>Actions</th>
                    <th>Uploaded At</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $party->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['aadhaar']; ?></td>
                        <td><img src="<?php echo $row['voters_photo']; ?>" width="70" height="90" alt="Not Available"></td>
                        <td><?php echo $row['father_name']; ?></td>
                        <td><?php echo $row['voter_id']; ?></td>
                        <td><?php echo $row['voters_address']; ?></td>
                        <td><?php echo $row['constituency']; ?></td>
                        <td class="actions">
                            <!--Update Button-->
                            <button class="update" onclick="showUpdateForm(<?php echo $row['aadhaar']; ?>)">Update</button>

                            <!-- Update Form - Hidden initially -->
                            <form id="update-form-<?php echo $row['aadhaar']; ?>" class="update-form" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="aadhaar" value="<?php echo $row['aadhaar']; ?>">
                                <label>Change Photo (Optional):</label>
                                <input type="file" name="voters_photo">

                                <input type="text" name="father_name" value="<?php echo $row['father_name']; ?>" required>

                                <input type="text" name="voter_id" value="<?php echo $row['voter_id']; ?>">

                                <input type="text" name="voters_address" value="<?php echo $row['voters_address']; ?>" required>

                                <input type="text" name="constituency" value="<?php echo $row['constituency']; ?>" required>

                                <button type="submit" name="update_public" class="update">Update</button>
                            </form>

                            <a href="?delete=<?php echo $row['aadhaar']; ?>" class="delete">Delete</a>
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
    // Show the update form when clicking the update button
    function showUpdateForm(aadhaar) {
        var form = document.getElementById("update-form-" + aadhaar);
        form.style.display = form.style.display === "none" || form.style.display === "" ? "block" : "none"; // Toggle visibility
    }
</script>

</html>