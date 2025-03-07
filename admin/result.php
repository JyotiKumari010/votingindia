
<?php
// Include database connection
include('connection.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page_name = $_POST['page_name'];
    $access_start = $_POST['access_start']; 

    if (empty($access_start)) {
        echo "<script>alert('Please select an access date and time.');</script>";
    } else {
        $insertQuery = "INSERT INTO access_control (page_name, access_start) VALUES ('$page_name', '$access_start')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>alert('Access time saved successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}


// Fetch election results from the database
$query = "SELECT party_name, total_votes FROM votes_count";
$result = mysqli_query($conn, $query);

$partyData = [];
while ($row = mysqli_fetch_assoc($result)) {
    $partyData[] = $row;
}

// Fetch total votes and constituencies
$totalVotesQuery = "SELECT SUM(total_votes) AS total_votes FROM votes_count";
$totalVotesResult = mysqli_query($conn, $totalVotesQuery);
$totalVotes = mysqli_fetch_assoc($totalVotesResult)['total_votes'];

// Fetch top candidates
$topCandidatesQuery = "SELECT  party_name, votes FROM votes_count ORDER BY votes DESC LIMIT 1";
//$topCandidatesResult = mysqli_query($conn, $topCandidatesQuery);
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

.main-content h1 {
    text-align: center;
    color: #004494;
    font-size: 48px;
    margin-top: 90px;
    margin-bottom: 70px;


}

h2 {
    text-align: center;
    margin-bottom: 30px !important;
    font-size: 24px;

}

.result-card {
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
    width: 85%;
    margin-top: 5px;
    font-size: 20px;
}

.results {
      padding: 1rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 1rem 0;
    }

    table th, table td {
      border: 1px solid #ddd;
      padding: 0.5rem;
      text-align: left;
    }

    table th {
      background-color: #0047ab;
      color: white;
    }
    table tr:nth-child(odd) {
      background-color:rgb(255, 255, 255);
    }


    table tr:nth-child(even) {
      background-color: #f4f4f4;
    }


.chart-container {
    display: flex;
    justify-content: center;
    align-items: center;
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    margin-top: 20px;
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
    <h1>Election Results</h1>

    <style>
        /* Add this CSS to your existing styles */
form {
    text-align: center; /* Center align the form content */
}

form div {
    margin-bottom: 15px; /* Add spacing between form fields */
}

form button {
    display: inline-block; /* Make the button inline-block */
    padding: 10px 20px; /* Add padding for better appearance */
    font-size: 16px; /* Adjust font size */
    background-color: #004494; /* Button background color */
    color: white; /* Button text color */
    border: none; /* Remove border */
    border-radius: 5px; /* Add rounded corners */
    cursor: pointer; /* Change cursor to pointer on hover */
    transition: background-color 0.3s ease; /* Smooth hover effect */
}

form button:hover {
    background-color: #003366; /* Darker background on hover */
}
    </style>


    <div class="result-card">
            <h2><strong>Set Access Time</strong></h2>
            <form method="POST" action="">
                <div>
                    <label for="page_name">Page Name:</label>
                    <input type="text" id="page_name" name="page_name" required>
                </div>
                <div>
                    <label for="access_start">Access Time:</label>
                    <input type="datetime-local" id="access_start" name="access_start" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Access Time</button>
            </form>
        </div>

    <!-- Result Overview -->
    <div class="result-card">
        <h2><strong>Result Overview </strong></h2>
        <p><strong>Total Votes Cast:</strong> <?php echo $totalVotes; ?></p>
        <p><strong>Winning Party:</strong> 

        <?php
        $query = "SELECT party_name, total_votes FROM votes_count ORDER BY total_votes DESC LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $top_votes = $row['total_votes'];

            $query_all = "SELECT party_name FROM votes_count WHERE total_votes = $top_votes";
            $result_all = mysqli_query($conn, $query_all);

            if ($result_all && mysqli_num_rows($result_all) > 1) {
                echo "No clear winner";
            } else {
                echo $row['party_name'];
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
    

        </p>

    </div>

    
 <div class= "result-card">
    <h2>Total Votes</h2>
    <section class="results">
    
    <table id="resultsTable">
        <thead>
            <tr>
                <th>Symbol</th>
                <th>Party</th>
                <th>Votes</th>
            </tr>
        </thead>
        <tbody id="votesTable">
        
    <?php
// Fetching total votes from votes_count and party symbol from party table
$query = "SELECT vc.party_name, p.party_symbol, vc.total_votes
          FROM votes_count AS vc
          INNER JOIN party AS p ON vc.party_name = p.party_name_english
          ORDER BY vc.total_votes DESC";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><img src='" . $row['party_symbol'] . "' alt='Symbol' width='80' height='80'></td>";
        echo "<td>" . $row['party_name'] . "</td>"; // Party Name
        echo "<td>" . $row['total_votes'] . "</td>"; // Total Votes
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No data found</td></tr>";
}

mysqli_close($conn);
?>


</tbody>
    </table>
</div>

    <!-- Election Result Chart -->
    <div class="chart-container">
        <canvas id="resultChart"></canvas>
    </div>
</div>

<script>
    // Data for Pie Chart
    const partyNames = <?php echo json_encode(array_column($partyData, 'party_name')); ?>;
    const votes = <?php echo json_encode(array_column($partyData, 'total_votes')); ?>;

    // Chart.js Implementation
    const ctx = document.getElementById('resultChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: partyNames,
            datasets: [{
                label: 'Votes',
                data: votes,
                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff']
            }]
        }
    });
</script>

 
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



