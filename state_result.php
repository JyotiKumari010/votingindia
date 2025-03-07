<?php include 'visit.php'; ?>
<?php include 'restrict.php'; ?>
<?php include 'nav.php';?>
<?php include 'state_count.php';?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VOTING INDIA</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/1.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      line-height: 1.6;
    }

    

    .container {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            width: 100vw; /*make the container span the full width of the viewport*/
            height: 250px; /*box height*/
            padding: 0 0%;
        }
        .part {
            flex: 1;
            margin: 0 5px;
            overflow: hidden; /* Hide overflow for zoom effect */
            position: relative;
        }
        .part img {
            width: 100%;
            height: 250px; /* Update height */
            border-radius: 0px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .part img:hover {
            transform: scale(1.2); /* Zoom the image */
        }
        h1 {
            font-size: 40px;
            text-align: center;
            color: #333;
        }
        p{
            text-align: center;  
        }



    h3 {
      margin-top: 20px;
      background-color:rgb(97, 85, 120);
      color: white;
      text-align: center;
      padding: 1rem 0;
      width: 70%;
      position: center;
      margin-left: 170px;
      font-size: 32px;
    }

    h2{
      margin-top: 20px;
      background-color: #0047ab;
      color: white;
      text-align: center;
      padding: 1rem 0;
      
    }

    .symbol{
      text-align: center;
      font-size: 170%;
      color: rgb(164, 8, 96);
    }
    
    .cardd{
        width: 20%; 
        position: center;
        margin-left: 50px;
    }
    
    .state-chart-container {
    display: flex;
    flex-wrap: wrap; /* Allow wrapping to prevent collision */
    gap: 20px; /* Add space between elements */
    color: rgb(164, 8, 96);
}

.card{
  background-color: lightblue !important;
}



.state-overview {
    flex: 1;
    min-width: 300px; /* Ensure it doesn’t shrink too much */
    
}

.pie-chart-container {
    flex: 1;
    min-width: 300px;
    width: 90%; /* Adjust the width */
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
}


.carrd {
    background-color: lavender !important;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.34);
    width: 40%; /* Adjust width as needed */
    margin: 20px;
    margin-left: 20px;
    position: center !important;
}

    .search-bar {
      top-margin: 60px;
      text-align: center;
      margin: 1rem 0;
    }

    
    #searchInput:focus {
    outline: none;
    border-color: #007BFF;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

    button:hover {
    background-color: #0056b3;
}



    .results {
        margin-top: 50px;
      padding: 1rem;
    }

    table {
    margin-left: 30px;
    margin-right: 30px;
    margin-bottom: 30px;

      width: 95%;
      border-collapse: collapse;
    }

    table th, table td {
      border: 1px solid #ddd;
      padding: 0.5rem;
      text-align: center;
    }

    table th {
      background-color: #0047ab;
      color: white;
    }

    table tr:nth-child(even) {
      background-color: #f4f4f4;
    }
    table tr:nth-child(odd) {
      background-color:rgba(244, 244, 244, 0.72);
    }

    .chart-container {
      width: 80%;
      margin: 2rem auto;
    }

     /* Footer */
     .footer {
      background-color: #0056b3;
      color: white;
      text-align: center;
      padding: 20px 0;
      width: 100%;
      bottom: 0;
    }

    /* footer */
    .credit {
      font-size: 14px;
      text-align: center;
      color: white;
      padding-top: 20px;
      border-top: 1px solid #fff;
      margin-top: 20px;
    }
    .footer h1{
        color: #fff;
        text-align: left;
    }

    /* Additional Styles for Hover Zoom Effect */
    .box a {
        transition: transform 0.3s ease-in-out, color 0.3s ease;
    }

    .box a:hover {
        transform: scale(1.1);
        color:rgb(212, 183, 16) !important;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .box-container {
            flex-direction: column;
            gap: 20px;
        }
    }
    @media (max-width: 768px) {
    .state-chart-container {
        flex-direction: column;
        gap: 10px; /* Reduce gap */
    }
}

    /* Footer Styling */
    .credit {
        font-size: 14px;
        text-align: center;
        color: white;
        padding-top: 20px;
        border-top: 1px solid #fff;
        margin-top: 20px;
    }

  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>


