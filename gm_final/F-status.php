<?php
 session_start();
 if(!isset($_SESSION['log']))
 {
     header("Location: login.php");
 }
 if (isset($_SESSION['userid']))
 {
     $userid=$_SESSION['userid'];
 }
 if (isset($_SESSION['u']))
 {
     $username=$_SESSION['u'];
 }
?>
<!DOCTYPE html>
<?php
    $from=$_POST['from'];
    $to=$_POST['to'];
    $d_date=$_POST['d_date'];
    $dateObj = DateTime::createFromFormat('d/m/Y', $d_date);
    $formattedDate = $dateObj->format('d F Y');

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
<html>

<head>
   <title>Flight Status</title>
   <link rel="icon" type="image/png" href="assets/tablogo.png">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
   <style>
      @import url("https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap");

      :root {
         --primary-color: #8E2157;
         --primary-color-dark: #6b0f3d;
         --text-dark: #0b0f18;
         --text-light: #503744;
         --extra-light: #f1f5f9;
         --white: #ffffff;
         --max-width: 1400px;
      }

      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: 'Poppins', sans-serif;
      }

      body {
         background-color: #f1f5f9;
      }

      /*-----------------HEADER------------------------*/
      header {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         display: flex;
         justify-content: space-between;
         align-items: center;
         transition: 0.6s;
         padding: 10px 20px 8px 30px;
         z-index: 10;
         background-color: var(--white);
      }

      header .logo {
         font-weight: 700;
         color: white;
         text-decoration: none;
         font-size: 1.5rem;
         text-transform: uppercase;
         letter-spacing: 2px;
         transition: 0.6s;
      }

      header ul {
         display: flex;
         justify-content: center;
         align-items: center;
      }

      header ul li {
         margin-right: 15px;
         list-style: none;
      }

      header ul li:last-child {
         margin-right: 0;
      }

      header ul li a {
         margin: 0 15px;
         text-decoration: none;
         color: var(--primary-color);
         letter-spacing: 2px;
         font-weight: 700;
         transition: 0.6s;
         background: #fff;
      }

      header a {
         text-decoration: none;
         color: var(--primary-color);
      }

      header a:hover {
         text-decoration: none;
         color: var(--primary-color);
      }

      .nav__logo img {
         height: 50px;
         width: 150px;
         margin-right: 10px;
      }

      .nav__links {
         list-style: none;
         display: flex;
         align-items: center;
         gap: 2rem;
      }

      .nav__links li {
         list-style: none;
         display: inline-block;
         top: 8px;
         padding: 8px 10px;
         position: relative;
         font-family: 'Poppins', sans-serif;
      }

      .nav__links li a {
         color: var(--text-dark);
         text-decoration: none;
         font-weight: 700;
         font-family: 'Poppins', sans-serif;
      }

      .nav__links li::after {
         content: '';
         width: 0%;
         height: 3px;
         background: var(--primary-color);
         display: block;
         margin: auto;
         transition: 0.5s;
      }

      .nav__links li:hover::after {
         width: 80%;
      }

      .login {
         display: flex;
         align-items: center;
      }

      .login i {
         position: relative;
         right: 40px;
         top: 0px;
      }

      .login div {
         position: relative;
         right: 35px;
      }

      .btn {
         padding: 0.75rem 2rem;
         outline: none;
         border: none;
         font-size: 1rem;
         font-weight: 500;
         color: var(--white);
         background-color: var(--primary-color);
         border-radius: 2rem;
         cursor: pointer;
         transition: 0.3s;
      }

      .btn a {
         color: var(--extra-light);
         text-decoration: none;
      }

      .btn:hover {
         background-color: var(--primary-color-dark);
         color:white;
      }

         /*--------------------FOOTER CSS------------------*/
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: var(--primary-color);
            padding: 20px 0;
            margin-top:30px;
        }

        .footer__bar1 {
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .footer__bar1 p {
            font-size: 1.1rem;
            color: white;
            padding: 0 80px;
        }

        .footer__container {
            display: grid;
            grid-template-columns: 2fr repeat(2, 1fr);
            gap: 5rem;
            padding: 18px 8px;
        }

        .social {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .social span {
            font-size: 1.2rem;
            color: var(--extra-light);
        }

        .social span a {
            text-decoration: none;
            color: var(--extra-light);
        }

        .n_logo {
            display: flex;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .n_logo img {
            height: 40px;
            width: 120px;
            margin-right: 10px;
        }
        .text-muted i{
         font-size:20px;
         color:white;
        }

      #main-box-Arrived,
      #main-box-Inflight {
         display: flex;
      }

      #main-box-NoFlight {
         display: flex;
         justify-content: center;
         margin-bottom: 40px;
      }

      #main-box-NDepartured {
         display: flex;
         margin-bottom: 40px;
      }

      #main-box-last {
         width: 85%;
         position: relative;
         top: 112px;
         background-color: white;
         text-align: center;
         padding: 20px 20px 0px 20px;
         border-radius: 20px;
         box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
      }

      #main-box {
         display: flex;
         top: 100px;
      }

      #main-box1 {
         width: 56%;
         position: relative;
         top: 112px;
         left: 150px;
         background-color: white;
         text-align: center;
         padding: 20px 20px 0px 20px;
         ;
         border-radius: 20px;
         box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
      }

      #main-box2 {
         width: 20%;
         position: relative;
         top: 112px;
         left: 150px;
         background-color: white;
         text-align: center;
         border-radius: 20px;
         box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
      }

      #small-box {
         background-color: #8E2157;
         color: white;
         width: 50%;
         position: relative;
         top: 25px;
         left: 152px;
         padding: 7px 0px;
         border-top-left-radius: 10px;
         border-bottom-left-radius: 10px;
      }

      .text1 {
         display: flex;
         justify-content: space-between;
         padding: 0px 25px;
      }

      .flight-img {
         display: flex;
         justify-content: space-between;
         padding: 0px 25px;
         position: relative;
         bottom: 84px;
         left: 58px;
      }

      #date {
         position: relative;
         bottom: 15px;
      }

      #top-text {
         position: absolute;
         top: 131px;
         left: 577px;
         color: #1c1d1fcf
      }
   </style>
