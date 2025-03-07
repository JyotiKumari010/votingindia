<?php
include 'connection.php';


// Data fetch karna (page-wise visits)
$sql = "SELECT page_name, SUM(visit_count) as total_visits FROM user_visits GROUP BY page_name";
$result = $conn->query($sql);

$pages = [];
$visits = [];

while ($row = $result->fetch_assoc()) {
    $pages[] = $row['page_name'];
    $visits[] = $row['total_visits'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Page Visit Graph</title>
    
</head>
<body>
    <h2>Page-wise Visit Statistics</h2>
    <canvas id="visitChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('visitChart').getContext('2d');
        var visitChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($pages); ?>, // Page names
                datasets: [{
                    label: 'Total Visits',
                    data: <?php echo json_encode($visits); ?>, // Total visits
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <body>
    <script>
    // Disable back button
    window.history.pushState(null, null, window.location.href);
    window.addEventListener('popstate', function (e) {
      window.history.pushState(null, null, window.location.href);
    });

    //Disable browser's back button by adding a dummy state to the browser's history
    window.addEventListener('load', function () {
      window.history.pushState(null, null, window.location.href);
      window.addEventListener('popstate', function (e) {
        window.history.pushState(null, null, window.location.href);
      });
    });

  </script>
</body>
</body>
</html>