<body>
<div class="container">
        <div class="part">
            <img src="images/37.avif" alt="Image 1" loading="lazy">
        </div>
        <div class="part">
            <img src="images/38.webp" alt="Image 2">
        </div>
        <div class="part">
            <img src="images/40.webp" alt="Image 3">
        </div>
        <div class="part">
            <img src="images/38.webp" alt="Image 2">
        </div>
        <div class="part">
            <img src="images/39.jpg" alt="Image 3">
        </div>
    </div>



    <header>
    <h3>State Legislative Assemblies Result</h3>
    <p>Overview of election results across states</p>
    <p class="symbol"> ** </p>
    <hr> <!-- Horizontal line added here -->
</header>

<style>
    hr {
        border: 0; /* Remove default border */
        height: 2.5px; /* Set line thickness */
        background-color: blue; /* Line color */
        margin: 0px 50px; /* Add some margin above and below the line */
    }
</style>

  <!--NEW-->
  <div class="container new-container">  
  <div class="card">
    <div class="card-body">
      <div class="state-overview" style="text-align: left; padding-right: 15px;">
        <h4>State Overview</h4>
        <table>
          <tr>
            <td>Total Votes Cast:</td>
            <td>
              <?php
              $query = "SELECT COUNT(*) FROM state_votes";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($result);
              echo $row['COUNT(*)'];
              ?>
            </td>
          </tr>
          <tr>
    <td>Top Candidate:</td>
    <td>
        <?php
        $query = "SELECT party_name, total_votes FROM state_votes_count ORDER BY total_votes DESC LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $top_votes = $row['total_votes'];

            $query_all = "SELECT party_name FROM state_votes_count WHERE total_votes = $top_votes";
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
    </td>
</tr>


          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="cardd">
    <div class="pie-chart-container">
      <canvas id="voteChart"></canvas>
    </div>
  </div>
</div>
<script>
                        const ctx = document.getElementById('voteChart').getContext('2d');
                        <?php
                        $partyQuery = "SELECT party_name, total_votes FROM state_votes_count";
                        $result = mysqli_query($conn, $partyQuery);
                        $labels = array();
                        $data = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            array_push($labels, $row['party_name']);
                            array_push($data, $row['total_votes']);
                        }
                        ?>
                        const chart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: <?php echo json_encode($labels); ?>,
                                datasets: [{
                                    data: <?php echo json_encode($data); ?>,
                                    backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#FFA07A', '#FF69B4', '#8FBC8F', '#CD5C5C', '#DC143C'], // Colors for the pie chart
                                }]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!--END-->

<style>
  .new-container {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    gap: 20px; /* Space between the cards */
    margin: 20px;
    margin-top: 50px;
  }

  .card, .cardd {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    width: 45%; /* Adjust width as needed */
  }

  @media (max-width: 768px) {
    .new-container {
      flex-direction: column; /* Stack vertically on small screens */
      align-items: center;
    }
    .card, .cardd {
      width: 90%; /* Full width on mobile */
    }
  }
</style>

                   


    

    
    <div class="carrd"> 
           <section class="search-bar">
    <div style="display: flex; align-items: center; gap: 5px; margin-bottom: 10px;">
    <input type="text" id="searchInput" placeholder="Search Party..." style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; flex: 1;">
    <button onclick="filterTable()" style="padding: 8px 12px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">
        🔍
    </button>
</div>
</div>
    </section>
    <script>
        function filterTable() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const table = document.getElementById("resultsTable");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        const partyCell = rows[i].getElementsByTagName("td")[1];
        if (partyCell) {
            const partyName = partyCell.textContent.toLowerCase();
            rows[i].style.display = partyName.includes(input) ? "" : "none";
        }
    }
}

</script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function fetchVotes() {
        $.ajax({
            url: "fetch_votes.php", // PHP file to fetch updated vote counts
            method: "GET",
            success: function (data) {
                $("#votesTable").html(data); // Update table with new data
            }
        });
    }

    // Automatically refresh every 5 seconds
    setInterval(fetchVotes, 5000);

    // Fetch votes when the page loads
    $(document).ready(function () {
        fetchVotes();
    });
</script>


  
    <section class="results">
    <h2>Total Votes</h2>
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
          FROM state_votes_count AS vc
          INNER JOIN state_party AS p ON vc.party_name = p.party_name_english
          ORDER BY vc.total_votes DESC";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><img src='admin/" . $row['party_symbol'] . "' alt='Symbol' width='80' height='80'></td>"; // Party Symbol
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
</section>

  </section>

  


  

                  <!---footer--->


  <section class="footer" style="background-color: #002855; color: white; padding: 50px 20px; font-family: Arial, sans-serif;">

