<html>

<head>
    <title>Forgot Password</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="assets/tablogo.png">
    <style>
        body {
            background-color: #f1f5f9;
        }

        #main-box {
            display: flex;
            justify-content: space-evenly;
        }

        #main-box1 {
            width: 40%;
            position: relative;
            top: 150px;
            background-color: white;
            text-align: center;
            border-radius: 20px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
        }

        #main-box2 {
            width: 40%;
            position: relative;
            top: 150px;
            background-color: white;
            text-align: center;
            border-radius: 20px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
        }

        #login-button {
            display: flex;
            justify-content: center;
            padding-bottom: 19px;
        }

        #login-button1 {
            display: flex;
            justify-content: center;
            padding-bottom: 19px;
        }

        #login-text {
            position: relative;
            left: 80px;
            text-align: left;
        }

        #login-text1 {
            position: relative;
            left: 80px;
            text-align: left;
        }

        i {
            font-size: 25px;
            position: relative;
            right: 10px;
            top: 5px;
        }

        #vl {
            position: absolute;
            top: 170px;
            border-left: 6px solid #8E2157;
            height: 51%;
        }

        #vl1 {
            position: absolute;
            top: 170px;
            border-left: 6px solid #8E2157;
            height: 63%;
        }

        #login-link {
            position: relative;
            left: 85px;
            bottom: 16px;
        }

        .button {
            width: 170px;
            font-size: 15px;
        }

        .button {
            padding: 10px 10px;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
            color: #fff;
            background-color: #8E2157;
            ;
            border: 2px solid #89375F;
            border-radius: 15px;
        }

        .button:hover {
            cursor: pointer;
            background-color: white;
            color: black;
            border-color: black;
        }

        .button:active {
            background-color: white;
            border-color: black;
            transform: translateY(4px);
        }

        #new-acc {
            width: 170px;
            font-size: 15px;
        }

        #new-acc {
            padding: 10px 10px;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
            color: #fff;
            background-color: #8E2157;
            ;
            border: 2px solid #89375F;
            border-radius: 13px;
        }

        #new-acc:hover {
            cursor: pointer;
            background-color: white;
            color: black;
            border-color: black;
        }

        #new-acc:active {
            background-color: white;
            border-color: black;
            transform: translateY(4px);
        }

        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        input {
            font-size: 17px;
            width: 300px;
            padding: 15px 10px 10px;
            border: none;
            border-bottom: 2px solid #ccc;
            outline: none;
            transition: border-bottom-color 0.3s;
        }

        input:focus {
            border-bottom-color: #8E2157;
        }

        label {
            font-weight: bold;
            position: absolute;
            top: 15px;
            left: 30px;
            font-size: 16px;
            color: #333;
            transition: top 0.3s, font-size 0.3s;
        }

        input:focus+label,
        input:valid+label {
            top: 0;
            font-size: 12px;
            color: #8E2157;
        }
        label.active {
    top: 0;
    font-size: 12px;
    color: #8E2157;
}

        .toggle-password {
            position: absolute;
            top: 35%;
            left: 62%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #007bff;
        }

        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px white inset !important;
        }
    </style>
</head>

