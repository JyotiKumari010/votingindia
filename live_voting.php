<?php include 'connection.php';

// Fetch total votes per party
$vote_results = $conn->query("SELECT party_name_english, votes_count FROM party ORDER BY votes_count DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Voting Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .results-container {
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="results-container">
        <h2>Live Voting Results</h2>
        <table>
            <tr>
                <th>Party Name</th>
                <th>Votes</th>
            </tr>
            <?php while ($result = $vote_results->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $result['party_name_english']; ?></td>
                <td><?php echo $result['votes_count']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>