<div class="box-container" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">

    <!-- Quick Links Section -->
    <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
        <h1 style="font-size: 20px; margin-bottom: 15px;">Quick Links</h1>
        <ul style="list-style-type: none; padding: 0;">
            <li><a href="home.html" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-house" style="margin-right: 8px;"></i> Home
            </a></li>
            <li><a href="about.html" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> About
            </a></li>
            <li><a href="package.html" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-person" style="margin-right: 8px;"></i> Dashboard
            </a></li>
            <li><a href="book.html" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Election
            </a></li>
            <li><a href="book.html" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Voting
            </a></li>
            <li><a href="book.html" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Result
            </a></li>
        </ul>
    </div>

    <!-- Extra Links Section -->
    <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
        <h1 style="font-size: 20px; margin-bottom: 15px;">Extra Links</h1>
        <ul style="list-style-type: none; padding: 0;">
            <li><a href="#" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Ask Questions
            </a></li>
            <li><a href="#" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> About Us
            </a></li>
            <li><a href="review.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Feedback
            </a></li>
            <li><a href="#" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Privacy Policy
            </a></li>
            <li><a href="#" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-caret-right" style="margin-right: 8px;"></i> Terms of Use
            </a></li>
        </ul>
    </div>

    <!-- Contact Info Section -->
    <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
        <h1 style="font-size: 20px; margin-bottom: 15px;">Contact Info</h1>
        <ul style="list-style-type: none; padding: 0;">
            <li><a href="help.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-telephone" style="margin-right: 8px;"></i> +91 1234567890
            </a></li>
            <li><a href="help.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-telephone" style="margin-right: 8px;"></i> +91 1234567890
            </a></li>
            <li><a href="help.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-envelope" style="margin-right: 8px;"></i> votingindia@gmail.com
            </a></li>
            <li><a href="help.php" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                <i class="bi bi-geo-alt" style="margin-right: 8px;"></i> Bihar, India - 800012
            </a></li>
        </ul>
    </div>

    <!-- Follow Us Section -->
    <div class="box" style="flex: 1; min-width: 220px; padding: 20px;">
            <h1 style="font-size: 20px; margin-bottom: 15px;">Follow Us</h1>
            <ul style="list-style-type: none; padding: 0;">
                <li><a href="https://www.facebook.com/yourpage" target="_blank" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                    <i class="bi bi-facebook" style="margin-right: 8px;"></i> Facebook
                </a></li>
                <li><a href="https://twitter.com/yourprofile" target="_blank" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                    <i class="bi bi-twitter-x" style="margin-right: 8px;"></i> Twitter
                </a></li>
                <li><a href="https://www.instagram.com/yourprofile" target="_blank" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                    <i class="bi bi-instagram" style="margin-right: 8px;"></i> Instagram
                </a></li>
                <li><a href="https://www.youtube.com/in/yourprofile" target="_blank" style="display: flex; align-items: center; color: white; text-decoration: none; font-size: 16px; margin-bottom: 8px; transition: transform 0.3s ease, color 0.3s ease;">
                    <i class="bi bi-youtube" style="margin-right: 8px;"></i> Youtube
                </a></li>
            </ul>
        </div>

    </div>

    <div class="credit" style="text-align: center; margin-top: 40px; font-size: 14px; padding-top: 20px; border-top: 1px solid #fff;">
       <span> Voting India</span> | @All rights reserved 2025
    </div>
</section>


  <script>


function toggleMenu() {
    const navMenu = document.getElementById('navMenu');
    navMenu.classList.toggle('active');
  }

  
   
    // Bar Graph using Chart.js
    const ctx = document.getElementById('resultsBarGraph').getContext('2d');
    const resultsBarGraph = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Constituency 1', 'Constituency 2', 'Constituency 3'], // Constituencies
        datasets: [{
          label: 'Votes',
          data: [50000, 70000, 60000], // Votes for each constituency
          backgroundColor: ['#0047ab', '#0073e6', '#3399ff'], // Bar colors
          borderColor: ['#003580', '#005bb5', '#1a75cc'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>