</head>

<body>
   <header>
      <div class="nav__logo"><img src="assets/jetsetflylogo.png"></div>
      <ul class="nav__links">
         <li class="link"><a href="homepagewl.php">HOME</a></li>
         <li class="link"><a href="MyFlights.php">MY FLIGHTS</a></li>
         <li class="link"><a href="AboutUs.php">ABOUT</a></li>
         <li class="link"><a href="feedback.php">FEEDBACK</a></li>
      </ul>
      <a class="user-log"><i class="fa fa-user" style="font-size:24px"></i> <?php echo $username;?></a>
      <a href="logout.php"><button class="btn">Logout &nbsp;<i class="fa fa-sign-out" style="font-size:15px"></i></button></a>
   </header>
   <br><br><br>
   <div style="text-align:center; margin-top:10px;">
      <h1>Flight Status</h1>
   </div>
   <div id="top-text" style="text-align:center;">
      <h4><?php echo $from; ?> To <?php echo $to; ?></h4>
      <h5><?php echo $formattedDate; ?></h5>
   </div>

   <?php
         if ($from=="Nashik (NSK)")
            $from="NSK";
         if ($from=="Mumbai (BOM)")
            $from="BOM";
         if ($from=="Bengaluru (BGL)")
            $from="BGL";
         if ($from=="Kochi (KOC)")
            $from="KOC";
         if ($from=="Delhi (DEL)")
            $from="DEL";
         if ($from=="Hyderabad (HYD)")
            $from="HYD";
         if ($from=="Chennai (MAA)")
            $from="MAA";
         if ($from=="Ahmedabad (AMD)")
            $from="AMD";
         if ($from=="Amritsar (ATQ)")
            $from="ATQ";
         if ($from=="Kolkata (CCU)")
            $from="CCU";

         if ($to=="Nashik (NSK)")
            $to="NSK";
         if ($to=="Mumbai (BOM)")
            $to="BOM";
         if ($to=="Bengaluru (BGL)")
            $to="BGL";
         if ($to=="Kochi (KOC)")
            $to="KOC";
         if ($to=="Delhi (DEL)")
            $to="DEL";
         if ($to=="Hyderabad (HYD)")
            $to="HYD";
         if ($to=="Chennai (MAA)")
            $to="MAA";
         if ($to=="Ahmedabad (AMD)")
            $to="AMD";
         if ($to=="Amritsar (ATQ)")
            $to="ATQ";
         if ($to=="Kolkata (CCU)")
            $to="CCU";
         $newDateString = date("Y-m-d", strtotime(str_replace('/', '-', $d_date)));

         
         $sql="SELECT * FROM flight_schedule WHERE source='$from' AND destination='$to' AND DATE(adatetime) = '$newDateString'";
         $result=mysqli_query($conn,$sql);
         
         if (mysqli_num_rows($result)>0)
         {
            foreach($result as $flight)
            {
               $ddatetime=$flight['adatetime'];
               $adatetime=$flight['ddatetime'];
               // echo "$ddatetime";
               // echo $adatetime;
               date_default_timezone_set('Asia/Kolkata');
               $currentDateTime = date('Y-m-d H:i:s');
               // echo $currentDateTime;
               if ($currentDateTime > $ddatetime && $currentDateTime < $adatetime)
               {
                  ?>
                     <div id="main-box-NDepartured">
                        <div id="main-box1">
                           <div class="text1">
                              <div>
                                 <h2><?php echo $flight['source'];?></h2>
                              </div>
                              <div>
                                 <h2><?php echo $flight['destination'];?></h2>
                              </div>
                           </div>
                           <div class="text1">
                              <div>Departed</div>
                              <div>Arrived</div>
                              <?php
                                 $adatetime=$flight['adatetime'];
                                 $adate = date("d M", strtotime($adatetime));
                                 $aday = date("D", strtotime($adate));
                                 $atime = date("H:i", strtotime($adatetime));

                                 $ddatetime=$flight['ddatetime'];
                                 $ddate = date("d M", strtotime($ddatetime));
                                 $dday = date("D", strtotime($ddate));
                                 $dtime = date("H:i", strtotime($ddatetime));
                              ?>
                           </div>
                           <div class="text1">
                              <div>
                                 <h1><?php echo $atime;?></h1>
                              </div>
                              <div>
                                 <h1><?php echo $dtime;?></h1>
                              </div>
                           </div>
                           <div class="text1" id="date">
                              <div><?php echo $aday; ?> ,<?php echo $adate;?></div>                
                              <div><?php echo $dday; ?> ,<?php echo $ddate;?></div>
                           </div>
                           <div class="flight-img">
                               <div class="col-1 p-0 m-0" style="position: absolute;right: 683px;">
                                  <i class="fa fa-circle mt-4 text-success" style="float: right;"></i>
                              </div>
                              <div class="col-7 p-10 m-0 mt-3" style="float: right;position:absolute;right:231px;">
                                 <hr class="bg-success">
                              </div>
                              <div style="position:absolute;right:450px;">
                                 <i class="fa fa-2x fa-fighter-jet mt-3 text-success"></i>
                              </div>
                              <div class="col-1 p-0 m-0" style="position: absolute;right: 242px;">
                                 <i class="fa fa-circle mt-4 text-success" style="float: right;"></i>
                              </div>
                           </div>
                           <br>
                        </div>
                        <div id="main-box2">
                           <div id="small-box" style="background-color: blue;">
                              <b>In Flight</b>
                           </div>
                           <div>
                              <br>
                              <br>
                              <div>
                                 <?php
                                    $fno=$flight['fno'];
                                    $sql="SELECT * FROM flight WHERE fno=$fno";
                                    $result=mysqli_query($conn,$sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $ano=$row['ano'];

                                    $sql="SELECT * FROM airline WHERE ano=$ano";
                                    $result=mysqli_query($conn,$sql);
                                    $row = mysqli_fetch_assoc($result);

                                 ?>
                                 <h4 style="margin:0px;"><?php echo $row['aname'];?></h4>
                              </div>
                              <div>
                                 <h5><?php echo $fno;?></h5>
                              </div>
                           </div>
                        </div>
                     </div>
                                    
                  <?php
               }
               else if ($currentDateTime >= $ddatetime)
               {
                  ?>
                  <div id="main-box-Arrived">
                     <div id="main-box1">
                        <div class="text1">
                           <div>
                              <h2><?php echo $flight['source'];?></h2>
                           </div>
                           <div>
                              <h2><?php echo $flight['destination'];?></h2>
                           </div>
                        </div>
                        <div class="text1">
                           <div>Departed</div>
                           <div>Arrived</div>
                           <?php
                              $adatetime=$flight['adatetime'];
                              $adate = date("d M", strtotime($adatetime));
                              $aday = date("D", strtotime($adate));
                              $atime = date("H:i", strtotime($adatetime));

                              $ddatetime=$flight['ddatetime'];
                              $ddate = date("d M", strtotime($ddatetime));
                              $dday = date("D", strtotime($ddate));
                              $dtime = date("H:i", strtotime($ddatetime));
                           ?>
                        </div>
                        <div class="text1">
                           <div>
                              <h1><?php echo $atime;?></h1>
                           </div>
                           <div>
                              <h1><?php echo $dtime;?></h1>
                           </div>
                        </div>
                        <div class="text1" id="date">
                           <div><?php echo $aday; ?> ,<?php echo $adate;?></div>                
                           <div><?php echo $dday; ?> ,<?php echo $ddate;?></div>
                        </div>
                        <div class="flight-img">
                           <div class="col-1 p-0 m-0" style="position: absolute;left: 47px;">
                              <i class="fa fa-circle mt-4 text-success" style="float: right;color: #8E2157;"></i>
                           </div>
                           <div class="col-7 p-10 m-0 mt-3" style="float: right;position:absolute;right:242px;">
                              <hr class="bg-success" style="color:#8E2157;">
                           </div>
                           <div style="position:absolute;right: 221px;color: #8E2157;">
                              <i class="fa fa-2x fa-fighter-jet mt-3 text-success" style="color:#8E2157;"></i>
                           </div>
                        </div>
                        <br>
                     </div>
                     <div id="main-box2">
                        <div id="small-box" style="background-color: green;">
                           <b>Arrived</b>
                        </div>
                        <div>
                           <br>
                           <br>
                           <div>
                              <?php
                                 $fno=$flight['fno'];
                                 $sql="SELECT * FROM flight WHERE fno=$fno";
                                 $result=mysqli_query($conn,$sql);
                                 $row = mysqli_fetch_assoc($result);
                                 $ano=$row['ano'];

                                 $sql="SELECT * FROM airline WHERE ano=$ano";
                                 $result=mysqli_query($conn,$sql);
                                 $row = mysqli_fetch_assoc($result);

                              ?>
                              <h4 style="margin:0px;"><?php echo $row['aname'];?></h4>
                           </div>
                           <div>
                              <h5><?php echo $fno;?></h5>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <?php 
               }
               else if ($currentDateTime <= $ddatetime)
               {
               ?>
                  <div id="main-box-Inflight">
                     <div id="main-box1">
                        <div class="text1">
                           <div>
                              <h2><?php echo $flight['source'];?></h2>
                           </div>
                           <div>
                              <h2><?php echo $flight['destination'];?></h2>
                           </div>
                        </div>
                        <div class="text1">
                           <div>Departed</div>
                           <div>Arrived</div>
                           <?php
                              $adatetime=$flight['adatetime'];
                              $adate = date("d M", strtotime($adatetime));
                              $aday = date("D", strtotime($adate));
                              $atime = date("H:i", strtotime($adatetime));

                              $ddatetime=$flight['ddatetime'];
                              $ddate = date("d M", strtotime($ddatetime));
                              $dday = date("D", strtotime($ddate));
                              $dtime = date("H:i", strtotime($ddatetime));
                           ?>
                        </div>
                        <div class="text1">
                           <div>
                              <h1><?php echo $atime;?></h1>
                           </div>
                           <div>
                              <h1><?php echo $dtime;?></h1>
                           </div>
                        </div>
                        <div class="text1" id="date">
                           <div><?php echo $aday; ?> ,<?php echo $adate;?></div>                
                           <div><?php echo $dday; ?> ,<?php echo $ddate;?></div>
                        </div>
                        <div class="flight-img">
                           <div class="col-7 p-10 m-0 mt-3" style="float: right;position:absolute;right:241px;">
                              <hr class="bg-success">
                           </div>
                           <div style="position:absolute;right:675px;">
                              <i class="fa fa-2x fa-fighter-jet mt-3 text-success"></i>
                           </div>
                           <div class="col-1 p-0 m-0" style="position: absolute;right: 240px;">
                              <i class="fa fa-circle mt-4 text-success" style="float: right;"></i>
                           </div>
                        </div>
                        <br>
                     </div>
                     <div id="main-box2">
                        <div id="small-box" style="background-color: red;">
                           <b>Not Departed</b>
                        </div>
                        <div>
                           <?php
                              $fno=$flight['fno'];
                              $sql="SELECT * FROM flight WHERE fno=$fno";
                              $result=mysqli_query($conn,$sql);
                              $row = mysqli_fetch_assoc($result);
                              $ano=$row['ano'];

                              $sql="SELECT * FROM airline WHERE ano=$ano";
                              $result=mysqli_query($conn,$sql);
                              $row = mysqli_fetch_assoc($result);
                           ?>
                           <br>
                           <br>
                           <div>
                              <h4 style="margin:0px;"><?php echo $row['aname'];?></h4>
                           </div>
                           <div>
                              <h5><?php echo $fno;?></h5>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>                  
               <?php
               }
            }
         }
         else
         {  
   ?>
   <br>
   <div id="main-box-NoFlight">
      <div id="main-box-last">
         <div>
            <h3>No Flights Available</h3>
         </div>
      </div>
   </div>
   <?php
      }
   ?>
   <div><br><br></div>
   <br><br><br><br><br><br>
   <!-- <footer class="footer">
        <div class="footer__bar1">
            <p>Copyright © 2024 Team GMADS. All rights reserved.</p>
            <div class="social">
                <span><a href="" class="text-muted" target="_blank"><i class="ri-facebook-fill"></i></a></span>
                <span><a href="" class="text-muted" target="_blank"><i class="ri-twitter-fill"></i></a></span>
                <span><a href="" class="text-muted" target="_blank"><i class="ri-instagram-line"></i></a></span>
                <span><a href="https://www.youtube.com/channel/UCNCWGkiAKDhwgCuGT02aXCg" class="text-muted"
                        target="_blank"><i class="ri-youtube-fill"></i></a></span>
                <div class="n_logo"><img src="assets/w.png"></div>
            </div>
        </div>
    </footer> -->
</body>

</html>