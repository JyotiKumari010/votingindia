<?php include("connection.php");
 include("auth.php");



 $sql = "SELECT DISTINCT visit_date FROM user_visits ORDER BY visit_date DESC";
$result = $conn->query($sql);

// डेट्स को एक ऐरे में स्टोर करें
$dates = [];
while ($row = $result->fetch_assoc()) {
    $dates[] = $row['visit_date'];
}



 // SQL Query to fetch visit data from user_visits table
$query = "SELECT page_name, SUM(visit_count) AS visit_count 
FROM user_visits 
GROUP BY page_name 
ORDER BY visit_count DESC";

// Execute the query
$result = mysqli_query($conn, $query);

// Arrays to store page names and counts
$page_names = [];
$visit_counts = [];

if ($result) {
while ($row = mysqli_fetch_assoc($result)) {
$page_names[] = $row['page_name'];  // Store page name
$visit_counts[] = $row['visit_count'];  // Store visit count
}
} else {
echo "Error: " . mysqli_error($conn);
}
?>





<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Voting India</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/1.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>

 <style>
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

.row{
  position: abstract;
  margin-left: 10px;
}
.card overflow-hidden{
  position: relative;
  margin-right: 10px;

}

 </style>

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <div class="sidebar">
        <?php include("sidebar.php"); ?>
    </div>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="contact.php">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
             
            <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle nav-icon-hover" href="#" id="drop2" role="button"
       data-bs-toggle="dropdown" aria-expanded="false">
        <img src="assets/images/profile/user-2.jpg" alt="" width="35" height="35" class="rounded-circle">
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="drop2">
        <li><a class="dropdown-item" href="./profile.php"><i class="ti ti-user fs-6"></i> My Profile</a></li>
        <li><a class="dropdown-item" href="./account.php"><i class="ti ti-mail fs-6"></i> My Account</a></li>
        <li><a class="dropdown-item" href="./tasks.php"><i class="ti ti-list-check fs-6"></i> My Task</a></li>
        <li><a class="dropdown-item btn btn-outline-primary mx-3 mt-2" href="./logout.php">Logout</a></li>
    </ul>


            </ul>
          </div>
          <script>document.addEventListener("DOMContentLoaded", function () {
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
    var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl);
    });
});
</script>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
  <!-- Row 1 -->
  <div class="row">
    <div class="col-lg-8 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body">
          <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
            <div class="mb-3 mb-sm-0">
              <h5 class="card-title fw-semibold"><strong>Engagement Insight</strong></h5>
            </div>
            <div>
                <select class="form-select">
                <?php foreach ($dates as $date) { ?>
               <option value="<?= $date; ?>"><?= date("d F Y", strtotime($date)); ?></option>
                <?php } ?>
                </select>
            </div>
            </div>
          <div id="votingChart"></div> <!-- Update chart to show voting trends -->
        </div>
        <script>
                    // pass the data in PHP 
                    var pageNames = <?php echo json_encode($page_names); ?>;
                    var visitCounts = <?php echo json_encode($visit_counts); ?>;

                    // set data for ApexCharts 
                    var options = {
                        chart: {
                            type: 'bar',
                            height: 500,  // Shortened chart height
                            toolbar: { show: false }  // Remove toolbar
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '45%', // Adjust width for compact view
                            }
                             },
                        series: [{
                            name: 'Visits',
                            data: visitCounts
                        }],
                        xaxis: {
                            categories: pageNames, // Page names instead of dates
                            labels: {
                                rotate: -45 // Rotate labels to make them fit better
                            }
                        },
                        dataLabels: {
                            enabled: false, // Hide data labels
                        },
                        grid: {
                            show: true,  // Show grid lines for clarity
                        }
                    };

                    // ग्राफ को रेंडर करें
                    var chart = new ApexCharts(document.querySelector("#votingChart"), options);
                    chart.render();
                    


                </script>

      </div>
    </div>


    <div class="col-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <!-- Yearly Breakup -->
          <div class="card overflow-hidden">
            <div class="card-body p-4">
              <h5 class="card-title mb-9 fw-semibold">Yearly Voter Turnout</h5>
              <div class="row align-items-center">
                <div class="col-8">
                  <h4 class="fw-semibold mb-3">72%</h4> <!-- Replace with actual voter turnout data -->
                  <div class="d-flex align-items-center mb-3">
                    <span
                      class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                      <i class="ti ti-arrow-up-left text-success"></i>
                    </span>
                    <p class="text-dark me-1 fs-3 mb-0">+5% from last election</p>
                    <p class="fs-3 mb-0">last year</p>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-center">
                    <div id="breakup"></div> <!-- Show voter data by region -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <!-- Recent Voting Trends -->
          <div class="card">
            <div class="card-body">
              <div class="row align-items-start">
                <div class="col-8">
                  <h5 class="card-title mb-9 fw-semibold">Monthly Voter Engagement</h5>
                  <h4 class="fw-semibold mb-3">6,820 Votes</h4>
                  <div class="d-flex align-items-center pb-1">
                    <span
                      class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                      <i class="ti ti-arrow-down-right text-danger"></i>
                    </span>
                    <p class="text-dark me-1 fs-3 mb-0">+9% from last election</p>
                    <p class="fs-3 mb-0">last month</p>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div
                      class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                      <i class="ti ti-vote fs-6"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="earning"></div> <!-- Display voting statistics -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Voting Timeline -->
  <div class="row">
    <div class="col-lg-4 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <div class="mb-4">
            <h5 class="card-title fw-semibold">Recent Voting Activities</h5>
          </div>
          <ul class="timeline-widget mb-0 position-relative mb-n5">
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1">Voting registration in UP: 385,000 votes</div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">Election Results in Bihar <a href="javascript:void(0)" class="text-primary d-block fw-normal">#BI-3467</a></div>
            </li>
            <!-- Add more timeline items -->
          </ul>
        </div>
      </div>
    </div>

    <!-- Voting Stats Table -->
    <div class="col-lg-8 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Recent Voting Trends</h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Id</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Region</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Voter Turnout</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Votes Cast</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Candidates</h6>
                  </th>
                </tr>
                
              </thead>
              <tbody>
              
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">1</h6></td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Uttar Pradesh</h6>
                    <span class="fw-normal">Highest voter turnout in 2024</span>                          
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">85%</p>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">24.5M Votes</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">15 Candidates</h6>
                  </td>
                </tr> 
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">2</h6></td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Delhi</h6>
                    <span class="fw-normal">2025 election</span>                          
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">78%</p>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">65,658 Votes</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">49 Candidates</h6>
                  </td>
                </tr> 
                <!-- Add more voting stats rows -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Footer (if necessary) -->
  <?php include("footer.php"); ?>
</div>
</div>
</div>
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/sidebarmenu.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="assets/libs/simplebar/dist/simplebar.js"></script>
<script src="assets/js/dashboard.js"></script>
</body>

</html>




















