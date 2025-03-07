<?php
include('connection.php');

date_default_timezone_set('Asia/Kolkata'); // Set timezone

$pageName = basename($_SERVER['PHP_SELF']);
//echo "Page Name: " . $pageName; // Debugging: check the page name

$accessQuery = "SELECT access_start FROM access_control WHERE page_name = '$pageName'";
$accessResult = mysqli_query($conn, $accessQuery);

if (!$accessResult) {
    echo "Error executing query: " . mysqli_error($conn); // Debugging: error if the query fails
    exit();
}

if ($accessResult && mysqli_num_rows($accessResult) > 0) {
    $accessData = mysqli_fetch_assoc($accessResult);
    $currentTime = date('Y-m-d H:i:s');
    $accessStart = $accessData['access_start'];

    if ($currentTime < $accessStart) {
        echo "<!DOCTYPE html>
              <html lang='en'>
              <head>
                  <meta charset='UTF-8'>
                  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                  <title>VOTING INDIA</title>
                  <link rel='shortcut icon' type='image/png' href='assets/images/logos/1.png' /> <!-- Corrected quotes -->
              </head>
              <body>
                  <div class='access-message'>
                      <h2>Result will be published on:</h2>
                      <p class='access-time'>" . date('d M Y, h:i A', strtotime($accessStart)) . "</p>
                      <div id='countdown'></div>
                  </div>";

        // Pass the access start time and current time to JavaScript
        echo "<script>
                const accessStartTime = new Date('" . $accessStart . "').getTime();
                const serverTime = new Date('" . $currentTime . "').getTime();
              </script>";

        echo "<style>
                body { display: flex; justify-content: center; align-items: center; height: 100vh; background-color: lightblue; margin: 0; }
                .access-message { text-align: center; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.46); }
                h2 { color: #0047ab; font-size: 28px; margin-bottom: 10px; }
                .access-time { font-size: 24px; color: #333; margin-bottom: 15px; }
                #countdown { font-size: 22px; color: #e74c3c; font-weight: bold; }
              </style>
              </body>
              </html>";

        exit();
    }
} else {
    echo "<!DOCTYPE html>
          <html lang='en'>
          <head>
              <meta charset='UTF-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1.0'>
              <title>VOTING INDIA</title>
              <link rel='shortcut icon' type='image/png' href='assets/images/logos/1.png' /> <!-- Corrected quotes -->
          </head>
          <body>
              <div class='access-message'>
                  <h2>Wait till the voting ends!</h2>
              </div>";

    echo "<style>
            body { display: flex; justify-content: center; align-items: center; height: 100vh; background-color: lightblue; margin: 0; }
            .access-message { text-align: center; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.41); }
            h2 { color: #0047ab; font-size: 28px; margin-bottom: 10px; }
          </style>
          </body>
          </html>";

    exit();
}
?>