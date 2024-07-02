<html>

<head>
   <title>Registration</title>
   <link rel="icon" type="image/png" href="assets/tablogo.png">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
   <style>
          @import url("https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap");

      * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
     
    }
      body {
         background-color: #f1f5f9;
      }

      #main-box {
         display: flex;
         justify-content: space-evenly;
      }

      #main-box1 {
         width: 72%;
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
         padding-bottom: 10px;
         padding-top: 10px;
      }

      #login-text {
         display: grid;
         grid-template-columns: auto auto auto;
         gap: 10px;
         position: relative;
         left: 10px;
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
         top: 165px;
         border-left: 6px solid #8E2157;
         ;
         height: 50%;
      }

      .button {
         width: 170px;
         font-size: 15px;
      }

      .button {
         padding: 10px 10px;
         margin-bottom: 20px;
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


      .input-container {
         position: relative;
         margin-bottom: 20px;
      }

      select {
         font-size: 17px;
         width: 300px;
         padding: 15px 10px 10px;
         border: none;
         border-bottom: 2px solid #ccc;
         outline: none;
         transition: border-bottom-color 0.3s;
      }

      select:focus {
         border-bottom-color: #8E2157;
      }

      label {
         font-weight: bold;
         position: absolute;
         top: 15px;
         left: 10px;
         font-size: 16px;
         color: #333;
         transition: top 0.3s, font-size 0.3s;
      }
      #bottom-button a
      {
         text-decoration:none;
      }

      select:focus+label,
      select:valid+label {
         top: 0;
         font-size: 12px;
         color: #8E2157;
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
         transition: border-bottom-color: 0.3s;
      }

      input:focus {
         border-bottom-color: #8E2157;
      }

      label {
         font-weight: 500;
         position: absolute;
         top: 15px;
         left: 10px;
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

      input:-webkit-autofill {
         -webkit-box-shadow: 0 0 0 30px white inset !important;
      }
      #bottom-button {position:relative;top:10px;display:flex;justify-content:space-around;}



      :root {
      --primary-color: #8E2157;
      --primary-color-dark: #6b0f3d;
      --text-dark: #0b0f18;
      --text-light: #503744;
      --extra-light: #f1f5f9;
      --white: #ffffff;
      --max-width: 1400px;
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
      font-family: "Poppins";
      min-height: 70vh;
    }


    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: 0.6s;
      padding: 10px 20px 15px 30px;
      z-index: 10000;
      background-color: var(--white);
      font-family: "Poppins",sans-serif;
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
      margin-right: 0; /* Removed margin-right from the last li element */
    }

    header ul li a {
      margin: 0 15px;
      text-decoration: none;
      color: #fff;
      letter-spacing: 2px;
      font-weight: 500px;
      transition: 0.6s;
    }
    .nav__logo{
      position:absolute;
      left:20px;
    }
    .nav__logo img {
      height: 50px;
      width: 150px;
      margin-right: 10px;
    }
    .n_logo{
        height: 40px;
      width: 120px;
      
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
    }

    .nav__links li a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 700;
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
    }

    .social span {
      font-size: 1.2rem;
      color: var(--extra-light);
    }
    .social span a{
      text-decoration: none;
      color:var(--extra-light);
    }
   </style>
</head>

