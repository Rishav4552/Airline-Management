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
  <title>Scheduled Flight Details</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/png" href="assets/fg.png">
  <!--this for show your LOGO on tab HA AAPLA TAKU-->

  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" /> <!--FONT-->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Material Icons INCOME HE TE -->

  <!-- CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link id="pagestyle" href="../assetsp/css/my.css?v=3.1.0" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/my.css?v=3.1.0" rel="stylesheet" />
  <style>
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

</head>

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
?>

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
          <a class="nav-link text-white " href="dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="airline-management.PHP">
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
          <a class="nav-link text-white active bg-gradient-primary" href="scheduled-flight-details.php">
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
    <div class="container-fluid py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-4">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">
                  <h1>Scheduled Flight Details
                      <a href="schedule-flight.php"><button class="btn btn-warning float-end"><b> <i class="fa fa-plane" style="font-size:20px"></i> &nbsp;SCHEDULE FLIGHT</b></button></a>
                  </h1>
                </h4>
              </div>
              <div class="card-body">
                <form action="" method="GET">
                  <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                      <input type="text" name="search" class="form-control" value="<?php if(isset($_GET['search'])) ?>"
                        placeholder="you can search here">
                    </div>
                    <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
                      <button type="submit" class="btn btn-primary">Search &nbsp;<i class="fa fa-search"
                          style="font-size:15px"></i></button>
                      <small class='form-text text-muted'>(You can search flight details using flight no)</small>
                     
                      
                      <?php
                        $sql = "SELECT DAYNAME(ddt) AS DayOfWeek, COUNT(*) AS BookingCount
                                FROM ticket
                                GROUP BY DAYOFWEEK(ddt)
                                ORDER BY DAYOFWEEK(ddt)";
                        
                        $result = $conn->query($sql);

                        $labels = [];
                        $data = [];

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                $labels[] = $row["DayOfWeek"];
                                $data[] = $row["BookingCount"];
                            }
                        } else {
                            echo "0 results";
                        }


                        $sql = "SELECT CONCAT(src, ' to ', dest) AS Route, COUNT(*) AS BookingCount
                                FROM ticket
                                GROUP BY src, dest
                                ORDER BY BookingCount DESC
                                LIMIT 5";
                        // SELECT CONCAT(src, ' to ', dest) AS Route, COUNT(*) AS BookingCount
                        // FROM ticket
                        // WHERE 
                        //     MONTH(bookdatetime) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)
                        //     AND YEAR(bookdatetime) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)
                        // GROUP BY src, dest
                        // ORDER BY BookingCount DESC
                        // LIMIT 5;
                        $result = $conn->query($sql);

                        $routes = [];
                        $bookingCounts = [];

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                $routes[] = $row["Route"];
                                $bookingCounts[] = $row["BookingCount"];
                            }
                        } else {
                            echo "0 results";
                        }

                        
                      ?>
                    </div>
                  </div>

                    <?php
                    if(isset($_GET['search']))
                    {
                      ?>
                      <br>
                      <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr align="center">
                              <th>#</th>
                              <th>AIRLINE NAME</th>
                              <th>FLIGHT NO</th>
                              <th>SRC</th>
                              <th>DEST</th>
                              <th>ADT</th>
                              <th>DDT</th>
                              <th>CEC</th>
                              <th>CBC</th>
                              <th>CFC</th>
                              <th>MAKE CHANGES</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $filter=$_GET['search'];
                            $sql="SELECT * FROM flight_schedule WHERE CONCAT(fno,source,destination) LIKE '%$filter%' ORDER BY `seq_no` DESC"; 
                            $result=mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)>0)
                            {
                                foreach($result as $flight)
                                {
                                    //  echo $user['id'];
                                  ?>
                                  <tr align="center">
                                    <td>
                                      <?php echo $flight['seq_no']; ?>
                                    </td>
                                    <td>
                                    <?php 
                                          $fno=$flight['fno'];
                                          $sql = "SELECT aname FROM airline WHERE ano=(SELECT ano FROM flight WHERE fno = $fno)";
                                          $result = mysqli_query($conn, $sql);
                                          if ($result) 
                                          {
                                              if (mysqli_num_rows($result) > 0) {
                                                  // Fetch the first row
                                                  $row = mysqli_fetch_assoc($result);
                                                  if($row['aname'])
                                                    echo $row['aname'];
                                                  else
                                                    echo "Not Available";
                                                }
                                                else
                                                    echo "Not Available";
                                          }

                                          
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                        echo $fno=$flight['fno']; 
                                        $sql = "SELECT noofseats FROM class WHERE fno = '$fno' and cname='Economy Class'";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result) 
                                        {
                                            if (mysqli_num_rows($result) > 0) {
                                                // Fetch the first row
                                                $row = mysqli_fetch_assoc($result);
                                                // Check if 'noofseats' column is not null
                                                if ($row['noofseats'] != null) {
                                                    $noofseatseco = $row['noofseats'];
                                                } else {
                                                    $noofseatseco = 0; // Assuming default value is 1
                                                }
                                            } else {
                                                // Handle case when no rows are returned
                                                $noofseatseco = 0; // Default value
                                            }
                                        }

                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $flight['source'];
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $flight['destination'];
                                      ?>
                                    </td>
                                    <td>
                                    <?php 
                                        //echo $noofseatseco;

                                        $sql = "SELECT noofseats FROM class WHERE fno = '$fno' and cname='Business Class'";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result) 
                                        {
                                            if (mysqli_num_rows($result) > 0) {
                                                // Fetch the first row
                                                $row = mysqli_fetch_assoc($result);
                                                // Check if 'noofseats' column is not null
                                                if ($row['noofseats'] != null) {
                                                    $noofseatsbs = $row['noofseats'];
                                                } else {
                                                    $noofseatsbs = 0; // Assuming default value is 1
                                                }
                                            } else {
                                                // Handle case when no rows are returned
                                                $noofseatsbs = 0; // Default value
                                            }
                                        }
                                        echo $flight['adatetime'];
                                    ?>
                                    </td>
                                    <td>
                                        <?php 
                                            //echo $noofseatsbs;
                                            $sql = "SELECT noofseats FROM class WHERE fno = '$fno' and cname='First Class'";
                                            $result = mysqli_query($conn, $sql);
                                            if ($result) 
                                            {
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Fetch the first row
                                                    $row = mysqli_fetch_assoc($result);
                                                    // Check if 'noofseats' column is not null
                                                    if ($row['noofseats'] != null) {
                                                        $noofseatsfs = $row['noofseats'];
                                                    } else {
                                                        $noofseatsfs = 0; // Assuming default value is 1
                                                    }
                                                } else {
                                                    // Handle case when no rows are returned
                                                    $noofseatsfs = 0; // Default value
                                                }
                                            }
                                            echo $flight['ddatetime'];
                                        
                                        ?>


                                    </td>
                                    <?php 
                                        $fseq=$flight['seq_no'];
                                        $sql7 = "SELECT * FROM seat_cost WHERE seq_no = $fseq AND classname='Economy Class'";
                                        $result7 = mysqli_query($conn, $sql7);
                                        if ($result7) 
                                        {
                                            if (mysqli_num_rows($result7) > 0) 
                                            {
                                                $row7 = mysqli_fetch_assoc($result7);
                                                $coofeco=$row7['price'];
                                            }
                                            else
                                                $coofeco=0;
                                        }
                                    ?>
                                    <td>
                                      <?php 
                                            // $fseq=$flight['seq_no'];
                                            echo $coofeco;
                                            $sql7 = "SELECT * FROM seat_cost WHERE seq_no = $fseq AND classname='Business Class'";
                                            $result7 = mysqli_query($conn, $sql7);
                                            if ($result7) 
                                            {
                                                if (mysqli_num_rows($result7) > 0) 
                                                {
                                                    $row7 = mysqli_fetch_assoc($result7);
                                                    $coofbsn=$row7['price'];
                                                }
                                                else
                                                    $coofbsn=0;
                                            }
                                           
                                        ?>
                                    </td>
                                    <td>
                                    
                                      <?php 
                                          echo $coofbsn;
                                          // $fseq=$flight['seq_no'];
                                          $sql7 = "SELECT * FROM seat_cost WHERE seq_no = $fseq AND classname='First Class'";
                                          $result7 = mysqli_query($conn, $sql7);
                                          if ($result7) 
                                          {
                                              if (mysqli_num_rows($result7) > 0) 
                                              {
                                                  $row7 = mysqli_fetch_assoc($result7);
                                                  $cooffrt=$row7['price'];
                                              }
                                              else
                                                  $cooffrt=0;
                                          }
                                          
                                      ?>
                                    </td>
                                    <td>
                                      <?php echo $cooffrt;?>
                                    </td>
                                    <td>
                                      <?php 
                                        date_default_timezone_set('Asia/Kolkata');
                                        $current_date_time = date('Y-m-d H:i:s'); 
                                        // echo $flight['adatetime'];
                                        // echo $current_date_time;
                                        if ($flight['adatetime'] > $current_date_time)
                                        {
                                          ?>
                                          <a href="schedule-flight-update.php?seq_no_of_scheduled_flight=<?= $flight['seq_no']; ?>" class="btn btn-info btn-sm">Edit</a>
                                          <a href="delete-scheduled-flight.php?seq_no_of_scheduled_flight=<?= $flight['seq_no']; ?>" class="btn btn-danger btn-sm">Remove</a>
                                          <a href="view.php?seq_no_of_scheduled_flight=<?= $flight['seq_no']; ?>" class="btn btn-info btn-sm">View</a>
                                          <?php
                                        }
                                        else if($flight['adatetime'] < $current_date_time && $flight['ddatetime'] < $current_date_time)
                                        {
                                            // echo$flight['adatetime'];
                                            // echo$flight['ddatetime'];
                                            ?>
                                            <a class="btn btn-success btn-sm">Arrived</a>
                                            <a href="view.php?seq_no_of_scheduled_flight=<?= $flight['seq_no']; ?>" class="btn btn-info btn-sm">View</a>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <a class="btn btn-warning btn-sm">Running</a>
                                            <a href="view.php?seq_no_of_scheduled_flight=<?= $flight['seq_no']; ?>" class="btn btn-info btn-sm">View</a>
                                            <?php
                                        }
                                      ?>
                                    </td>
                                  </tr>
                                  <?php
                                }
                            }
                            else
                            {
                                echo "<div class='cont'><div class='alert alert-danger'>
                                        No such record(s) found(s)
                                      </div></div>";
                            }
                          ?>
                        </tbody>
                      </table>
                </form>
                      <?php
                    }
                    else
                    {
                      ?>   
                      <br>
                      <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr align="center">
                              <th>#</th>
                              <th>AIRLINE NAME</th>
                              <th>FLIGHT NO</th>
                              <th>SRC</th>
                              <th>DEST</th>
                              <th>ADT</th>
                              <th>DDT</th>
                              <th>CEC</th>
                              <th>CBC</th>
                              <th>CFC</th>
                              <th>MAKE CHANGES</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql="SELECT * FROM flight_schedule ORDER BY `seq_no` DESC"; 
                            $result=mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)>0)
                            {
                                foreach($result as $flight)
                                {
                                    //  echo $user['id'];
                                  ?>
                                  <tr align="center">
                                    <td>
                                        <?php echo $flight['seq_no']; ?>
                                    </td>
                                    <td>
                                      <?php 
                                          $fno=$flight['fno'];
                                          $sql = "SELECT aname FROM airline WHERE ano=(SELECT ano FROM flight WHERE fno = $fno)";
                                          $result = mysqli_query($conn, $sql);
                                          if ($result) 
                                          {
                                              if (mysqli_num_rows($result) > 0) {
                                                  // Fetch the first row
                                                  $row = mysqli_fetch_assoc($result);
                                                  if($row['aname'])
                                                    echo $row['aname'];
                                                  else
                                                    echo "Not Available";
                                                }
                                                else
                                                    echo "Not Available";
                                          }

                                          
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $fno=$flight['fno']; 
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $flight['source'];
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $flight['destination'];
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $flight['adatetime'];
                                      ?>
                                    </td>
                                    <td>
                                      <?php echo $flight['ddatetime'];?>
                                    </td>
                                    <?php 
                                        $fseq=$flight['seq_no'];
                                        $sql7 = "SELECT * FROM seat_cost WHERE seq_no = $fseq AND classname='Economy Class'";
                                        $result7 = mysqli_query($conn, $sql7);
                                        if ($result7) 
                                        {
                                            if (mysqli_num_rows($result7) > 0) 
                                            {
                                                $row7 = mysqli_fetch_assoc($result7);
                                                $coofeco=$row7['price'];
                                            }
                                            else
                                                $coofeco=0;
                                        }
                                    ?>
                                    <td>
                                      <?php echo $coofeco;?>
                                    </td>
                                    <td>
                                      <?php 
                                          // $fseq=$flight['seq_no'];
                                          $sql7 = "SELECT * FROM seat_cost WHERE seq_no = $fseq AND classname='Business Class'";
                                          $result7 = mysqli_query($conn, $sql7);
                                          if ($result7) 
                                          {
                                              if (mysqli_num_rows($result7) > 0) 
                                              {
                                                  $row7 = mysqli_fetch_assoc($result7);
                                                  $coofbsn=$row7['price'];
                                              }
                                              else
                                                  $coofbsn=0;
                                          }
                                          echo $coofbsn;
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          // $fseq=$flight['seq_no'];
                                          $sql7 = "SELECT * FROM seat_cost WHERE seq_no = $fseq AND classname='First Class'";
                                          $result7 = mysqli_query($conn, $sql7);
                                          if ($result7) 
                                          {
                                              if (mysqli_num_rows($result7) > 0) 
                                              {
                                                  $row7 = mysqli_fetch_assoc($result7);
                                                  $cooffrt=$row7['price'];
                                              }
                                              else
                                                  $cooffrt=0;
                                          }
                                          echo $cooffrt;
                                      ?>
                                    </td>
                                    <td>
                                    <?php 
                                        date_default_timezone_set('Asia/Kolkata');
                                        $current_date_time = date('Y-m-d H:i:s'); 
                                        // echo $flight['adatetime'];
                                        // echo $current_date_time;
                                        if ($flight['adatetime'] > $current_date_time)
                                        {
                                          ?>
                                          <a href="schedule-flight-update.php?seq_no_of_scheduled_flight=<?= $flight['seq_no']; ?>" class="btn btn-info btn-sm">Edit</a>
                                          <a href="delete-scheduled-flight.php?seq_no_of_scheduled_flight=<?= $flight['seq_no']; ?>" class="btn btn-danger btn-sm">Remove</a>
                                          <a href="view.php?seq_no_of_scheduled_flight=<?= $flight['seq_no']; ?>" class="btn btn-info btn-sm">View</a>
                                          <?php
                                        }
                                        else if($flight['adatetime'] < $current_date_time && $flight['ddatetime'] < $current_date_time)
                                        {
                                            // echo$flight['adatetime'];
                                            // echo$flight['ddatetime'];
                                            ?>
                                            <a class="btn btn-success btn-sm">Arrived</a>
                                            <a href="view.php?seq_no_of_scheduled_flight=<?= $flight['seq_no']; ?>" class="btn btn-info btn-sm">View</a>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <a class="btn btn-warning btn-sm">Running</a>
                                            <a href="view.php?seq_no_of_scheduled_flight=<?= $flight['seq_no']; ?>" class="btn btn-info btn-sm">View</a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                  </tr>
                                  <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }?>
                            </tbody>
                      </table>
                      <?php
                    }
                    ?>    
              </div>
              <div style="display: flex; justify-content: space-around;">
                        <div style="width: 45%;">
                            <canvas id="bookingChart"></canvas>
                        </div>
                        <div style="width: 55%;">
                            <canvas id="routeChart"></canvas>
                        </div>
                    </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid py-4">
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
      <script>
        var ctx = document.getElementById('bookingChart').getContext('2d');
        var bookingChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Booking Count',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Day of the Week'
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Booking Count'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });




        var ctx = document.getElementById('routeChart').getContext('2d');
        var routeChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($routes); ?>,
                datasets: [{
                    label: 'Booking Count',
                    data: <?php echo json_encode($bookingCounts); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
      </script>
  </main>
</body>

</html>