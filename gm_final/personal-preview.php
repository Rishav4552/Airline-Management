<?php 
    session_start();
    if(!isset($_SESSION['log']))
    {
      header('Location: homepagewoil.html');
    }
    if (isset($_SESSION['u']))
    {
        $username=$_SESSION['u'];
    }
?>
<!DOCTYPE html>
<?php
    $nop=$_COOKIE['nop'];
    if (isset($_POST['submit']))
    {
      $_SESSION['payment']=true;
      for ($i=0;$i<$nop;$i++)
      {
          $title[$i]=$_POST['title'][$i];
          $fname[$i]=$_POST['fname'][$i];
          $lname[$i]=$_POST['lname'][$i];
          $mnumber[$i]=$_POST['mnumber'][$i];
          $dob[$i]=$_POST['dob'][$i];
          $gender[$i]=$_POST['gender'][$i]; 
          
          setcookie("title_$i", $title[$i], time() + (86400 * 30), "/");
          setcookie("fname_$i", $fname[$i], time() + (86400 * 30), "/");
          setcookie("lname_$i", $lname[$i], time() + (86400 * 30), "/");
          setcookie("mnumber_$i", $mnumber[$i], time() + (86400 * 30), "/");
          setcookie("dob_$i", $dob[$i], time() + (86400 * 30), "/");
          setcookie("gender_$i", $gender[$i], time() + (86400 * 30), "/");

        //   echo $title[$i];   
        //   echo $fname[$i];
        //   echo $lname[$i];
        //   echo $mnumber[$i];
        //   echo $dob[$i];
        //   echo $gender[$i];
        } 
    }
    $from=$_COOKIE['from'];
    $to=$_COOKIE['to'];
    $d_date=$_COOKIE['d_date'];
    
    $fno=$_COOKIE['fno'];
    $seq_no=$_COOKIE['seq_no'];
    $class=$_COOKIE['class'];

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
    <title>Preview</title>
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
         position: relative;
         bottom: 0;
         width: 100%;
         background-color: var(--primary-color);
         padding: 18px 0;
         margin-top: 500px;
      }

      .footer__bar1 {
         padding: 0 20px;
         display: flex;
         align-items: center;
         justify-content: space-between;
         gap: 1rem;
      }

      .footer__bar1 p {
         font-size: 1rem;
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
         font-size: 1.4rem;
         color: var(--extra-light);
      }

      .social span a {
         text-decoration: none;
         color: var(--extra-light);
      }

      .text-muted1 {
         color: white;

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


        #main-box-last {
            display: flex;
            padding-bottom: 50px;
            margin-bottom: 40px;
        }

        #main-box {
            display: flex;
            top: 100px;
        }

        #main-box1 {
            width: 63%;
            position: absolute;
            top: 146px;
            left: 294px;
            background-color: white;
            text-align: center;
            padding: 20px 20px 0px 20px;
            border-radius: 20px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
        }

        #main-box2 {
            width: 50%;
            position: absolute;
            top: 370px;
            left: 390px;
            background-color: white;
            text-align: center;
            padding: 20px 20px 20px 20px;
            border-radius: 20px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
        }

        #main-box3 {
            margin-top: 10px;
            display: flex;
            justify-content: space-around;
        }

        .btn1 {
            padding: 0.75rem 2rem;
            outline: none;
            border: none;
            font-size: 20px;
            font-weight: 500;
            color: var(--white);
            background-color: var(--primary-color);
            border-radius: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn1:hover {
            background-color: var(--primary-color-dark);
            text-decoration: none;
            color: var(--white);
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
    <a class="user-log"><i class="fa fa-user" style="font-size:20px;"></i>&nbsp; <?php echo "$username"; ?></a>
    <button class="btn"><a href="logout.php">Logout &nbsp;<i class="fa fa-sign-out" style="font-size:15px"></i></a></button>
</header>
    <br><br><br><br>
    <div id="top-line">
        <div style="text-align:center;">
            <h1>Preview</h1>
        </div>
    </div>
    <br>
    <?php
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

        $sql3 = "SELECT * FROM flight_schedule WHERE seq_no=$seq_no";
        $result3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($result3) > 0) 
        {
            $flight = mysqli_fetch_assoc($result3);

            $adatetime=$flight['adatetime'];
            $adate = date("d M", strtotime($adatetime));
            $aday = date("D", strtotime($adate));
            $atime = date("H:i", strtotime($adatetime));

            $ddatetime=$flight['ddatetime'];
            $ddate = date("d M", strtotime($ddatetime));
            $dday = date("D", strtotime($ddate));
            $dtime = date("H:i", strtotime($ddatetime));
        }

        $sql="SELECT * FROM seat_cost WHERE seq_no=$seq_no AND classname='$class'";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_assoc($result);
            $cpp=$row['price'];
        }
        else
            $cpp=0;
    ?>
    <div id="main-box">
        <div id="main-box1">
            <div class="text1">
                <div>
                    <h2><?php echo $from;?></h2>
                </div>
                <div>
                    <h2><?php echo $to;?></h2>
                </div>
            </div>
            <div style="position: absolute;top: 20px;right:46%">
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
                            echo $fno;
                        ?>
                    </h5>
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
                <div><?php echo $aday;?> ,<?php echo $adate;?></div>
                <div><?php echo $dday;?> ,<?php echo $ddate;?></div>
            </div>
            <div class="flight-img">
                <div class="col-1 p-0 m-0" style="position: absolute;left: 33px;">
                    <i class="fa fa-circle mt-4 text-success" style="float: right;color: #8E2157;"></i>
                </div>
                <div class="col-8 p-10 m-0 mt-3" style="float: right;position:absolute;right:222px;">
                    <hr class="bg-success" style="color:#8E2157;">
                </div>
                <div style="position:absolute;right: 203px;color: #8E2157;">
                    <i class="fa fa-2x fa-fighter-jet mt-3 text-success" style="color:#8E2157;"></i>
                </div>
            </div>
            <br>
        </div>
    </div>

    <div id="main-box2">
        <div id="inner-box">
            <div style="display: flex;justify-content: space-around;">
                <div align="left">
                    <h4 style="margin:0px;">Total Passenger(s): <?php echo $nop; ?></h4>
                </div>
                <div>
                    <h4 style="margin-left:0px;">Cost Per Seat: INR <?php echo $cpp ;?></h4>
                </div>
            </div><br>
            <div>
                <h4 style="margin:0px;">Total Cost : INR <?php $totalfair=$nop*$cpp; echo $totalfair;?></h4>
                <hr>
            </div>
            <div id="main-box3">
                <div id="login-button1">
                    <button class="btn1" onclick="goBack()">Back</button>
                </div>
                <div id="login-button2">
                    <input type="submit" class="btn1" id="submit-button" value="Proceed" onclick="redirectToAphp()">
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="section__container footer__bar1">
           <p>Copyright © 2024 Team GMADS. All rights reserved.</p>
           <div class="social">
              <span><a href="" class="text-muted1" target="_blank"><i class="ri-facebook-fill"></i></a></span>
              <span><a href="" class="text-muted1" target="_blank"><i class="ri-twitter-fill"></i></a></span>
              <span><a href="" class="text-muted1" target="_blank"><i class="ri-instagram-line"></i></a></span>
              <span><a href="https://www.youtube.com/channel/UCNCWGkiAKDhwgCuGT02aXCg" class="text-muted1"
                    target="_blank"><i class="ri-youtube-fill"></i></a></span>
              <div class="n_logo"><img src="assets/w.png"></div>
           </div>
    </footer>
    <script>
        function goBack() {
            window.history.back();
        }
        
        function redirectToAphp() {
            var totalfair = "<?php echo $totalfair; ?>";
            var url = "payment.php?totalfair=" + totalfair;
            window.location.href = url;
        }

    </script>
</body>

</html>