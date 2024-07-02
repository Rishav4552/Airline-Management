<?php
  session_start();
  if(!isset($_SESSION['user']))
  {
    header("Location: login.php");
  }
  $name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Dashboard</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/png" href="fg.png"> <!--this for show your LOGO on tab HA AAPLA TAKU-->

  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" /> <!--FONT-->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Material Icons INCOME HE TE -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- CSS Files -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link id="pagestyle" href="../assetsp/css/my.css?v=3.1.0" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/my.css?v=3.1.0" rel="stylesheet" />
  <style>
    .disl
    {
      display:flex;
    }
    .aaa {
      height: 50px;
      width: 165px;
      margin-right: 10px;
    }

    .container2 {
      display: flex;
      justify-content: space-between;
    }

    .nav-links {
      flex: 1;
      text-align: left;
      max-height: 20px;
    }

    .nav-links ul li {
      list-style: none;
      display: inline-block;
      padding: 8px 12px;
      position: relative;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .nav-links ul li a {
      color: black;
      text-decoration: none;
      font-size: 15px;

    }

    .nav-links ul li::after {
      content: "";
      width: 0%;
      height: 3px;
      background: #8E2157;
      display: block;
      margin: auto;
      transition: 1s;
    }

    .nav-links ul li:hover::after {
      width: 100%;
    }
  </style>

  <?php
      $hostName ="localhost";
      $dbusers ="root";
      $dbPassword ="";
      $dbName ="jetsetfly";
      $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
      if (!$conn)
      {
          die("Something went Wrong");
      }
      

      $sql="SELECT count(*) FROM flight_schedule WHERE adatetime > NOW()";
      $result=mysqli_query($conn,$sql);
      if ($result) 
      {
          $row = mysqli_fetch_row($result);// Fetch the row from the result set
          $count1 = $row[0]; // Access the count value using the alias
      } 
      else 
      {
          $count1 = 0; // Default count value if query fails
      }
      // echo $count;

      $sql="SELECT count(*) FROM flight_schedule WHERE adatetime < NOW() AND ddatetime > NOW()";
      $result=mysqli_query($conn,$sql);
      if ($result) 
      {
          $row = mysqli_fetch_row($result);// Fetch the row from the result set
          $count2 = $row[0]; // Access the count value using the alias
      } 
      else 
      {
          $count2 = 0; // Default count value if query fails
      }

      $sql="SELECT count(*) FROM flight_schedule WHERE ddatetime < NOW()";
      $result=mysqli_query($conn,$sql);
      if ($result) 
      {
          $row = mysqli_fetch_row($result);// Fetch the row from the result set
          $count3 = $row[0]; // Access the count value using the alias
      } 
      else 
      {
          $count3 = 0; // Default count value if query fails
      }
      $dataPoints = array( 
        array("y" => $count1, "label" => "Not Departed" ),
        array("y" => $count2, "label" => "In Flight" ),
        array("y" => $count3, "label" => "Arrived" )
    );


    
      
    $sql = "SELECT airline.ano, airline.aname, COUNT(flight.ano) AS flight_count
            FROM airline
            LEFT JOIN flight ON airline.ano = flight.ano
            GROUP BY airline.ano";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dataPoints1[] = array(
                'label' => $row['aname'],
                'y' => $row['flight_count']
            );
        }
      }
  ?>
  <script>
      window.onload = function() {
      
          var chart = new CanvasJS.Chart("chartContainer", {
              animationEnabled: true,
              theme: "light2",
              title:{
                  text: "Flights Status"
              },
              axisY: {
                  title: "No of Flights"
              },
              data: [{
                  type: "column",
                  yValueFormatString: "#,##",
                  dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
              }]
          });
          chart.render();
          
          var chart = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            title: {
              text: "Number of Flights per Airline"
            },
            subtitles: [{
              text: "Airline"
            }],
            data: [{
              type: "pie",
              yValueFormatString: "#",
              indexLabel: "{label} ({y})",
              dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }]
          });
          chart.render();
      }

  </script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="">
        <img src="../assetsp/img/PH.jpg" class="navbar-brand-img h-100 border-radius-lg" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"><?php echo $name;?></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="airline-management.PHP">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Airline Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="flights-available.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Flights Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="scheduled-flight-details.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Schedule Flight</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="passenger-lists.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Passenger Lists</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="feedback.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Feedback</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="logout.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="addNewM.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Add New Member</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <img class="aaa" src="assets/GG-removebg-preview.png">
        <div class="container2">
          <div class="nav-links">
            <ul>
              <li><a href="add-flight.php"> <i class="fa fa-space-shuttle" style="font-size:20px;"></i></i> ADD NEW FLIGHT
                </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
          </div>
          <div class="nav-links">
            <ul>
              <li><a href="add-airline.php"><i class="fa fa-plane" style="font-size:20px"></i> ADD NEW AIRLINE </a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
          </div>
          <div class="nav-links">
            <ul>
              <li><a href="logout.php" style="color:chocolate;"><?php echo $name;?> <i class="fa fa-sign-out"
                    style="font-size:18px"></i></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
          </div>
        </div>
      </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <br>

    <div class="container-fluid py-4">
      <div class="row">

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="airline-management.PHP">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div
                  class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">airplanemode_active</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Available Airlines</p>
                  <?php
                        $sql="SELECT count(*) FROM airline";
                        $result=mysqli_query($conn,$sql);
                        if ($result) 
                        {
                            $row = mysqli_fetch_row($result);// Fetch the row from the result set
                            $count = $row[0]; // Access the count value using the alias
                        } 
                        else 
                        {
                            $count = 0; // Default count value if query fails
                        }
                  ?>
                  <h4 class="mb-0"><?php echo $count;?></h4>
                </div>
                <?php
                    $sql = "SELECT aname FROM airline ORDER BY ano DESC LIMIT 1"; // Select the name of the airline with the highest ID
                    $result = mysqli_query($conn, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result); // Fetch the row from the result set
                        $latestAirlineName = $row['aname']; // Access the airline name
                    } else {
                        $latestAirlineName = "No airlines found"; // Default value if no airlines found
                    }
                ?>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php echo $latestAirlineName;?> </span>lastly added</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="flights-available.php">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div
                  class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">flight_takeoff</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Available Flights</p>
                  <?php
                    $sql="SELECT count(*) FROM flight";
                    $result=mysqli_query($conn,$sql);
                    if ($result) 
                    {
                        $row = mysqli_fetch_row($result);// Fetch the row from the result set
                        $count = $row[0]; // Access the count value using the alias
                    } 
                    else 
                    {
                        $count = 0; // Default count value if query fails
                    }
                  ?>
                  <h4 class="mb-0"><?php echo $count;?></h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
              <?php
                    $sql = "SELECT fno FROM flight ORDER BY seq_no DESC LIMIT 1"; // Select the name of the airline with the highest ID
                    $result = mysqli_query($conn, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result); // Fetch the row from the result set
                        $latestfName = $row['fno']; // Access the airline name
                    } else {
                        $latestfName = "No flights found"; // Default value if no airlines found
                    }
                ?>
                <p class="mb-0">Flight No :<span class="text-success text-sm font-weight-bolder"> <?php echo $latestfName; ?></span> lastly added</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="passenger-lists.php">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div
                  class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">group_add</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Total Bookings</p>
                  <?php
                    $sql="SELECT count(*) FROM ticket";
                    $result=mysqli_query($conn,$sql);
                    if ($result) 
                    {
                        $row = mysqli_fetch_row($result);// Fetch the row from the result set
                        $count = $row[0]; // Access the count value using the alias
                    } 
                    else 
                    {
                        $count = 0; // Default count value if query fails
                    }
                  ?>
                  <h4 class="mb-0"><?php echo $count;?></h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
              <?php
                  $sql="SELECT count(*) FROM booking";
                  $result=mysqli_query($conn,$sql);
                  if ($result) 
                  {
                      $row = mysqli_fetch_row($result);// Fetch the row from the result set
                      $count = $row[0]; // Access the count value using the alias
                  } 
                  else 
                  {
                      $count = 0; // Default count value if query fails
                  }
                ?>
                <p class="mb-0">From<span class="text-success text-sm font-weight-bolder"> <?php echo $count;?></span> Registrations </p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6">
          <a href="#">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div
                  class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">data_usage</i>
                </div>
                <div class="text-end pt-1">
                  <?php
                    $sql="SELECT * FROM payment";
                    $result=mysqli_query($conn,$sql);
                    if ($result) 
                    {
                        $total=0;
                        foreach($result as $book)
                        {
                            $nop=$book['nop'];
                            $cop=$book['cop'];
                            $mul=$nop*$cop;
                            $total=$total+$mul;
                        }
                    }

                    $sql = "SELECT * 
                    FROM payment 
                    WHERE booking_id IN (
                        SELECT booking_id 
                        FROM ticket 
                        WHERE DATE(bookdatetime) = CURDATE()
                    )";

  $result = mysqli_query($conn, $sql);

  if ($result) {
      $total1 = 0;

      while ($book = mysqli_fetch_assoc($result)) {
          $nop1 = $book['nop'];
          $cop1 = $book['cop'];
          $mul1 = $nop1 * $cop1;
          $total1 += $mul1;
      }

      // echo "Total earnings for today: " . $total1;
  } else {
      echo "Query fail";
    }
                  ?>
                  <p class="text-sm mb-0 text-capitalize">Total Earnings</p>
                  <h4 class="mb-0">INR <?php echo $total; ?></h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0">Today's Earnings<span class="text-success text-sm font-weight-bolder"> INR <?php echo $total1; ?></span></p>
              </div>
            </div>
          </a>
        </div>
      </div>
      <br>
      <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Charts</h3>
            <br>
            <div class="disl"> 
              <div id="chartContainer" style="height: 370px; width: 50%;"></div>
              <div id="chartContainer1" style="height: 370px; width: 50%;"></div>
              <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
            </div>
        </div>
      </div>
      <canvas id="statistics-chart" width="20" height="10"></canvas>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,
                Copyright All rights reserved. Team :
                <a href="" class="font-weight-bold" target="_blank">GMADS <i class="fa fa-heart"></i></a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="" class="nav-link text-muted" target="_blank"><i class="fa fa-facebook-f"></i></a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link text-muted" target="_blank"><i class="fa fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link text-muted" target="_blank"><i class="fa fa-instagram"></i></a>
                </li>
                <li class="nav-item">
                  <a href="https://www.youtube.com/channel/UCNCWGkiAKDhwgCuGT02aXCg" class="nav-link text-muted"
                    target="_blank"><i class="fa fa-youtube-play"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
</body>

</html>