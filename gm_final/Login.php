<?php
session_start();
?>

<html>

<head>
    <title>Login Page</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="assets/tablogo.png">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    .section__container {
      max-width: var(--max-width);
      margin: auto;
      padding: 5rem 1rem;
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
    }

    a {
      text-decoration: none;
    }

    img {
      width: 100%;
      display: flex;
    }

    body {
      font-family: "Poppins", sans-serif;
      min-height: 70vh;
    }


    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      display: flex;
      align-items: center;
      transition: 0.6s;
      padding: 10px 20px 0 30px;
      background: var(--white);
      font-family: "Poppins",sans-serif;
    }

    header .logo {
        position:relative;
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
      margin-right: 0; /* Removed margin-right from the last li element */
    }

    header ul li a {
      margin: 0 15px;
      text-decoration: none;
      color:var(--primary-color);
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
        position:relative;
        left:300px;
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
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 700;
      font-family: 'Poppins', sans-serif;
    }

    

    .nav__links li::after {
      content: '';
      width: 0%;
      height: 3px;
      background: var(--primary-color-dark);
      display: block;
      margin: auto;
      transition: 0.5s;
    }

    .nav__links li:hover::after {
      width: 80%;
    }

    .footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      height:auto;
      background-color: var(--primary-color);
      z-index: 100;
      padding: 20px 0;
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
      font-size:0.9rem;
    }

    .social span {
      font-size: 1.2rem;
      color: var(--extra-light);
    }
    .social span a{
      text-decoration: none;
      color:var(--extra-light);
    }
    .social span a i{
        
    }

        #main-box {
            display: flex;
            justify-content: space-evenly;
            font-family: sans-serif;
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
        #main-box2 h3{
            font-weight:500;

        }
        #login-button {
            display: flex;
            justify-content: center;
            padding-bottom: 20px;
        }

        #login-text {
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

        .vl {
            position: absolute;
            top: 155px;
            border-left: 6px solid #8E2157;
            ;
            height: 50%;
        }

        #forget-pass {
            position: relative;
            left: 210px;
            bottom: 10px;
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
            font-weight: 500;
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

        #emailStatus {
            position: relative;
            left: 30px;
        }

        .text-muted {
            color: #ffffff !important;
        }

  .n_logo
  {
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
     
.login{
    display: flex;
    align-items: center;
    margin-left: 250px;
}
.login i{
    position: relative;
    right: 40px;
    top: 0px;
}
.login div{
    position: relative;
    right: 35px;
}
    </style>

</head>

<body>
<?php
ob_start();
    $success=false;
    $invalid=false;
    $somethingiswrong=false;
    $invalidpass=false;
    if (isset($_GET['submit']))
    {
        $email=$_GET['email'];
        $password=$_GET['password'];
        //$success=true;
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
            if (password_verify($password,$user['password']))
            {
                // echo "Password  match";
                $success=true;
                $userid=$user['id'];
                $_SESSION['log']=true;
                $_SESSION['userid']=$userid;
                echo "<script>window.location.href = 'homepagewl.php?username=" . $user['email']."';</script>";
                
                exit(); // Ensure that no other code is executed after redirection
            }
            else
            {
                // echo "Password does not match";
                $invalidpass=true;
            }
        }
        else
        {
            // die("SomeThing Went Wrong");
            $invalid=true;
        }

    }

    ?>

    <header>
        <div class="nav__logo"><img src="assets/jetsetflylogo.png"></div>
        <ul class="nav__links">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="link1"><a href="homepagewoil.html">HOME</a></li>
            <!-- <li class="link1" onclick="checkLogin()"><a href="">MY FLIGHTS</a></li> -->
            <li class="link1"><a href="AboutUs-wol.html">ABOUT</a></li>
            <!-- <li class="link1"><a href="#">FEEDBACK</a></li> -->
        </ul>
    </header>
        <div id="main-box">
        
        <div id="main-box1">

            <div><br>
                <h1>Login</h1>
            </div>
            <div id="login-text">
            <form id="login" method="get" action="Login.php">
                    <div class="input-container">
                        <i class='bx bx-user-circle belody'></i>
                        <input type="email" id="email" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" required>
                        <label for="username">Email</label>
                        <div id="emailStatus"></div>
                    </div>
                    <div class="input-container">
                        <i class='bx bx-lock-open belody' id="lock"></i>
                        <input type="password" id="password" name="password" required>
                        <label for="password">Password</label><br>
                        <span class="toggle-password" onclick="togglePassword()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span><br>
                        <a href="Forgotpasswordphp.php" id="forget-pass">Forgot Password</a>
                    </div>
            </div>
            <div id="login-button">
                <input type="submit" class="button" value="Login" name="submit"><br><br>
            </div>
            </form>
        </div>
        <div class="vl"></div>
        <div id="main-box2">
            <br><br>
            <h1>Don't Have An Account Yet? </h1>
            <h3><br>Booking flights , managing reservations <br>and explore the world <br>with us</h3><br>
            <a href="Register.php"><button type="Submit" id="new-acc">Register</button></a>
        </div>
    </div>
    
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

    function checkLogin() {
        // Assume isLoggedIn is a variable indicating whether the user is logged in
        var isLoggedIn = false; // Change this to true if the user is logged in

        if (!isLoggedIn) {
            alert("Please log in to access My Flights.");
        }
    }
    const form = document.querySelector('#login');
    form.addEventListener('submit', (event) => {
    let k=validateEmail();
     // Prevent the default form submission
    if (k==true) {
        // If validation fails, return early and prevent form submission
        form.submit();
    }
    else
    {
      event.preventDefault();
    }
}); 
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var toggleBtn = document.querySelector(".toggle-password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 9l-7 7-7-7"></path></svg>';
            } else {
                passwordInput.type = "password";
                toggleBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 12a4 4 0 1 0-8 0"></path><line x1="8" y1="16" x2="16" y2="16"></line><line x1="8" y1="20" x2="16" y2="20"></line></svg>';
            }
        }

        const emailInput = document.getElementById('email');
        const emailStatus = document.getElementById('emailStatus');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        function validateEmail() {
            const email = emailInput.value.trim();
            if (emailPattern.test(email)) {
                emailStatus.textContent = 'Valid email address';
                emailStatus.style.color = 'green';
                return true;
            } else {
                emailStatus.textContent = 'Invalid email address';
                emailStatus.style.color = 'red';
                return false;
            }
        }
        emailInput.addEventListener('blur', validateEmail);
        <?php if ($invalidpass==true): ?>
            alert("Please Enter Valid Password..!!");
        <?php endif; ?>
        <?php if ($somethingiswrong==true): ?>
            alert("Something is wrong..!!");
        <?php endif; ?>
        
        <?php if ($invalid==true): ?>
            alert("Invalid User..!!");
        <?php endif; ?>

    </script>
</body>

</html>