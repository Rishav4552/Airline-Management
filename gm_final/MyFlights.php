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
<!DOCTYPE html>
<html>

<head>
    <title>My Flights</title>
    <link rel="icon" type="image/png" href="assets/tablogo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
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

        #main-box-NoFlight {
            display: flex;
            justify-content: center;

            margin-bottom: 40px;
        }
        #main-box-last {
            width: 85%;
            position: relative;
            top: 112px;
            background-color: white;
            text-align: center;
            padding: 25px 20px 20px 20px;
            border-radius: 20px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
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
            padding: 10px 20px 0 30px;
            z-index: 10000;
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
            padding: 8px 12px;
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
        .btn a:hover {
            color:var(--extra-light);
            text-decoration: none;
        }
        .btn:hover {
            background-color: var(--primary-color-dark);
        }
        .user-log{
            text-decoration:none;
            color:var(--primary-color);
            
        }
        .user-log::after,.user-log:hover{
              text-decoration: none;
              color: var(--primary-color);
              cursor: pointer;
        }
        /*--------------------FOOTER CSS------------------*/
        .footer {
            position: fixed;
            width: 100%;
            bottom:0;
            background-color: var(--primary-color);
            padding: 20px 0;
            /* top:219px; */
            /* margin-top: 50px; */
        }

        .footer__bar1 {
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .footer__bar1 p {
            font-size: 0.9rem;
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
        .text-muted i{
            font-size:1.3rem;
            color:white;
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
            height: 50px;
            width: 150px;
            margin-right: 10px;
        }

        #main-box-Arrived,
        #main-box-Inflight {
            display: flex;
        }

        #main-box-NDepartured {
            position: relative;
            right: 45px;
            bottom: 80px;
            display: flex;
            margin-bottom: 40px;
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

        
        .button {
            width: 130px;
            font-size: 15px;
        }

        .button {
            padding: 6px 8px;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
            font-weight: 500;
            color: #fff;
            background-color: red;
            ;
            border: 2px solid red;
            border-radius: 15px;
        }

        .button:hover {
            cursor: pointer;
            background-color: red;
            color: white;
            border-color: white;
        }

        .button:active {
            background-color: red;
            border-color: white;
            transform: translateY(4px);
        }
        .button1 {
            width: 130px;
            font-size: 15px;
        }

        .button1 {
            padding: 6px 8px;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
            font-weight:500;
            color: #fff;
            background-color: green;
            ;
            border: 2px solid green;
            border-radius: 15px;
        }

        .button1:hover {
            cursor: pointer;
            background-color: green;
            color: white;
            border-color: white;
        }

        .button1:active {
            background-color: green;
            border-color: white;
            transform: translateY(4px);
        }
        #login-button {
            position: absolute;
            top: 214px;
            left: 87%;
        }
        #login-button1 {
            position: absolute;
            top: 145px;
            left: 87%;
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
        <a class="user-log"><i class="fa fa-user" style="font-size:24px; text-decoration:none; color:var(--primary-color);"></i> <?php echo "$username" ; ?></a>
        <button class="btn"><a href="logout.php">Logout &nbsp;<i class="fa fa-sign-out" style="font-size:15px"></i></a></button>
    </header>
    <br><br><br>
    <div style="text-align:center;">
        <br>
        <h1>My Flights</h1>
    </div>
    <?php
        $sql="SELECT * FROM booking WHERE id=$userid ORDER BY booking_id DESC";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0)
        {
            foreach($result as $booking)
            {
                // echo $booking['booking_id']." ".$booking['id'];
                $bid=$booking['booking_id'];
                $sql3 = "SELECT * FROM ticket WHERE booking_id=$bid";
                $result3 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result3) > 0) 
                {
                    $flight = mysqli_fetch_assoc($result3);
        
                    $adatetime=$flight['ddt'];
                    $adate = date("d M y", strtotime($adatetime));
                    $aday = date("D", strtotime($adate));
                    $atime = date("H:i", strtotime($adatetime));
        
                    $ddatetime=$flight['adt'];
                    $ddate = date("d M y", strtotime($ddatetime));
                    $dday = date("D", strtotime($ddate));
                    $dtime = date("H:i", strtotime($ddatetime));
                    
                    $fno=$flight['fno'];
                }

                $sql1="SELECT * FROM flight WHERE fno=$fno"; 
                $result1=mysqli_query($conn,$sql1);
                if (mysqli_num_rows($result1)>0)
                {
                    $row1 = mysqli_fetch_assoc($result1);
                    $ano = $row1['ano'];
                }
        
                $sql2 = "SELECT * FROM airline WHERE ano = $ano";
                $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) > 0) 
                {
                    $row2 = mysqli_fetch_assoc($result2);
                    $aname = $row2['aname'];
                }
                ?>
                <div id="main-box-NDepartured">
                    <div id="main-box1">
                        <div class="text1">
                            <div>
                                <h2><?php echo $flight['src'];?></h2>
                            </div>
                            <div>
                                <h2><?php echo $flight['dest'];?></h2>
                            </div>
                        </div>
                        <div class="text1">
                            <div>Departed</div>
                            <div>Arrived</div>
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
                            <div><?php echo$aday;?> ,<?php echo $adate;?></div>
                            <div><?php echo$dday;?> ,<?php echo $ddate;?></div>
                        </div>
                        <div class="flight-img">
                            <div class="col-7 p-10 m-0 mt-3" style="float: right;position:absolute;right:231px;">
                                <hr class="bg-success">
                            </div>
                            <div style="position:absolute;right:676px;">
                                <i class="fa fa-2x fa-fighter-jet mt-3 text-success"></i>
                            </div>
                            <div class="col-1 p-0 m-0" style="position: absolute;right: 242px;">
                                <i class="fa fa-circle mt-4 text-success" style="float: right;"></i>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div id="main-box2">
                        <div>
                            <br>
                            <br><br>
                            <div>
                                <h4 style="margin:0px;"><?php echo $aname;?></h4>
                            </div>
                            <div>
                                <h5>
                                <?php 
                                    if ($aname=='Emirates')
                                        echo "EM ";
                                    if ($aname=='AirIndia')
                                        echo "AI ";
                                    if ($aname=='Vistara')
                                        echo "VS ";
                                    if ($aname=='Indigo')
                                        echo "IG ";
                                    echo $fno;?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <form action="print-ticket.php" method="POST">
                        <input type="text" name="booking_id" value="<?php echo $bid;?>" hidden >
                        <div id="login-button1">
                            <input type="submit" class="button1" value="Print"><br><br>
                        </div>
                    </form>
                    <?php 
                        date_default_timezone_set('Asia/Kolkata');
                        $current_date_time = date('Y-m-d H:i:s'); 
                        if($current_date_time<$adatetime)
                        {
                    ?>
                    
                    <br>
                    <form action="cancel-ticket.php" method="POST">
                        <input type="text" name="booking_id" value="<?php echo $bid;?>" hidden >
                        <div id="login-button">
                            <input type="submit" class="button" value="Cancel"><br><br>
                        </div>
                    </form>
                    <?php 
                        }
                    ?>
                </div>
                <?php
            }
            echo "<br><br><br><br><br><br><br>";
        }
        else
        {        
    ?>
    <div id="main-box-NoFlight">
      <div id="main-box-last">
         <div>
            <h5>No Flights Booked Yet</h5>
         </div>
      </div>
   </div>
    <?php
        }
        ?>
    
    <footer class="footer">
        <div class="section__container footer__bar1">
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
    </footer>
    <script>
        history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});

    </script>
</body>

</html>