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
    $from=$_COOKIE['from'];
    $to=$_COOKIE['to'];
    $d_date=$_COOKIE['d_date'];
    $nop=$_COOKIE['nop'];
    
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
    <title>Flight Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="assets/tablogo.png">
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


        #main-box-Arrived {
            display: flex;
            margin-bottom: 50px;
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

        #main-box {
            display: flex;
            top: 100px;
        }

        #main-box1 {
            width: 50%;
            position: relative;
            top: 112px;
            left: 60px;
            background-color: white;
            text-align: center;
            padding: 20px 20px 0px 20px;
            border-radius: 20px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
        }

        #main-box2 {
            width: 14%;
            position: relative;
            top: 112px;
            left: 60px;
            background-color: white;
            text-align: center;
            border-radius: 20px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
        }

        #small-box {
            position : absolute;
            top:138px;
            left:54px;
            background-color: #8E2157;
            color: white;
            border-color: #8E2157;
            width: 50%;
            padding: 7px 0px;
            border-radius: 10px;
        }

        #small-box:hover {
            background-color: var(--primary-color-dark);
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
        #eco-class {margin:0px;font-size:20px;color:red;display:flex;align-items: center;justify-content: center;padding-top: 23px;}
        #top-text {
            position: absolute;
            top: 131px;
            left: 577px;
            color: #1c1d1fcf
        }
        .text-muted {
        color: white !important;
        font-size: 1.4rem;
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
    <br><br><br>
    <div style="text-align:center;">
        <h1>Make a Booking</h1>
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


        //Bengaluru (BGL)', 'Kochi (KOC)', 'Delhi (DEL)', 'Hyderabad (HYD)', 'Chennai (MAA)', 'Ahmedabad (AMD)', 'Amritsar (ATQ)', 'Kolkata (CCU)'

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
        // $flights=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if (mysqli_num_rows($result)>0)
        {
            // echo "in q";
            foreach($result as $flight)
            {
                // $_SESSION['personal']=true;
                // echo "<br><br><br>in l";
                date_default_timezone_set('Asia/Kolkata');
                $current_date_time = date('Y-m-d H:i:s'); // Get current date and time in YYYY-MM-DD HH:MM:SS format
                // echo $current_date_time;
                if ($flight['adatetime'] > $current_date_time)
                {
                    // echo "in i";
                $se=$flight['seq_no'];
                $sql="SELECT * FROM flight_availabality WHERE seq_no=$se";
                $res=mysqli_query($conn,$sql);
                if (mysqli_num_rows($res)>0)
                {
                    $row7 = mysqli_fetch_assoc($res);
                }
                $total=$row7['seatsofeco']+$row7['seatsofbsn']+$row7['seatsoffrt'];
                // echo $total;
                // echo $row7['seatsofeco'];
                // echo $row7['seatsofbsn'];
                if ($total>=$nop)
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
                        <div class="col-1 p-0 m-0" style="position: absolute;left: 27px;">
                            <i class="fa fa-circle mt-4 text-success" style="float: right;color: #8E2157;"></i>
                        </div>
                        <div class="col-7 p-10 m-0 mt-3" style="float: right;position:absolute;right:234px;">
                            <hr class="bg-success" style="color:#8E2157;">
                        </div>
                        <div style="position:absolute;right: 212px;color: #8E2157;">
                            <i class="fa fa-2x fa-fighter-jet mt-3 text-success" style="color:#8E2157;"></i>
                        </div>
                    </div>
                    <br>
                </div>
                <div id="main-box2">
                <?php
                    $seq_no=$flight['seq_no'];
                    $sql="SELECT * FROM seat_cost WHERE seq_no=$seq_no AND classname='Economy Class'";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0)
                    {
                        $row = mysqli_fetch_assoc($result);
                        $ecp=$row['price'];
                    }
                    else
                      $ecp=0;
                ?>
                    <div>
                        <br>
                        <div>
                            <h4 style="margin:0px;font-weight:bold;">Economy</h4>
                        </div>
                        
                        <?php 
                            if($ecp>0)
                            {
                        ?>
                        <div>
                            <h5 style="position:absolute;top:64px;left:67px;">INR <?php echo $ecp;?></h5>
                        </div>
                        <?php
                            $sql="SELECT * FROM flight_availabality WHERE seq_no=$seq_no";
                            $result=mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)>0)
                            {
                                $row5 = mysqli_fetch_assoc($result);
                            }

                            $fno=$flight['fno'];
                            $sql="SELECT * FROM class WHERE fno=$fno AND cname='Economy Class'";
                            $result=mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)>0)
                            {
                                $row6 = mysqli_fetch_assoc($result);
                            }
                        ?>
                        
                        <?php
                            if ($row5['seatsofeco']==0)
                            {
                        ?>
                        <div>
                            <p style="position:absolute;top:142px;left:13px;font-size:20px;color:red;">No Seats Available</p>
                        </div>
                        <?php
                            }
                            else
                            {
                        ?>
                        <div>
                            <p style="position:absolute;top:104px;left:35px;font-size:15px;">Seats Available : <?php echo $row5['seatsofeco'];?></p>
                        </div>
                        <div>
                            <form action="Personal-latest.php" method="POST">
                                <input type="text" name="u" value="<?php echo $username; ?>" hidden>
                                <input type="text" name="fno" value=<?php echo $flight['fno'];?> hidden>
                                <input type="text" name='seq_no' value="<?php echo $seq_no;?>" hidden>
                                <input type="text" name='class' value="<?php echo 'Economy Class';?>" hidden>
                                <input type="submit" name="cls" id="small-box" value="Select">
                            </form>
                        </div>
                        <?php
                            } 
                            }
                            else
                            {
                        ?>
                            <div>
                                <h4 id="eco-class">Class Not <br> Available</h4>
                            </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
                <div id="main-box2">
                <?php
                    $seq_no=$flight['seq_no'];
                    $sql="SELECT * FROM seat_cost WHERE seq_no=$seq_no AND classname='Business Class'";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0)
                    {
                        $row = mysqli_fetch_assoc($result);
                        $bcp=$row['price'];
                    }
                    else
                      $bcp=0;
                ?>
                    <div>
                        <br>
                        <div>
                            <h4 style="margin:0px;font-weight:bold;">Business</h4>
                        </div>
                        <br>
                        <?php 
                            if($bcp>0)
                            {
                        ?>
                        <div>
                            <h5 style="position:absolute;top:64px;left:67px;">INR <?php echo $bcp;?></h5>
                        </div>
                        
                        <?php
                            if ($row5['seatsofbsn']==0)
                            {
                        ?>
                        <div>
                            <p style="position:absolute;top:142px;left:13px;font-size:20px;color:red;">No Seats Available</p>
                        </div>
                        <?php
                            }
                            else
                            {

                                $fno=$flight['fno'];
                                $sql="SELECT * FROM class WHERE fno=$fno AND cname='Business Class'";
                                $result=mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result)>0)
                                {
                                    $row6 = mysqli_fetch_assoc($result);
                                }
                        ?>
                        <div>
                            <p style="position:absolute;top:104px;left:35px;font-size:15px;">Seats Available : <?php echo$row5['seatsofbsn'];?></p>
                        </div>
                        <div>
                            <form action="Personal-latest.php" method="POST">
                                <input type="text" name="u" value="<?php echo $username; ?>" hidden>
                                <input type="text" name="fno" value=<?php echo $flight['fno'];?> hidden>
                                <input type="text" name='seq_no' value="<?php echo $seq_no;?>" hidden>
                                <input type="text" name='class' value="<?php echo 'Business Class';?>" hidden>
                                <input type="submit" name="cls" id="small-box" value="Select">
                            </form>
                        </div>
                        <?php
                            } 
                            }
                            else
                            {
                        ?>
                        <div>
                            <h4 style="margin:0px;font-size:20px;color:red;">Class Not <br> Available</h4>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
                <div id="main-box2">
                <?php
                    $seq_no=$flight['seq_no'];
                    $sql="SELECT * FROM seat_cost WHERE seq_no=$seq_no AND classname='First Class'";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0)
                    {
                        $row = mysqli_fetch_assoc($result);
                        $fcp=$row['price'];
                    }
                    else
                      $fcp=0;
                ?> 
                    <div>
                        <br>
                        <div>
                            <h4 style="margin:0px;font-weight:bold;">First Class</h4>
                        </div>
                        <br>
                        <?php 
                            if($fcp>0)
                            {
                        ?>
                        <div>
                            <h5 style="position:absolute;top:64px;left:67px;">INR <?php echo $fcp;?></h5>
                        </div>
                        
                        <?php
                            if ($row5['seatsoffrt']==0)
                            {
                        ?>
                        <div>
                            <p style="position:absolute;top:142px;left:13px;font-size:20px;color:red;">No Seats Available</p>
                        </div>
                        <?php
                            }
                            else
                            {
                                $fno=$flight['fno'];
                                $sql="SELECT * FROM class WHERE fno=$fno AND cname='First Class'";
                                $result=mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result)>0)
                                {
                                    $row6 = mysqli_fetch_assoc($result);
                                }
                        ?>
                        <div>
                            <p style="position:absolute;top:104px;left:35px;font-size:15px;">Seats Available : <?php echo $row5 ['seatsoffrt'];?></p>
                        </div>
                        <div>
                            <form action="Personal-latest.php" method="POST">
                                <input type="text" name="u" value="<?php echo $username; ?>" hidden>
                                <input type="text" name="fno" value=<?php echo $flight['fno'];?> hidden>
                                <input type="text" name='seq_no' value="<?php echo $seq_no;?>" hidden>
                                <input type="text" name='class' value="<?php echo 'First Class';?>" hidden>
                                <input type="submit" name="cls" id="small-box" value="Select">
                            </form>
                        </div>
                        <?php
                            } 
                            }
                            else
                            {
                        ?>
                            <div>
                                <h4 style="margin:0px;font-size:20px;color:red;">Class Not <br> Available</h4>
                            </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
                <?php
            }
            else
            {
                ?>
                <div id="main-box-NoFlight">
                    <div id="main-box-last">
                        <div>
                            <h5>No Flights Available</h5>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        }
    }
        else
        {
            ?>
            <div id="main-box-NoFlight">
                <div id="main-box-last">
                    <div>
                        <h5>No Flights Available</h5>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
            <br><br><br><br>
            <br><br><br><br>

    </body>

</html>