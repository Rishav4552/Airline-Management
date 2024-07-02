<?php
  ob_start();
  session_start();
  if(!isset($_SESSION['log']))
  {
    header('Location: homepagewoil.html');
  }
  if (isset($_SESSION['u']))
  {
      $username=$_SESSION['u'];
  }
  if (isset($_SESSION['userid']))
  {
      $userid=$_SESSION['userid'];
  }
  // echo"<br><br><br><br>"."$userid"."kaayyy";
  $_SESSION['payment']=false;
  $_SESSION['personal']=false;
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Ticket</title>
    <link rel="icon" type="image/png" href="assets/tablogo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
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
        .user-log{
            position: relative;
            margin-top:-12px;
        
            color:var(--primary-color);
            text-decoration: none;
        }
        .user-log::after,.user-log:hover{
              text-decoration: none;
              color: var(--primary-color);
              cursor: pointer;
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
            margin-top: -10px;
            transition: 0.3s;
        }

        .btn a {
            color: var(--extra-light);
            text-decoration: none;
        }

        .btn:hover {
            background-color: var(--primary-color-dark);
        }

        /*-------------------------FOOTER CSS---------------------------*/
        .footer {
            position: relative;
            bottom: 0;
            width: 100%;
            background-color: var(--primary-color);
            padding: 20px 0;
            margin-top: 168px;
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

        .social span {
            font-size: 1.4rem;
            color: var(--extra-light);
        }

        .social span a {
            text-decoration: none;
            color: var(--extra-light)
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
            color:white;
        }
         /* --------Ticket CSS---------------------- */
         .logo-tik {
            margin-top: -20px;
            padding-left:45px;
        }
        .logo-tik img {
width:200px;
height:80px;
        }


         .container {
            margin-top: 30px;
            /* margin-left:230px; */
        }
        .row{
            margin-bottom: -10px;
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

 
        h2.brand {
            font-size:27px;
        }

        p.head {
            text-transform: uppercase;
            font-family: arial;
            font-size: 17px;
            margin-bottom: 10px;
            color: grey;
        }

        p.txt {
            text-transform: uppercase;
            font-family: arial;
            font-size: 25px;
            font-weight: bolder;
        }
        .bord {
            border: 2px solid lightgray;
            background-color: #6b0f3d;
        }
        .out {
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: white;
            border: 2px solid lightgray;
            padding-left: 25px;
            padding-right: 0px;
            padding-top: 20px;
        }

        h2 {
            font-weight: lighter !important;
            font-size: 35px !important;
            margin-bottom: 20px;
            font-weight: bolder;
        }

        .text-light2 {
            color: #d9d9d9;
        }

        h3 {
            font-size: 21px !important;
            margin-bottom: 20px;
            font-weight: lighter;
        }
        h4 {
            font-size: 16px !important;
            margin-bottom: 20px;
            font-weight:normal;
        }
        h1 {
            font-weight: lighter !important;
            font-size: 45px !important;
            margin-bottom: 20px;
            font-weight: bolder;
        }

        .btn1 {
            position: relative;
            /* right: 25px; */
            top: 185px;
            height: 42px;
            width: 140px;
            text-align: center;
            background-color:green;
        }
        .btn1:hover{
            background-color: darkgreen;
            color:white;
        }
        .btn2 {
            position: relative;
            right: 25px;
            top: 185px;
            height: 42px;
            width: 142px;
            text-align: center;
            background-color:red;
        }
        .btn2:hover{
            background-color: darkred;
            color:white;
        }
        .no-ticket-available {
            text-align: center;
            font-size: 100px;
            font-weight: lighter;
            color: #323233;
            margin-top: 20px;
            background-color: #f1f5f9;
            border:2px solid lightgrey;
        }
        .col3
        {
            flex:0 0 25% ;
            max-width: 19%;
            position: relative;
            left: -70px;
        }
        .colm{
            padding-left:30px;
        }
        .colmn{
            padding-right:0;
        }
        .butts {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 35px;
        }
        .rows {
            margin-top: -150px;
        }
    </style>
</head>
<body>
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

        $flag=$_GET['flag'];

        
        $nop=$_COOKIE['nop'];
        $seq_no=$_COOKIE['seq_no'];
        $fno=$_COOKIE['fno'];
        $from=$_COOKIE['from'];
        $to=$_COOKIE['to'];
        $class=$_COOKIE['class'];

        function convertTo4Digits($number) {
            return str_pad($number, 4, '0', STR_PAD_LEFT);
        }

        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date("d-m-Y");
        $numericDate = str_replace("-", "", $currentDate);
        $numericDate=$numericDate*10000;
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
            $adate = date("d-m-Y", strtotime($adatetime));
            $aday = date("D", strtotime($adate));
            $atime = date("H:i", strtotime($adatetime));

            $ddatetime=$flight['ddatetime'];
            $ddate = date("d-m-Y", strtotime($ddatetime));
            $dday = date("D", strtotime($ddate));
            $dtime = date("H:i", strtotime($ddatetime));

            $adt=$flight['adatetime'];
            $ddt=$flight['ddatetime'];
        }
        // echo "<br><br><br>".$_COOKIE['fufu'];
        
        

        if ($_COOKIE['fufu']=='true')
        {
            if($flag==1 || $flag==2)
            {
            
                $sql ="INSERT INTO booking(id) VALUES (?)";
                $stmt =mysqli_stmt_init($conn);
                $prepare =mysqli_stmt_prepare($stmt,$sql);
                if ($prepare)
                {
                    mysqli_stmt_bind_param($stmt,"i",$userid);
                    mysqli_stmt_execute($stmt);
                }

                

                $sql9 = "SELECT booking_id FROM booking WHERE id = $userid ORDER BY booking_id DESC LIMIT 1";
                $result9 = mysqli_query($conn, $sql9);
                if (mysqli_num_rows($result9) > 0) 
                {
                    $row9 = mysqli_fetch_assoc($result9);
                    $booking_id= $row9['booking_id'];
                }

                for ($i = 0; $i < $nop; $i++) 
                {
                    $title[$i] = isset($_COOKIE["title_$i"]) ? $_COOKIE["title_$i"] : '';
                    $fname[$i] = isset($_COOKIE["fname_$i"]) ? $_COOKIE["fname_$i"] : '';
                    $lname[$i] = isset($_COOKIE["lname_$i"]) ? $_COOKIE["lname_$i"] : '';
                    $mnumber[$i] = isset($_COOKIE["mnumber_$i"]) ? $_COOKIE["mnumber_$i"] : '';
                    $dob[$i] = isset($_COOKIE["dob_$i"]) ? $_COOKIE["dob_$i"] : '';
                    $gender[$i] = isset($_COOKIE["gender_$i"]) ? $_COOKIE["gender_$i"] : '';
                    $name="$title[$i]. "."$fname[$i] "."$lname[$i]";
                    // echo"<br><br><br>$name";
                    $sql ="INSERT INTO passenger(name,mobile,dob,gender,id,seq_no,booking_id) VALUES (?,?,?,?,?,?,?)";
                    $stmt =mysqli_stmt_init($conn);
                    $prepare =mysqli_stmt_prepare($stmt,$sql);
                    if ($prepare)
                    {
                        mysqli_stmt_bind_param($stmt,"ssssiii",$name,$mnumber[$i],$dob[$i],$gender[$i],$userid,$seq_no,$booking_id);
                        mysqli_stmt_execute($stmt);
                    }
                    $sql = "SELECT * FROM passenger ORDER BY pid DESC LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    if ($result) 
                    {
                        if (mysqli_num_rows($result) > 0) 
                        {
                            $row = mysqli_fetch_assoc($result);
                            $pno=$row['pid']; 
                        }
                        else
                        $pno=0;
                    }
                    $number=convertTo4Digits($pno);
                    $tckno=$numericDate+$number;
                    // echo"<br><br><br><br>$tckno";
                    $sql ="INSERT INTO ticket(aname,fno,src,dest,ddt,adt,prn,cname,pid,id,seq_no,booking_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt =mysqli_stmt_init($conn);
                    $prepare =mysqli_stmt_prepare($stmt,$sql);
                    if ($prepare)
                    {
                        mysqli_stmt_bind_param($stmt,"sissssssiiii",$aname,$fno,$from,$to,$adt,$ddt,$tckno,$class,$pno,$userid,$seq_no,$booking_id);
                        mysqli_stmt_execute($stmt);
                    }
                    
                }
                if($class=='Economy Class')
                {
                
                    $query = "UPDATE flight_availabality SET seatsofeco = seatsofeco-$nop WHERE seq_no = $seq_no";
                    $run = mysqli_query($conn, $query);
                    
                }
                if($class=='First Class')
                {
                    $query = "UPDATE flight_availabality SET  seatsoffrt = seatsoffrt-$nop WHERE seq_no = $seq_no";
                    $run = mysqli_query($conn, $query);
                    
                }
                if($class=='Business Class')
                {
                    $query = "UPDATE flight_availabality SET seatsofbsn = seatsofbsn-$nop WHERE seq_no = $seq_no";
                    $run = mysqli_query($conn, $query);
                    
                }

                $flag=0;
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

            $sql ="INSERT INTO payment(nop,cop,fno,seq_no,id,booking_id) VALUES (?,?,?,?,?,?)";
            $stmt =mysqli_stmt_init($conn);
            $prepare =mysqli_stmt_prepare($stmt,$sql);
            if ($prepare)
            {
                mysqli_stmt_bind_param($stmt,"iiiiii",$nop,$cpp,$fno,$seq_no,$userid,$booking_id);
                mysqli_stmt_execute($stmt);
            }

            

            setcookie('fufu', 'false', time() + (86400 * 30), "/");
            ob_end_flush();
        }
        else
        {
            header('Location: MyFlights.php');
        }
    ?>
    <header>
        <div class="nav__logo"><img src="assets/jetsetflylogo.png"></div>
        <ul class="nav__links">
          <li class="link"><a href="homepagewl.php">HOME</a></li>
          <li class="link"><a href="MyFlights.php">MY FLIGHTS</a></li>
          <li class="link"><a href="AboutUs.php">ABOUT</a></li>
          <li class="link"><a href="feedback.php">FEEDBACK</a></li>
        </ul>
        <a class="user-log"><i class="fa fa-user" style="font-size:24px"></i> <?php echo "$username" ; ?></a>
        <a href="logout.php"><button class="btn">Logout &nbsp;<i class="fa fa-sign-out" style="font-size:15px"></i></button></a>
    </header>
    <br><br><br>
    <h1 class="text-center text-secondary mt-4 mb-4">E-TICKETS</h1>

    <section class="ticket" id="ticketSection">
        <?php 

        for ($i = 0; $i < $nop; $i++)
        {
            ?>
            <div class="container mb-5">
                <div class="row mb-5">
                    <div class="col-9 out">
                        <div class="row">
                            <div class="col logo-tik">
                                <img src="assets/gg.png.png">
                            </div>
                            <div class="col">
                                <h2 class="mb-0"><?php echo $class;?></h2>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-2">
                                <p class="head">Airline</p>
                                <p class="txt"><?php echo $aname."";?></p>
                            </div>
                            <div class="col-5 colm">
                                <p class="head">from</p>
                                <p class="txt"><?php echo $from ;?></p>
                            </div> 
                            <div class="col-5 colmn">
                                <p class="head">to</p>
                                <p class="txt"><?php echo $to;?></p>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <p class="head">Passenger</p>
                                <p class=" h5 text-uppercase" style="font-weight:bolder">
                                <?php 
                                    $title[$i] = isset($_COOKIE["title_$i"]) ? $_COOKIE["title_$i"] : '';
                                    $fname[$i] = isset($_COOKIE["fname_$i"]) ? $_COOKIE["fname_$i"] : '';
                                    $lname[$i] = isset($_COOKIE["lname_$i"]) ? $_COOKIE["lname_$i"] : '';
                                    $mnumber[$i] = isset($_COOKIE["mnumber_$i"]) ? $_COOKIE["mnumber_$i"] : '';
                                    $dob[$i] = isset($_COOKIE["dob_$i"]) ? $_COOKIE["dob_$i"] : '';
                                    $gender[$i] = isset($_COOKIE["gender_$i"]) ? $_COOKIE["gender_$i"] : '';
                                    $name="$title[$i]. "."$fname[$i] "."$lname[$i]";
                                    // echo"<br><br><br>$name";
                                    echo $name; 
                                ?>
                                </p>
                            </div>
                            <div class="col-4">
                                <p class="head">board time</p>
                                <p class="txt"><?php $d = DateTime::createFromFormat('H:i', $atime); $d->modify('-15 minutes'); echo $d->format('H:i'); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p class="head">departure</p>
                                <p class="txt mb-1"><?php echo $ddate; ?></p>
                                <p class="h1 mb-3" style="font-size: 30px; padding-bottom:10px;"><?php echo $atime; ?></p>
                            </div>
                            <div class="col-3">
                                <p class="head">arrival</p>
                                <p class="txt mb-1"><?php echo $adate; ?></p>
                                <p class="h1 mb-3" style="font-size: 30px; padding-bottom:10px;"><?php echo $dtime; ?></p>
                            </div>
                            <div class="col-3">
                                <p class="head">Flight</p>
                                <p class="txt"><?php echo $fno;?></p>
                            </div>
                            <div class="col3">
                                <p class="head">PRN NO</p>
                                <p class="txt">
                                
                                <?php
                                    $formatted_dob = date("Y-m-d", strtotime($dob[$i]));
                                    // echo"<br><br><br><br>"."$name";
                                    $sql = "SELECT * FROM passenger WHERE dob='$formatted_dob' AND name='$name' and id=$userid and booking_id = (SELECT booking_id FROM booking WHERE id = $userid ORDER BY booking_id DESC LIMIT 1)";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) 
                                    {
                                        if (mysqli_num_rows($result) > 0) 
                                        {
                                            $row = mysqli_fetch_assoc($result);
                                            $pid=$row['pid'];
                                        }
                                    }

                                    $sql = "SELECT * FROM ticket WHERE pid=$pid";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) 
                                    {
                                        if (mysqli_num_rows($result) > 0) 
                                        {
                                            $row = mysqli_fetch_assoc($result);
                                            $prn=$row['prn'];
                                        }
                                    }
                                    echo"$prn";
                                ?> 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 bord pl-0" style="background-color:var(--primary-color);
                                        padding:20px; border-top-right-radius: 25px; border-bottom-right-radius: 25px;">
                        <div class="row">
                            <div class="col">
                                <h2 class="text-light text-center brand">JetSetFly</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <img src="assets/airtic.png" class="mx-auto d-block" height="200px" width="200px" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <h4 class="text-light2 text-center mt-2 mb-0">
                                &nbsp; Thank you for choosing us. </br> </br>
                                &nbsp;&nbsp;&nbsp;Please be at the gate at boarding time</h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
        }
            ?>
    </section>

    <div class="rows butts">
        <div class="row">
            <button class="btn1 btn mr-5 mt-10" onclick="printDiv()"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
    <br>
    <footer class="footer">
        <div class="section__container footer__bar1">
            <p>Copyright © 2024 Team GMADS. All rights reserved.</p>
            <div class="social">
                <span><a href="" class="text-muted" target="_blank"><i class="ri-facebook-fill"></i></a></span>
                <span><a href="" class="text-muted" target="_blank"><i class="ri-twitter-fill"></i></a></span>
                <span><a href="" class="text-muted" target="_blank"><i class="ri-instagram-line"></i></a></span>
                <span><a href="https://www.youtube.com/channel/UCNCWGkiAKDhwgCuGT02aXCg" class="text-muted"
                        target="_blank"><i class="ri-youtube-fill"></i></a></span>
                <div class="n_logo"><img src="assets/w.png">
                </div>
            </div>
    </footer>
</body>
<script>
    
    function printDiv() {
        var ticketSection = document.getElementById('ticketSection');
        if (!ticketSection) {
            console.error("Ticket section not found!");
            return;
        }
        ticketSection.style.margin = 'auto'; // Centering the ticket section        
        var printContents = ticketSection.innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        
        ticketSection.style.margin = '';
        window.print();
        document.body.innerHTML = originalContents;
        
        
    }


    function Cancel_but()
    { 
        if (confirm('Are You Sure ?')) 
        {
            var ticketSection = document.getElementById('ticketSection');
            ticketSection.parentNode.removeChild(ticketSection);
            if (document.querySelectorAll('.ticket').length === 0) 
            {
                var noTicketMessage = document.createElement('div');
                noTicketMessage.classList.add('no-ticket-available');
                noTicketMessage.textContent = 'No tickets available';
                document.body.appendChild(noTicketMessage);
            }
            alert("Booking cancelled!");
        }
        else
        {
            window.location.reload();
        }      
    }
</script>
</html>