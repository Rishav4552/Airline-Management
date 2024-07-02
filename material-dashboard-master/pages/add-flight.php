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
  <title>Add Flight</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <link rel="icon" type="image/png" href="assets/fg.png">  <!--this for show your LOGO on tab HA AAPLA TAKU-->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />   <!--FONT-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">  <!-- Material Icons INCOME HE TE -->
  <!-- CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link id="pagestyle" href="../assetsp/css/my.css?v=3.1.0" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/my.css?v=3.1.0" rel="stylesheet" /> 
  <style>
    .con2 {
      margin-top: -25px; /* Adjust margin top to accommodate navbar height */
      padding: 20px;
      box-sizing: border-box;
    }
    .aaa{
      height: 50px;
      width: 165px;
      margin-right: 10px;
    }
    .container2 {display : flex; justify-content: space-between;}
    .nav-links
    {
      flex:1; 
      text-align: left;
      max-height: 20px;
    }
    .nav-links ul li
    {
      list-style: none;
      display: inline-block;
      padding: 8px 12px;
      position: relative;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
    .nav-links ul li a
    {
      color: black;
      text-decoration: none;
      font-size: 15px;
    }
    .nav-links ul li::after
    {
      content: "";
      width: 0%;
      height: 3px;
      background: #8E2157;
      display: block;
      margin: auto;
      transition: 1s;
    }
    .nav-links ul li:hover::after
    {
      width: 100%;
    }
    select {
      height:30px;
    }
    .contain1 
    {
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
      if (isset($_POST['edit']))
      {
        $airline=$_POST['aname'];
        $fno=$_POST['fno'];
        
        if (isset($_POST['eco']))
        {
            $eco=$_POST['eco'];
            $noes=$_POST['noes'];
        }    
        else
            $noes=0;
        if (isset($_POST['bsn']))
        {
            $bsn=$_POST['bsn'];
            $nobs=$_POST['nobs'];
        }
        else
            $nobs=0;
        if (isset($_POST['fir']))
        {
            $fir=$_POST['fir'];
            $nofcs=$_POST['nofcs'];
        }
        else
            $nofcs=0;

        echo $nobs;
        $total_seats=$_POST['total_seats'];
        $sql="SELECT * FROM flight WHERE fno='$fno'";
        $result=mysqli_query($conn,$sql);
        $rowCount=mysqli_num_rows($result);

        $sql = "UPDATE flight SET tnoseats = ?, ano = ? WHERE fno = ?";
        $stmt = mysqli_stmt_init($conn);
        $prepare = mysqli_stmt_prepare($stmt, $sql);
        if ($prepare) {
            mysqli_stmt_bind_param($stmt, "iii", $total_seats, $airline, $fno);
            mysqli_stmt_execute($stmt);
        echo "<script>alert('Flight $fno updated successfully $total_seats $noes $nobs $nofcs');</script>";
            
        }
        

        $sql = "UPDATE class SET noofseats = ? WHERE fno = ? AND cname = ?";
        $stmt = mysqli_stmt_init($conn);
        $prepare = mysqli_stmt_prepare($stmt, $sql);
        if ($prepare) {
            $class = "Economy Class";
            mysqli_stmt_bind_param($stmt, "iis", $noes, $fno, $class);
            mysqli_stmt_execute($stmt);
        
            $class = "Business Class";
            mysqli_stmt_bind_param($stmt, "iis", $nobs, $fno, $class);
            mysqli_stmt_execute($stmt);
        
            $class = "First Class";
            mysqli_stmt_bind_param($stmt, "iis", $nofcs, $fno, $class);
            mysqli_stmt_execute($stmt);
            
          echo "<script>alert('Seats updated successfully');</script>";
          
          echo "<script>window.location.href = 'flights-available.php';</script>";
        }
        
        // header('Location: flights-available.php');
      }
      else
      {
        
        $airline=$_POST['aname'];
        $fno=$_POST['fno'];
        if (isset($_POST['eco']))
        {
            $eco=$_POST['eco'];
            $noes=$_POST['noes'];
        }    
        else
            $noes=0;
        if (isset($_POST['bsn']))
        {
            $bsn=$_POST['bsn'];
            $nobs=$_POST['nobs'];
        }
        else
            $nobs=0;
        if (isset($_POST['fir']))
        {
            $fir=$_POST['fir'];
            $nofcs=$_POST['nofcs'];
        }
        else
            $nofcs=0;

        $total_seats=$_POST['total_seats'];
        $sql="SELECT * FROM flight WHERE fno='$fno'";
        $result=mysqli_query($conn,$sql);
        $rowCount=mysqli_num_rows($result);
        if ($rowCount>0)
        {
            $already=true;
            echo "<script>alert('This Flight Already Present');</script>";
        }
        else
        {
          $sql ="INSERT INTO flight(fno,tnoseats,ano) VALUES (?,?,?)";
          $stmt =mysqli_stmt_init($conn);
          $prepare =mysqli_stmt_prepare($stmt,$sql);
          if ($prepare)
          {
            mysqli_stmt_bind_param($stmt,"iii",$fno,$total_seats,$airline);
            mysqli_stmt_execute($stmt);
            echo "<script>alert('flight $fno added successfully');</script>";
          }

          $sql="INSERT INTO class(cname,noofseats,fno) VALUES (?,?,?)";
          $stmt =mysqli_stmt_init($conn);
          $prepare =mysqli_stmt_prepare($stmt,$sql);
          if ($prepare)
          {
            $class="Economy Class";
            mysqli_stmt_bind_param($stmt,"sii",$class,$noes,$fno);
            mysqli_stmt_execute($stmt);
            //  echo "<script>alert('flight $class added successfully');</script>";

            $class="Business Class";
            mysqli_stmt_bind_param($stmt,"sii",$class,$nobs,$fno);
            mysqli_stmt_execute($stmt);
            //  echo "<script>alert('flight $class added successfully');</script>";

            $class="First Class";
            mysqli_stmt_bind_param($stmt,"sii",$class,$nofcs,$fno);
            mysqli_stmt_execute($stmt);
            //  echo "<script>alert('flight $class added successfully');</script>";
            echo "<script>window.location.href = 'flights-available.php';</script>";
          }
          // header('Location: flights-available.php');
        }
      }
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
          <a class="nav-link text-white " href="airline-management.PHP">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Airline Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="flights-available.php">
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
      <!-- Navbar -->
     <!-- Navbar -->
     <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <img class="aaa" src="assets/GG-removebg-preview.png">
        <div class="container2">
          <!-- <div class="nav-links">
             <ul>
                <li><a href="index.php"> <i class="fa fa-space-shuttle" style="font-size:20px;"></i></i> ADD NEW FLIGHT </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             </ul>
          </div>
          <div class="nav-links">
            <ul>
                <li><a href="create-new-tc.php"><i class="fa fa-plane" style="font-size:20px"></i> ADD NEW AIRLINE </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
          </div>  -->
              <div class="nav-links">
                <ul><li><a href="logout.php" style="color:chocolate;"><?php echo $name;?> <i class="fa fa-sign-out" style="font-size:18px"></i></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
              </div>
       </div>
        </div>
      </div>
    </nav>

    <div class="container">
            <br>
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                              ADD A FLIGHT
                              <a href="flights-available.php"><button class="btn btn-warning float-end"><b> <i class="fa fa-plane"></i> &nbsp;VIEW FLIGHT(S)</b></button></a>
                            </h4>
                        <form class="heading" action="add-flight.php" method='POST'>
                        </div>
                        <div class="card-body">
                             <table class="table table-striped">
                                <?php
                                    if(isset($_GET['ig']))
                                    {
                                        $fno=$_GET['ig'];
                                        $edit=true;
                                        $hostName ="localhost";
                                        $dbusers ="root";
                                        $dbPassword ="";
                                        $dbName ="jetsetfly";
                                        $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
                                        if (!$conn)
                                        {
                                            die("Something went Wrong");
                                        }


                                        $sql = "SELECT * FROM flight WHERE fno = $fno";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result) 
                                        {
                                            if (mysqli_num_rows($result) > 0) 
                                            {
                                                $row = mysqli_fetch_assoc($result);
                                                // echo $row['seq_no'];
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
                                        // echo $an;
                                        
                                        ?>
                                     <tbody>
                                        <tr>
                                          <td><b>Select Airline </b></td><td><b>:</b></td>
                                          <td>
                                              <select class="box" name="aname" readonly>
                                                <option id="" value="" selected>        </option>
                                                <?php
                                                    $available_a=mysqli_query($conn,"select * from airline");
                                                    while ($avla=mysqli_fetch_array($available_a))
                                                    {
                                                      ?>
                                                        <option value="<?php echo $avla['ano'];?>"; <?php if($an==$avla['aname']) echo"selected";?>><?php echo $avla['aname'];?></option>
                                                      <?php
                                                    }
                                                    ?>
                                               </select>
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          </td>   
                                        </tr>
                                        
                                        <tr>
                                          <td><b>Enter Flight Number</b></td><td><b>:</b></td>
                                          <td>
                                            <input type="text" class="box" name="fno" value="<?php echo $row['fno'];?>" readonly>
                                            <input type="text" class="box" name="edit" value="<?php echo $edit;?>" hidden>
                                          </td>   
                                        </tr>
                                        <tr>
                                          <td><b>Flight Has</b></td><td><b>:</b></td>
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
                                            <input type="checkbox" id="eco" name="eco" <?php if($noofseatsofeco > 0) echo "checked"; ?> onchange="toggleSeatsVisibility()">
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
                                            <input type="checkbox" id="bsn" name="bsn" <?php if($noofseatsofbsn > 0) echo "checked"; ?> onchange="toggleSeatsVisibility()">
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
                                            <input type="checkbox" id="fir" name="fir" <?php if($noofseatsoffrt > 0) echo "checked"; ?>  onchange="toggleSeatsVisibility()">
                                            <label for="fir">First Class</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                          </td>   
                                        </tr>
                                        <tr>
                                          <td><b>Enter Number of Economy Class Seats</b></td>
                                          <td><b>:</b></td>
                                          <td><input type="number" class="box" name="noes" id="noes" min='20' max='40' value="<?php echo $noofseatsofeco;?>" oninput="calculateTotal()" required></td>
                                        </tr>
                                        <tr>
                                            <td><b>Enter Number of Business Class Seats</b></td>
                                            <td><b>:</b></td>
                                            <td><input type="number" class="box" name="nobs" id="nobs" min='10' max='30' value="<?php echo $noofseatsofbsn;?>" oninput="calculateTotal()" required></td>
                                        </tr>
                                        <tr>
                                            <td><b>Enter Number of First Class Seats</b></td>
                                            <td><b>:</b></td>
                                            <td><input type="number" class="box" name="nofcs" id="nofcs" min='15' max='35' value="<?php echo $noofseatsoffrt;?>" oninput="calculateTotal()" required></td>
                                        </tr>
                                        <tr>
                                            <td><b>Total Number of Seats</b></td>
                                            <td><b>:</b></td>
                                            <td><input type="text" class="box" name="total_seats" id="total_seats" min='45' max='105' readonly></td>   
                                        </tr>
                                     </tbody>
                                     <?php 
                                  }
                                  else
                                  {
                                    ?>
                                    <tbody>
                                        <tr>
                                          <td><b>Select Airline </b></td><td><b>:</b></td>
                                          <td>
                                              <select class="box" name="aname">
                                                <option id="" value="" selected>        </option> 
                                                <?php 
                                                  if(isset($_GET['id']))
                                                  {
                                                    $select1=$_GET['id'];
                                                  }
                                                ?>
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
                                                    $available_a=mysqli_query($conn,"select * from airline");
                                                    while ($avla=mysqli_fetch_array($available_a))
                                                    {
                                                    ?>
                                                        <option value="<?php echo $avla['ano'];?>" <?php if(isset($_GET['id'])) if($select1==$avla['ano']) echo"selected";?>><?php echo $avla['aname'];?></option>
                                               <?php
                                                    }
                                                    ?>
                                               </select>
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          </td>   
                                        </tr>
                                        
                                        <tr>
                                          <td><b>Enter Flight Number</b></td><td><b>:</b></td>
                                          <td><input type="text" class="box" name="fno" required></td>   
                                        </tr>
                                        <tr>
                                          <td><b>Flight Has</b></td><td><b>:</b></td>
                                          <td>
                                            <input type="checkbox" id="eco" name="eco" checked onchange="toggleSeatsVisibility()">
                                            <label for="eco">Economy Class</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" id="bsn" name="bsn" checked onchange="toggleSeatsVisibility()">
                                            <label for="bsn">Business Class</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" id="fir" name="fir" checked onchange="toggleSeatsVisibility()">
                                            <label for="fir">First Class</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                          </td>   
                                        </tr>
                                        <tr>
                                          <td><b>Enter Number of Economy Class Seats</b></td>
                                          <td><b>:</b></td>
                                          <td><input type="number" class="box" name="noes" id="noes" min='20' max='40' oninput="calculateTotal()" required></td>
                                        </tr>
                                        <tr>
                                            <td><b>Enter Number of Business Class Seats</b></td>
                                            <td><b>:</b></td>
                                            <td><input type="number" class="box" name="nobs" id="nobs" min='10' max='30' oninput="calculateTotal()" required></td>
                                        </tr>
                                        <tr>
                                            <td><b>Enter Number of First Class Seats</b></td>
                                            <td><b>:</b></td>
                                            <td><input type="number" class="box" name="nofcs" id="nofcs" min='15' max='35' oninput="calculateTotal()" required></td>
                                        </tr>
                                        <tr>
                                            <td><b>Total Number of Seats</b></td>
                                            <td><b>:</b></td>
                                            <td><input type="text" class="box" name="total_seats" id="total_seats" min='45' max='105' readonly></td>   
                                        </tr>
                                    </tbody>
                                    <?php
                                  }
                                    ?>
                             </table>
                             <br>
                            <div class="contain1">
                                <div class="form-btn">
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
                © <script>
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
                  <a href="https://www.youtube.com/channel/UCNCWGkiAKDhwgCuGT02aXCg" class="nav-link text-muted" target="_blank"><i class="fa fa-youtube-play"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <script>
    function calculateTotal() {
        var noes = 0;
        var nobs = 0;
        var nofcs = 0;

        if (document.getElementById('eco').checked) {
            noes = parseInt(document.getElementById('noes').value) || 0;
        }
        if (document.getElementById('bsn').checked) {
            nobs = parseInt(document.getElementById('nobs').value) || 0;
        }
        if (document.getElementById('fir').checked) {
            nofcs = parseInt(document.getElementById('nofcs').value) || 0;
        }

        var totalSeats = noes + nobs + nofcs;
        if (!isNaN(totalSeats)) {
            document.getElementById('total_seats').value = totalSeats;
        } else {
            document.getElementById('total_seats').value = "N/A";
        }
    }

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

        // Recalculate total seats when toggling visibility
        calculateTotal();
    }
    toggleSeatsVisibility();
  </script>

</body>
</html>