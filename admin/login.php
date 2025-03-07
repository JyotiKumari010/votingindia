<?php include("connection.php");?>
<?php
  $msg = "";
?>
<?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed_password = md5($password);

        $flag = 0;

        $sql = "SELECT * FROM admin WHERE email = '$email' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $password = $row['password'];

                if($password == $hashed_password){
                    $flag = 1;
                }else{
                    $flag = 2;
                }
            }
        }

        if($flag == 1){
            $token = $id.'-'.md5(rand(1000,9999)); // Generate random value between 1000 and 9999
            // Update token in user's table
            $sql = "UPDATE admin SET token = '$token' WHERE id=$id";
            if($conn->query($sql)){}
            setcookie("token", "$token", time()+ (60*60*24*30));
            setcookie("id", "$id", time()+ (60*60*24*30));
            
            //echo "User logged in";
            $msg = '<p class="alert alert-success">User logged in</p>';

            // Redirect
            echo ' <meta http-equiv="refresh" content="0;url=index.php">';
        }else if($flag == 2){
            //echo "Incorrect password";
            $msg = '<p class="alert alert-success">Incorrect password</p>';

        }else{
            //echo "No account found";
            $msg = '<p class="alert alert-danger">No account found</p>';

        }
        
    }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>voting india</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/1.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="assets/images/logos/1.png" width="100" alt="">
                </a>
                <h4><p class="text-center">Login to voting india</p></h4>
                <?php echo $msg;?>
                <form method="POST" action="login.php">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                  </div>
                  <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="submit" value="Sign In"/>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold"></p>
                    <a class="text-primary fw-bold ms-2" href="./register.php">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>