Share


You said:
<?php
include("connection.php");
include("auth.php");

// Handle FAQ insertion
if (isset($_POST['add_faq'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $sql = "INSERT INTO faq (question, answer) VALUES ('$question', '$answer')";
    $conn->query($sql);
}

// Handle FAQ deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM faq WHERE id = $id";
    $conn->query($sql);
}

// Handle FAQ update
if (isset($_POST['update_faq'])) {
    $id = $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $sql = "UPDATE faq SET question='$question', answer='$answer' WHERE id = $id";
    $conn->query($sql);
}

// Fetch all FAQs
$faqs = $conn->query("SELECT * FROM faq");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Voting India</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/1.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kMVqNz4U35RhdPjrcwq2e4+V6qEmIyyjW1EYzP7mVFiEbRQU8I8HmlTY+pMYYBEMZ8EvoIQ7Mv9lw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color:lavenderblush;
    }

    .container {
      margin: 20px;
    }

    .form-container,
    .faq-box {
      background: whitesmoke;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    .form-container h3,
    .faq-box h3 {
      margin-bottom: 15px;
      color: #333;
    }

    input,
    textarea,
    button {
      display: block;
      width: 100%;
      margin: 10px 0;
      padding: 12px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #007bff;
      color: #fff;
      border: none;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color:hsl(208, 19.40%, 24.30%);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
      padding: 14px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f8f9fa;
      color: #555;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #e9ecef;
    }

    .actions {
      display: flex;
      gap: 15px;
    }

    .actions form input {
      width: auto;
    }

    .actions a {
      color: #dc3545;
      text-decoration: none;
      font-weight: bold;
      cursor: pointer;
    }

    .actions a:hover {
      text-decoration: underline;
    }

    /* Sidebar */
    .sidebar {
      width: 300px;
      background-color: #343a40;
      color: #fff;
      height: 100vh;
      position: fixed;
      padding: 15px;
      overflow-y: auto;
    }

    .sidebar a {
      color: #adb5bd;
      text-decoration: none;
      display: block;
      padding: 10px 15px;
      border-radius: 4px;
      margin-bottom: 5px;
    }

    .sidebar a:hover {
      background-color: #495057;
      color: #fff;
    }

    .main-content {
      margin-left: 270px;
      padding: 20px;
      max-width: 100%;
    }

    /* Add some spacing and adjust layout on smaller screens */
    @media (max-width: 768px) {
      .sidebar {
        width: 250px;
      }

      .main-content {
        margin-left: 0;
      }

      .container {
        margin: 10px;
      }

      .form-container,
      .faq-box {
        padding: 15px;
      }

      button {
        padding: 12px;
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
      <h1> Manage FAQ</h1>

      <!-- Add FAQ Form -->
      <div class="form-container">
        <h3>Add New FAQ</h3>
        <form action="" method="POST">
          <input type="text" name="question" placeholder="FAQ Question" required>
          <textarea name="answer" placeholder="FAQ Answer" required></textarea>
          <button type="submit" name="add_faq">Add FAQ</button>
        </form>
      </div>

      <!-- FAQ Box (Content Box) -->
      <div class="faq-box">
        <h3>FAQ List</h3>
        <table>
          <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Actions</th>
          </tr>
          <?php while ($row = $faqs->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['question']; ?></td>
            <td><?php echo $row['answer']; ?></td>
            <td class="actions">
              <form action="" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="question" value="<?php echo $row['question']; ?>" required>
                <textarea name="answer" required><?php echo $row['answer']; ?></textarea>
                <button type="submit" name="update_faq">
                  <i class="fas fa-edit"></i> Update
                </button>
              </form>
              <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash-alt"></i> Delete
              </a>
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