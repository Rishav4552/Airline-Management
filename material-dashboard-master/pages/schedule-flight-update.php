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
  <title>SCHEDULE A FLIGHT</title>
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
    .con2 {
      margin-top: -25px;
      /* Adjust margin top to accommodate navbar height */
      padding: 20px;
      box-sizing: border-box;
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

    select {
      height: 30px;
    }

    .contain1 {
      display: flex;
      /* align-items: center; */
      align-items: center;
      /* flex-direction: row; */
      /* align-content: space-around; */
      justify-content: space-around;
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
  if (isset($_POST['submit'])) 
  {
    $seq_no=$_POST['seq_no'];
    $sql = "SELECT * FROM flight_schedule WHERE seq_no=$seq_no";
    $result = mysqli_query($conn, $sql);
    if ($result) 
    {
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            $fno=$row['fno'];
        }
    }
    // echo $fno;
    $sql = "SELECT * FROM flight WHERE fno = $fno";
    $result = mysqli_query($conn, $sql);
    if ($result) 
    {
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            $ano=$row['ano'];
        }
    }

    

    // $fno = $_POST['fno'];
    // $ano = $_POST['aname'];
    $source = $_POST['source'];
    $destination = $_POST['dest'];
    $adatetime = $_POST['adatetime'];
    $ddatetime = $_POST['ddatetime'];
    if (isset($_POST['coe']))
          $coe=$_POST['coe'];
    else
          $coe=0;
    if (isset($_POST['cof']))
          $cof=$_POST['cof'];
    else
          $cof=0;
    if (isset($_POST['cob']))
        $cob=$_POST['cob'];
    else
        $cob=0;

    $adatetimeFormatted = date('Y-m-d H:i:s', strtotime($adatetime));
    $ddatetimeFormatted = date('Y-m-d H:i:s', strtotime($ddatetime));
    $sql = "SELECT * FROM flight_schedule WHERE fno='$fno'";
    $result = mysqli_query($conn, $sql);
    $status=False;
    if ($status===false)
    {
        // If no rows are fetched, insert the new flight schedule
        $query = "UPDATE flight_schedule SET source='$source', destination='$destination', adatetime='$adatetime', ddatetime='$ddatetime', fno=$fno WHERE seq_no=$seq_no";
        $run = mysqli_query($conn, $query);
        if ($run) 
            echo "<script>alert('Updated From : $source To : $destination');</script>";
        if ($coe>0)
        {

            $sql="SELECT * FROM class WHERE fno='$fno' AND cname='Economy Class'";
            $result=mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $class_id = $row['class_id'];
             
            if ($row['noofseats']>0)
                $noofseatsofeco=$row['noofseats'];
            else
            {
                $noofseatsofeco=0;
            }
            $sql1="SELECT seq_no FROM flight_schedule WHERE fno='$fno' AND adatetime='$adatetimeFormatted' AND ddatetime='$ddatetimeFormatted'";
            $result1=mysqli_query($conn,$sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $seq_id = $row1['seq_no'];

            $query = "UPDATE seat_cost SET price = $coe, date = NOW(), class_id = $class_id WHERE seq_no = $seq_no AND classname = 'Economy Class'";
            $run = mysqli_query($conn, $query);
            if ($run) 
                echo "<script>alert('Seat cost updated for seq_no: $seq_no');</script>";
        }
        else
        {
            $noofseatsofeco=0;
        }
        if ($cof>0)
        {
            $sql="SELECT * FROM class WHERE fno='$fno' AND cname='First Class'";
            $result=mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $class_id = $row['class_id'];
            
            if ($row['noofseats']>0)
            {
                $noofseatsoffir=$row['noofseats'];
            }
            else
            {
                $noofseatsoffir=0;
            }

            $sql1="SELECT seq_no FROM flight_schedule WHERE fno='$fno' AND adatetime='$adatetimeFormatted' AND ddatetime='$ddatetimeFormatted'";
            $result1=mysqli_query($conn,$sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $seq_id = $row1['seq_no'];

            $query = "UPDATE seat_cost SET price = $cof, date = NOW(), class_id = $class_id WHERE seq_no = $seq_no AND classname = 'First Class'";
            $run = mysqli_query($conn, $query);
            if ($run) 
                echo "<script>alert('Seat cost updated for seq_no: $seq_no');</script>";
        }
        else
        {
            $noofseatsoffir=0;
        } 
        if ($cob>0)
        {
            $sql="SELECT * FROM class WHERE fno='$fno' AND cname='Business Class'";
            $result=mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $class_id = $row['class_id'];
            
            if ($row['noofseats']>0)
            {
                $noofseatsofbsn=$row['noofseats'];
            }
            else
            {
                $noofseatsofbsn=0;
            }
            $sql1="SELECT seq_no FROM flight_schedule WHERE fno='$fno' AND adatetime='$adatetimeFormatted' AND ddatetime='$ddatetimeFormatted'";
            $result1=mysqli_query($conn,$sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $seq_id = $row1['seq_no'];

            $query = "UPDATE seat_cost SET price = $cob, date = NOW(), class_id = $class_id WHERE seq_no = $seq_no AND classname = 'Business Class'";
            $run = mysqli_query($conn, $query);
            if ($run) 
                echo "<script>alert('Seat cost updated for seq_no: $seq_no');</script>";
        }
        else
        {
            $noofseatsofbsn=0;
        }
        // $query = "UPDATE flight_availabality SET seatsofeco = $noofseatsofeco, seatsofbsn = $noofseatsofbsn, seatsoffrt = $noofseatsoffir WHERE seq_no = $seq_no";
        // $run = mysqli_query($conn, $query);
        // if ($run)
        //     echo "<script>alert('Flight Scheduled $noofseatsofeco $noofseatsoffir $noofseatsofbsn');</script>";
        echo "<script>window.location.href = 'scheduled-flight-details.php';</script>";
    }
  }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    function loadData(type, id1) {
      $.ajax({
        url: 'data.php',
        method: 'POST',
        data: { type: type, id: id1 },
        success: function (data) {
          if (type == "") {
            $("#air").append(data);
          } else {
            $("#flight").html(data);
          }
        }
      });
    }
    loadData("", "");

    $("#air").on("change", function () {
      var airline = $(this).val();
      loadData("flightData", airline);
    });

    
    function checkEconomyClass(flightNumber) {
      $.ajax({
        url: 'data.php',
        method: 'POST',
        data: { type: 'checkEconomyClass', flightNumber: flightNumber },
        success: function (data) {
          // If economy class exists, check the checkbox
          if (data == "true") {
            $("#eco").prop("checked", true);
            $("#seat1").show();
          } else {
            $("#eco").prop("checked", false);
            $("#seat1").hide();
          }
        }
      });
    }

    function checkFirstClass(flightNumber) {
      $.ajax({
        url: 'data.php',
        method: 'POST',
        data: { type: 'checkFirstClass', flightNumber: flightNumber },
        success: function (data) {
          // If economy class exists, check the checkbox
          if (data == "true") {
            $("#fir").prop("checked", true);
            $("#seat2").show();
          } else {
            $("#fir").prop("checked", false);
            $("#seat2").hide();
          }
        }
      });
    }

    function checkBusinessClass(flightNumber) {
      $.ajax({
        url: 'data.php',
        method: 'POST',
        data: { type: 'checkBusinessClass', flightNumber: flightNumber },
        success: function (data) {
          // If economy class exists, check the checkbox
          if (data == "true") {
            $("#bsn").prop("checked", true);
            $("#seat3").show();
          } else {
            $("#bsn").prop("checked", false);
            $("#seat3").hide();
          }
        }
      });
    }
    $("#flight").on("change", function () {
      var airline = $("#air").val();
      var flightNumber = $(this).val();
      checkEconomyClass(flightNumber);
      checkFirstClass(flightNumber);
      checkBusinessClass(flightNumber);
    });







    function printEconomyClass(flightNumber) {
      $.ajax({
        url: 'data.php',
        method: 'POST',
        data: { type: 'printEconomyClass', flightNumber: flightNumber },
        success: function (data) {
          if (data > 0) {
            $("#noes").val(data);
          }
          else
          {
            $("#noes").val("");

          }
        }
      });
    }

    function printFirstClass(flightNumber) {
      $.ajax({
        url: 'data.php',
        method: 'POST',
        data: { type: 'printFirstClass', flightNumber: flightNumber },
        success: function (data) {
          if (data > 0) {
            $("#nofcs").val(data);
          }
          else
            $("#nofcs").val("");
        }
      });
    }

    function printBusinessClass(flightNumber) {
      $.ajax({
        url: 'data.php',
        method: 'POST',
        data: { type: 'printBusinessClass', flightNumber: flightNumber },
        success: function (data) {
          if (data > 0) {
            $("#nobs").val(data);
          }
          else
            $("#nobs").val("");
        }
      });
    }

    $("#flight").on("change", function () {
      var airline = $("#air").val();
      var flightNumber = $(this).val();
      printEconomyClass(flightNumber);
      printFirstClass(flightNumber);
      printBusinessClass(flightNumber);
    });

  });
</script>

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
              <li><a href="index.php"> <i class="fa fa-space-shuttle" style="font-size:20px;"></i></i> ADD NEW FLIGHT
                </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
          </div>
          <div class="nav-links">
            <ul>
              <li><a href="create-new-tc.php"><i class="fa fa-plane" style="font-size:20px"></i> ADD NEW AIRLINE </a>
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
    <form class="heading" action="schedule-flight-update.php" method='POST' onsubmit="return validateDateTime()">
      <div class="container">
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>SCHEDULE A FLIGHT</h4>
                <small class='form-text text-muted' style="font-size:15px;">(If Flight added already and you want to
                  update then click on <a href="data-of-tc.php">update flight</a> )</small>
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <?php
                    if (isset($_GET['seq_no_of_scheduled_flight']))
                    {
                      $seq_no=$_GET['seq_no_of_scheduled_flight'];
                      
                      $sql = "SELECT * FROM flight_schedule WHERE seq_no=$seq_no";
                      $result = mysqli_query($conn, $sql);
                      if ($result) 
                      {
                          if (mysqli_num_rows($result) > 0) 
                          {
                              $row = mysqli_fetch_assoc($result);
                              $fno=$row['fno'];
                          }
                      }
                      // echo $fno;
                      $sql = "SELECT * FROM flight WHERE fno = $fno";
                      $result = mysqli_query($conn, $sql);
                      if ($result) 
                      {
                          if (mysqli_num_rows($result) > 0) 
                          {
                              $row = mysqli_fetch_assoc($result);
                          }
                      }

                      $ano=$row['ano'];
                      // echo $ano;
                      $sql1 = "SELECT * FROM airline WHERE ano=$ano";
                      $result1 = mysqli_query($conn, $sql1);
                      if ($result1) 
                      {
                          if (mysqli_num_rows($result1) > 0) 
                          {
                              $row1 = mysqli_fetch_assoc($result1);
                              $an=$row1['aname'];
                          }
                      }

                      ?>
                      <tbody>
                        <tr>
                          <td><b>Select Airline </b></td>
                          <td><b>:</b></td>
                          <td>
                            <select class="box" name="aname" id="air" disabled>
                              <option value="<?php echo $an;?>" selected><?php echo $an;?></option>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </td>
                        </tr>

                        <tr>
                          <td><b>Select Flight Number</b></td>
                          <td><b>:</b></td>
                          <td>
                            <select class="box" id="flight" name="fno" disabled>
                              <option value="<?php echo $fno;?>" selected disabled><?php echo $fno;?></option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td><b>Flight Has</b></td>
                          <td><b>:</b></td>
                          <td>
                            <?php
                                $sql2 = "SELECT * FROM class WHERE fno=$fno AND cname='Economy Class'";
                                $result2 = mysqli_query($conn, $sql2);
                                if ($result2) 
                                {
                                    if (mysqli_num_rows($result2) > 0) 
                                    {
                                        $row2 = mysqli_fetch_assoc($result2);
                                        $noofseatsofeco=$row2['noofseats'];
                                    }
                                }
                                // echo "$noofseats";
                            ?>
                            <input type="checkbox" id="eco" name="eco" <?php if($noofseatsofeco > 0) echo "checked"; ?> disabled onchange="toggleSeatsVisibility()">
                            <label for="eco">Economy Class</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php
                                $sql3 = "SELECT * FROM class WHERE fno=$fno AND cname='Business Class'";
                                $result3 = mysqli_query($conn, $sql3);
                                if ($result3) 
                                {
                                    if (mysqli_num_rows($result3) > 0) 
                                    {
                                        $row3 = mysqli_fetch_assoc($result3);
                                        $noofseatsofbsn=$row3['noofseats'];
                                    }
                                }
                                // echo "$noofseats";
                            ?>
                            <input type="checkbox" id="bsn" name="bsn" <?php if($noofseatsofbsn > 0) echo "checked"; ?> disabled onchange="toggleSeatsVisibility()">
                            <label for="bsn">Business Class</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php
                                $sql4 = "SELECT * FROM class WHERE fno=$fno AND cname='First Class'";
                                $result4 = mysqli_query($conn, $sql4);
                                if ($result4) 
                                {
                                    if (mysqli_num_rows($result4) > 0) 
                                    {
                                        $row4 = mysqli_fetch_assoc($result4);
                                        $noofseatsoffrt=$row4['noofseats'];
                                    }
                                }
                                // echo "$noofseats";
                            ?>
                            <input type="checkbox" id="fir" name="fir" <?php if($noofseatsoffrt > 0) echo "checked"; ?> disabled onchange="toggleSeatsVisibility()">
                            <label for="fir">First Class</label>&nbsp;&nbsp;&nbsp;&nbsp;
                          </td>
                        </tr>
                        <tr>
                          <td><b>Enter Number of Economy Class Seats</b></td>
                          <td><b>:</b></td>
                          <td><input type="number" class="box" name="noes" id="noes" min='20' max='40' value="<?php echo $noofseatsofeco;?>" disabled></td>
                        </tr>
                        <tr>
                            <td><b>Enter Number of Business Class Seats</b></td>
                            <td><b>:</b></td>
                            <td><input type="number" class="box" name="nobs" id="nobs" min='10' max='30' value="<?php echo $noofseatsofbsn;?>" disabled></td>
                        </tr>
                        <tr>
                            <td><b>Enter Number of First Class Seats</b></td>
                            <td><b>:</b></td>
                            <td><input type="number" class="box" name="nofcs" id="nofcs" min='15' max='35' value="<?php echo $noofseatsoffrt;?>" disabled></td>
                        </tr>
                        <tr>
                          <td><b>Select Source </b></td>
                          <td><b>:</b></td>
                          <td>
                            <select name="source" id="select1" onchange="getSelectValue(this.value)">
                            <?php
                                $sql = "SELECT * FROM flight_schedule WHERE seq_no=$seq_no";
                                $result = mysqli_query($conn, $sql);
                                if ($result) 
                                {
                                    if (mysqli_num_rows($result) > 0) {
                                        // Fetch the first row
                                        $row = mysqli_fetch_assoc($result);
                                        $src=$row['source'];
                                        // echo $src;
                                        $dest=$row['destination'];
                                        $d=$row['adatetime'];
                                        $a=$row['ddatetime'];
                                      }
                                }
                            ?>
                              <option value="NSK" <?php if($src=="NSK") echo "selected";?>>Nashik (NSK)</option>
                              <option value="BOM" <?php if($src=="BOM") echo "selected";?>>Mumbai (BOM)</option>
                              <option value="BGL" <?php if($src=="BGL") echo "selected";?>>Bengaluru (BGL)</option>
                              <option value="KOC" <?php if($src=="KOC") echo "selected";?>>Kochi (KOC)</option>
                              <option value="DEL" <?php if($src=="DEL") echo "selected";?>>Delhi (DEL)</option>
                              <option value="HYD" <?php if($src=="HYD") echo "selected";?>>Hyderabad (HYD)</option>
                              <option value="MAA" <?php if($src=="MAA") echo "selected";?>>Chennai (MAA)</option>
                              <option value="AMD" <?php if($src=="AMD") echo "selected";?>>Ahmedabad (AMD)</option>
                              <option value="ATQ" <?php if($src=="ATQ") echo "selected";?>>Amritsar (ATQ)</option>
                              <option value="CCU" <?php if($src=="CCU") echo "selected";?>>Kolkata (CCU)</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td><b>Select Destination </b></td>
                          <td><b>:</b></td>
                          <td>
                            <select name="dest" id="select2">
                            <option value="NSK" <?php if($dest=="NSK") echo "selected";?>>Nashik (NSK)</option>
                              <option value="BOM" <?php if($dest=="BOM") echo "selected";?>>Mumbai (BOM)</option>
                              <option value="BGL" <?php if($dest=="BGL") echo "selected";?>>Bengaluru (BGL)</option>
                              <option value="KOC" <?php if($dest=="KOC") echo "selected";?>>Kochi (KOC)</option>
                              <option value="DEL" <?php if($dest=="DEL") echo "selected";?>>Delhi (DEL)</option>
                              <option value="HYD" <?php if($dest=="HYD") echo "selected";?>>Hyderabad (HYD)</option>
                              <option value="MAA" <?php if($dest=="MAA") echo "selected";?>>Chennai (MAA)</option>
                              <option value="AMD" <?php if($dest=="AMD") echo "selected";?>>Ahmedabad (AMD)</option>
                              <option value="ATQ" <?php if($dest=="ATQ") echo "selected";?>>Amritsar (ATQ)</option>
                              <option value="CCU" <?php if($dest=="CCU") echo "selected";?>>Kolkata (CCU)</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td><b>Select Arrival Date-Time of Flight</b></td>
                          <td><b>:</b></td>
                          <td>
                    
                            <input type="datetime-local" class="box" id="adatetime" name="adatetime"  value="<?php echo $d;?>"required>
                          </td>
                        </tr>
                        <tr>
                          <td><b>Select Departure  Date-Time of Flight</b></td>
                          <td><b>:</b></td>
                          <td>
                            <input type="datetime-local" class="box" id="ddatetime" name="ddatetime" value="<?php echo $a;?>"required>
                          </td>
                        </tr>
                        <?php
                            $sql7 = "SELECT * FROM seat_cost WHERE seq_no = $seq_no AND classname='Economy Class'";
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
                        <tr id="seat1" <?php if($noofseatsofeco==0) echo "hidden"?>>
                          <td><b>Enter Seat Cost for Economy Class</b></td>
                          <td><b>:</b></td>
                          <td><input type="number" class="box" name="coe" min='1000' max='20000' value="<?php if($coofeco!=0)echo $coofeco; ?>">
                          </td>
                        </tr>
                        <?php
                            $sql7 = "SELECT * FROM seat_cost WHERE seq_no = $seq_no AND classname='First Class'";
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
                        <tr id="seat2" <?php if($noofseatsoffrt==0) echo "hidden"?>>
                          <td><b>Enter Seat Cost for First Class</b></td>
                          <td><b>:</b></td>
                          <td><input type="number" class="box" name="cof" min='5000' max='40000' value="<?php if($cooffrt!=0)echo $cooffrt; ?>">
                          </td>
                        </tr>
                        <?php
                            $sql7 = "SELECT * FROM seat_cost WHERE seq_no = $seq_no AND classname='Business Class'";
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
                        <tr id="seat3" <?php if($noofseatsofbsn==0) echo "hidden"?>>
                          <td><b>Enter Seat Cost for Business Class</b></td>
                          <td><b>:</b></td>
                          <td><input type="number" class="box" name="cob" min='8000' max='80000' value="<?php if($coofbsn!=0)echo $coofbsn; ?>">
                          </td>
                        </tr>
                      </tbody>
                      <?php
                    }
                  ?>
                  
                </table>
                <br>
                <div class="contain1">
                  <div class="form-btn">
                    <input type="number" value="<?php echo "$seq_no";?>" name="seq_no" hidden>
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" class="btn btn-danger" value="Reset">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer">
        <div class="contain">
          <div class="col">
            <h2></h2>
          </div>
    </form>
    <footer class="footer py-4">
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
  <script>
    function toggleSeatsVisibility() {
      var ecoCheckbox = document.getElementById("eco");
      var bsnCheckbox = document.getElementById("bsn");
      var firCheckbox = document.getElementById("fir");

      var ecoInput = document.getElementById("noes");
      var bsnInput = document.getElementById("nobs");
      var firInput = document.getElementById("nofcs");

      ecoInput.disabled = !ecoCheckbox.checked;
      bsnInput.disabled = !bsnCheckbox.checked;
      firInput.disabled = !firCheckbox.checked;
    }

    document.getElementById('adatetime').addEventListener('change', function() {
        var arrivalDateTime = new Date(document.getElementById('adatetime').value);
        var departureDateTimeInput = document.getElementById('ddatetime');

        if (arrivalDateTime > new Date(departureDateTimeInput.value)) {
            departureDateTimeInput.value = document.getElementById('adatetime').value;
        }
        
        departureDateTimeInput.min = document.getElementById('adatetime').value;
    });

    function validateDateTime() {
        var adatetime = new Date(document.getElementById('adatetime').value);
        var ddatetime = new Date(document.getElementById('ddatetime').value);

        // Add 30 minutes to the arrival datetime
        adatetime.setMinutes(adatetime.getMinutes() + 30);

        // Calculate the maximum departure datetime (12 hours after arrival datetime)
        var maxDepartureDatetime = new Date(adatetime.getTime() + (12 * 60 * 60 * 1000));

        // Compare arrival datetime + 30 minutes with departure datetime
        if (adatetime > ddatetime) {
            alert('Departure time must be at least 30 minutes later than arrival time.');
            return false; // Prevent form submission
        }

        // Check if departure datetime is greater than the maximum allowed datetime
        if (ddatetime > maxDepartureDatetime) {
            alert('Departure time must not be greater than 12 hours after arrival time.');
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }


    function getSelectValue(select1)
    {
          if (select1!="")
          {
             $("#select2 option[value='"+select1+"']").hide();
             $("#select2 option[value!='"+select1+"']").show();
          }

    }
  </script>

</body>

</html>