<body>    
<header>
    <div class="nav__logo"><img src="assets/jetsetflylogo.png"></div>
    <ul class="nav__links">
      <li class="link"><a href="homepagewoil.html">HOME</a></li>
      <li class="link"><a href="AboutUs-wol.html">ABOUT</a></li>
      <!-- <li class="link"><a href="">MY FLIGHTS</a></li> -->
      <!-- <li class="link"><a href="Login.php">FEEDBACK</a></li> -->
   </ul>
  </header>  
   <div id="main-box">
      <div id="main-box1">
      <?php
               $success=false;
               $alreadyexits=false;
              if(isset($_POST['submit']))
                {
                    
                    $title=$_POST['title'];
                    $fname=$_POST['fname'];
                    $fname=strtoupper($fname);
                    $lname=$_POST['lname'];
                    $lname=strtoupper($lname);
                    $email=$_POST['email'];
                    $email=strtolower($email);
                    $password=$_POST['password'];
                    $mnumber=$_POST['mnumber'];
                    // insert data into DB
                    $hostName ="localhost";
                    $dbusers ="root";
                    $dbPassword ="";
                    $dbName ="jetsetfly";
                    $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
                    if (!$conn)
                    {
                        die("Something went Wrong");
                    }
                    $sql="SELECT * FROM register WHERE email='$email'";
                    $result=mysqli_query($conn,$sql);
                    $rowCount=mysqli_num_rows($result);
                    if ($rowCount>0)
                    {
                       $alreadyexits=true;
                    }
                    else
                    {
                        $passwordhash=password_hash($password,PASSWORD_DEFAULT);
                        $sql ="INSERT INTO register (title,firstname,lastname,email,password,mobile) VALUES (?,?,?,?,?,?)";
                        $stmt =mysqli_stmt_init($conn);
                        $prepare =mysqli_stmt_prepare($stmt,$sql);
                        if ($prepare)
                        {
                            mysqli_stmt_bind_param($stmt,"ssssss",$title,$fname,$lname,$email,$passwordhash,$mnumber);
                            mysqli_stmt_execute($stmt);
                            $success=true;
                        }
                        else
                        {
                            die("SomeThing Went Wrong");
                        }
                    }

                }
         ?>
         <div><br>
            <h1>REGISTER</h1>
         </div>
         <br>
         <form id="login" action="Register.php" method="post">
            <div id="login-text">
               <div class="input-container">
                  <select id="dropdown" name="title" required>
                     <option value="" disabled selected hidden></option>
                     <option value="Mr">Mr</option>
                     <option value="Miss">Miss</option>
                     <option value="Mrs">Mrs</option>
                  </select>
                  <label for="title">Title</label>
               </div>
               <div class="input-container">
               <input type="text" name="fname" id="fname" value='<?php echo isset($fname) ? $fname : ""; ?>' required>
                  <label for="fname">First Name</label><br>
               </div>
               <div class="input-container">
               <input type="text" name="lname" id="lname" value="<?php echo isset($lname) ? $lname : ''; ?>" required>
                  <label for="lname">Last Name</label><br>
               </div>
               <div class="input-container">
               <input type="text" name="email" id="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                  <label for="email">Email</label>
               </div>
               <div class="input-container">
                  <input type="password" name="password" id="password" required>
                  <label for="password">Password</label>
               </div>
               <div class="input-container">
                  <input type="password" name="cpassword" id="cpassword" required>
                  <label for="Cpassword">Confirm Password</label>
               </div>
               <div class="input-container">
               <input type="text" name="mnumber" id="mnumber" value="<?php echo isset($mnumber) ? $mnumber : ''; ?>" required>
                  <label for="mnumber">Mobile Number</label>
               </div>
            </div>
            <div id="bottom-button">
            <a href="Login.php">
            <div id="login-button">
               <input type="button" class="button" value="Back" name="back"><br><br>
            </div>
            </a>
            <div id="login-button">
               <input type="submit" class="button" value="Register" name="submit"><br><br>
            </div>
            </div>
         </form>
      </div>
   <footer class="footer">
    <div class="section__container footer__bar1">
      <p>Copyright © 2024 Team <b>GMADS.</b> All rights reserved.</p>
      <div class="social">
        <span><a href="" class="text-muted" target="_blank"><i class="ri-facebook-fill"></i></a></span>
        <span><a href="" class="text-muted" target="_blank"><i class="ri-twitter-fill"></i></a></span>
        <span><a href="" class="text-muted" target="_blank"><i class="ri-instagram-line"></i></a></span>
        <span><a href="https://www.youtube.com/channel/UCNCWGkiAKDhwgCuGT02aXCg" class="text-muted" target="_blank"><i
              class="ri-youtube-fill"></i></a></span>
        <div class="n_logo"><img src="assets/w.png"></div>
      </div>
    </div>
  </footer>
      <script>

const form = document.querySelector('#login');
form.addEventListener('submit', (event) => {
    let k=validateForm();
    if (k==true) {
        form.submit();
    }
    else
    {
      event.preventDefault();
    }
});

         function validateForm() {
   var mobileNumber = document.getElementById("mnumber").value.trim();
   var password = document.getElementById("password").value.trim();
   var confirmPassword = document.getElementById("cpassword").value.trim();
   var email = document.getElementById("email").value;
   var firstName = document.getElementById("fname").value;
   var lastName = document.getElementById("lname").value;

   var firstNameRegex = /^[a-zA-Z ]+$/;
   if (!firstNameRegex.test(firstName)) {
      alert("First name cannot contain numbers or special characters");
      return false;
   }
   var lastNameRegex = /^[a-zA-Z ]+$/;
   if (!lastNameRegex.test(lastName)) {
      alert("Last name cannot contain numbers or special characters");
      return false;
   }

   // Regular expression for validating email format
   //var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   var emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;
   if (!emailRegex.test(email)) {
      alert("Invalid Email Format..!!");
      return false;
   }

   // Check if password and confirm password match
   if (password !== confirmPassword) {
      alert("Password and Confirm Password are Not Same..!!");
      return false;
   }

   var mobilePatternIndia = /^[6-9]\d{9}$/;
   if (!mobilePatternIndia.test(mobileNumber)) {
      alert("Please Enter a Valid Mobile Number..!!");
      return false;
   }

   // If all validations pass, allow the form submission
   return true;
}
<?php if ($success): ?>
               alert("Registered Successfully..!!\n Using Email & Password Login Now..!!");
               window.location.href = "Login.php";
         <?php endif;  
         ?>
          <?php if ($alreadyexits): ?>
        var confirmed = confirm("Provided Email Already Exists..!!\n Do you want to proceed to Forgot Password..??");
        if (confirmed) {
            window.location.href = "Forgotpasswordphp.php"; // Redirect to forgot.php
        }
    <?php endif; ?>         
      </script>
</body>

</html>