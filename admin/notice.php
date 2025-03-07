<?php
include("connection.php");
include("auth.php");

// Handle notice insertion
if (isset($_POST['add_notice'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $details_url = $_POST['details_url'];

    $sql = "INSERT INTO notices (title, description, details_url) VALUES ('$title', '$description', '$details_url')";
    $conn->query($sql);
}

// Handle notice deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM notices WHERE id = $id";
    $conn->query($sql);
}

// Handle notice update
if (isset($_POST['update_notice'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $details_url = $_POST['details_url'];

    $sql = "UPDATE notices SET title='$title', description='$description', details_url='$details_url' WHERE id = $id";
    $conn->query($sql);
}

// Fetch all notices
$notices = $conn->query("SELECT * FROM notices");
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
            background-color:lavenderblush;
        }

        .container {
            margin: 20px;
        }

        .form-container,
        .notices-box {
            background: whitesmoke;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-container h3,
        .notices-box h3 {
            margin-bottom: 15px;
        }

        input,
        textarea,
        button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f1f1f1;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions form input {
            width: auto;
        }

        .actions a {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }

        .sidebar {
            width: 300px;
            background-color: white;
            color: #fff;
            height: 200vh;
            position: fixed;
            padding: 15px;
            overflow-y: auto;
        }

        .sidebar a {
            color: #495057;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }

        .main-content {
            margin-left: 270px;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <?php include("sidebar.php"); ?>
    </div>

    <div class="main-content">
        <div class="container">
            <h1>Manage Notices</h1>

            <!-- Add Notice Form -->
            <div class="form-container">
                <h3>Add New Notice</h3>
                <form action="" method="POST">
                    <input type="text" name="title" placeholder="Notice Title" required>
                    <textarea name="description" placeholder="Notice Description" required></textarea>
                    <input type="text" name="details_url" placeholder="Details URL" required>
                    <button type="submit" name="add_notice">Add Notice</button>
                </form>
            </div>

            <!-- Notices Box (Content Box) -->
            <div class="notices-box">
                <h3>Notices</h3>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Details URL</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = $notices->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['details_url']; ?></td>
                        <td class="actions">
                            <form action="" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
                                <input type="text" name="description" value="<?php echo $row['description']; ?>" required>
                                <input type="text" name="details_url" value="<?php echo $row['details_url']; ?>" required>
                                <button type="submit" name="update_notice">Update</button>
                            </form>
                            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>

        </div>
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