<body>
    <?php
    $somethingiswrong=false;
    $success=false;
    $invalid=false;
    $email='';
    if (isset($_GET['submit']))
    {
        $email=$_GET['email'];

        $hostName ="localhost";
        $dbusers ="root";                
        $dbPassword ="";
        $dbName ="jetsetfly";

        $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
        if (!$conn)
        {
            $somethingiswrong=true;               
        }
        $sql="SELECT * FROM register WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if ($user)
        {
            $success=true;
        }
        else
        {
            $invalid=true;
        }

    }
    
    $verifyotp=false;
    $wrongotp=false;
    if (isset($_GET['otpverify']))
    {
       // $a=$_COOKIE['a'];
        $otpbyuser=$_GET['otpenter'];
        $m=$_GET['m'];

        $hostName = "localhost";
        $dbusers = "root";
        $dbPassword = "";
        $dbName = "jetsetfly"; 
        
        $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
        if (!$conn)
        {
            $somethingiswrong=true;               
        }
        $sql="SELECT * FROM otp_table WHERE email='$m' ORDER BY otp_id DESC LIMIT 1";
        $result=mysqli_query($conn,$sql);
        $user=mysqli_fetch_array($result,MYSQLI_ASSOC);


        // echo $user['otp'];
        // echo $otpbyuser;
        if ($user['otp'] == $otpbyuser)
        {
           $verifyotp=true;
           echo "<script>window.location.href = 'resetpass.php?username=" . $user['email']."';</script>";
        } 
        else
           $wrongotp=true;
        
    }

    ?>


    <div id="main-box">
        <div id="main-box1">

            <div><br>
                <h1>Reset Password</h1>
            </div>
                
                <div id="tohide">
                    <div>
                        <h3>We will send a one-time pin to your <br>registered email address to reset your password.
                            <br>Please check your spam folder if it does not arrive <br>in your inbox.
                        </h3>
                    </div>
                    <form id="forgot" action="Forgotpasswordphp.php" method="GET">
                    <div id="login-text">
                        <div class="input-container">
                            <i class='bx bx-user-circle belody'></i>
                            <input type="text" id="email" name="email" value="<?php echo"$email"; ?>" <?php if ($success) echo 'disabled'; ?> required>
                            <label for="username" <?php if ($success) echo 'class="active"'; ?>>Email</label>
                        </div>
                    </div>
                    
                    <a href="Login.php" id="login-link">Login Page</a>
                    <div id="login-button1">
                        <input type="submit" id="button" class="button" value="Submit" name="submit">
                    </div>
                    </form>
                    <form id="forgot" action="Forgotpasswordphp.php" method="GET">
                    <div id="switch">
                        <div id="login-text1">
                            <div class="input-container">
                                <i class='bx bx-message-dots'></i>
                                <input type="text" id="otp" name="otpenter" required>
                                <label class="otp" for="otp">OTP</label>

                                <input type="text" name="m" value='<?php echo "$email";?>' hidden>
                            </div>
                        </div>
                        <div id="login-button">
                            <input type="submit" class="button" value="Submit" name="otpverify"><br><br>
                        </div>
                    </div>
                    </form>
                </div>
                <div id="newpassword">
                     <!-- <div id="login-text">
                        <div class="input-container">
                            <i class='bx bx-lock-open belody' id="lock"></i>
                            <input type="password" name="password" id="password" required>
                            <label for="password">New Password</label>
                        </div>
                    </div>
                    <div id="login-text">
                        <div class="input-container">
                            <i class='bx bx-lock-open belody' id="lock"></i>
                            <input type="password" name="cpassword" id="cpassword" required>
                            <label for="Cpassword">Confirm New Password</label>
                        </div>
                    </div>
                    <div id="login-button">
                        <input type="submit" class="button" value="Submit" onclick="validateForm()"><br><br>
                    </div>  -->
                </div> 
        </div>

        </form>
        <div id="vl"></div>
        <div id="vl1"></div>
        <div id="main-box2">
            <div id="switch1"><br><br><br></div>
            <br><br><br>
            <h2>Don't have an account yet? </h2>
            <h3> Booking Flights , Managing Reservations <br>And Exploring The World <br>With Us</h3>
                <a href="Register.php"><input type="Submit" id="new-acc" value="Register" ></a>
        </div>
    </div>
    <script>
        const form = document.querySelector('#forgot');
        form.addEventListener('submit', (event) => {
        let k=validateEmail(); 
        if (k==true) 
        {
            form.submit();
        }
        else
        {
            event.preventDefault();
        }
});

        var before = document.getElementById("tohide");
        var after = document.getElementById("newpassword");
        after.style.display = "none";
        var contentDiv1 = document.getElementById("switch1");
        var contentDiv = document.getElementById("switch");
        var vl1 = document.getElementById("vl1");
        var reg = document.getElementById("main-box2");
        vl1.style.display = "none";
        contentDiv.style.display = "none";
        contentDiv1.style.display = "none";
        function validateEmail() 
        {
            const emailInput = document.getElementById('email');
            const email = emailInput.value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
            }
            else
                return true;
        }
        function display() 
        {
            var toggleButton = document.getElementById("button");
            var vl = document.getElementById("vl");
            if (contentDiv.style.display === "none") {
                contentDiv.style.display = "block";
                contentDiv1.style.display = "block";
                toggleButton.style.display = "none";
                vl.style.display = "none";
                vl1.style.display = "block";
            }
            else {
                contentDiv.style.display = "none";
            }
        }
        function dispassword() {

            if (before.style.display = "block") {
                before.style.display = "none";
                after.style.display = "block";
                vl.style.display = "none";
                vl1.style.display = "none";
                reg.style.display = "none";
            }
        } 


        <?php 
        if ($success): 
             
             //setcookie('a', $otp, time() + 24 * 3600);

            $hostName = "localhost";
            $dbusers = "root";
            $dbPassword = "";
            $dbName = "jetsetfly";
            $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
            
            $sql = "INSERT INTO otp_table (email, otp) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $email, $otp);

            $otp=rand(1000, 9999);
            $htmlContent = "Your OTP : ".$otp;
            $msg="<html><body><h1>Welcome to JetSetFly</h1> \n <h3> OTP for Reset Your Passwod :  $otp </h3></body></html>";
            mysqli_stmt_execute($stmt); 
            
            if(mail($email,"OTP for Reset Your Password",$htmlContent))
            {
                echo"display()";
            }
             ?>   
         <?php endif;  
         ?>
         <?php 
         if ($invalid): ?>
               alert("This Mail Not Registered");
         <?php endif;  
         ?>
         <?php if ($somethingiswrong): ?>
               alert("Something is wrong");
         <?php endif;  
         ?>

        <?php if ($wrongotp): ?>
               alert("Invalid OTP \n Try Again..!!");
         <?php endif;  
         ?>

        <?php if ($verifyotp): ?>
               alert("valid otp");
         <?php endif;  
         ?>
    </script>
</body>

</html>