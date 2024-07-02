<?php
  // session_start();
  // if ($_SESSION['personal'] == false)
  // {
  //     header('Location: homepagewoil.html');
  // }
  if(isset($_POST['cls'])){
    $class=$_POST['class'];
    $seq_no=$_POST['seq_no'];
    $fno=$_POST['fno'];
    $from=$_COOKIE['from'];
    $to=$_COOKIE['to'];
    $d_date=$_COOKIE['d_date'];
    $nop=$_COOKIE['nop'];
    $username=$_POST['u'];
    setcookie('fno',$fno,time()+60*60*24);
    setcookie('seq_no',$seq_no,time()+60*60*24);
    setcookie('class',$class,time()+60*60*24);
      // echo "<br><br><br><br>$username";
    //   echo $class." ".$from."  ".$to."  ".$d_date."  ".$nop." ".$seq_no;
  }
  
?>
<html>
<head>
  <title>Personal Information</title>
  <link rel="icon" type="image/png" href="assets/tablogo.png">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-color: #f1f5f9;
    }

    #main-box1 {
      width: 75%;
      position: relative;
      top: 112px;
      left: 187px;
      background-color: white;
      margin-bottom: 10px;
      padding: 10px 0px;
      ;
      text-align: center;
      border-radius: 20px;
      box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
    }

    #main-box2 {
      display: flex;
      justify-content: center;
      width: 75%;
      position: relative;
      top: 100px;
      left: 187px;
      padding: 20px 0px;
      background-color: white;
      text-align: center;
      border-radius: 20px;
      box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
    }

    #main-box3 {
      display: flex;
      justify-content: center;
      width: 50%;
      position: relative;
      top: 115px;
      left: 374px;
      background-color: white;
      margin-bottom: 10px;
      padding: 10px 0px;
      text-align: center;
      border-radius: 20px;
      box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
    }

    #login-button1 {
      position: relative;
      right: 75px;
    }

    #login-button2 {
      position: relative;
      left: 75px;
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

    .button1 {
      width: 170px;
      font-size: 15px;
    }

    .button1 {
      padding: 10px 10px;
      font-size: 24px;
      cursor: pointer;
      font-weight: bold;
      color: #fff;
      background-color: #8E2157;

      border: 2px solid #89375F;
      border-radius: 15px;
    }

    .button1:hover {
      cursor: pointer;
      background-color: white;
      color: black;
      border-color: black;
    }

    .button1:active {
      background-color: white;
      border-color: black;
      transform: translateY(4px);
    }

    .input-container {
      position: relative;
      margin-bottom: 20px;
    }

    #day {
      font-size: 17px;
      width: 85px;
      padding: 15px 10px 10px;
      border: none;
      border-bottom: 2px solid #ccc;
      outline: none;
      transition: border-bottom-color 0.3s;
    }

    #day:focus {
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

    select:focus+label,
    select:valid+label {
      top: 0;
      font-size: 12px;
      color: #8E2157;
    }

    #year {
      font-size: 17px;
      width: 85px;
      padding: 15px 10px 10px;
      border: none;
      border-bottom: 2px solid #ccc;
      outline: none;
      transition: border-bottom-color 0.3s;
    }

    #year:focus {
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

    select:focus+label,
    select:valid+label {
      top: 0;
      font-size: 12px;
      color: #8E2157;
    }

    select {
      font-size: 17px;
      width: 130px;
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

    #dropdown {
      font-size: 17px;
      width: 300px;
      padding: 15px 10px 10px;
      border: none;
      border-bottom: 2px solid #ccc;
      outline: none;
      transition: border-bottom-color 0.3s;
    }

    #dropdown:focus {
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
      transition: border-bottom-color 0.3s;
      cursor: pointer;
    }

    input:focus {
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

    input:focus+label,
    input:valid+label {
      top: 0;
      font-size: 12px;
      color: #8E2157;
    }

    input:-webkit-autofill {
      -webkit-box-shadow: 0 0 0 30px white inset !important;
    }

    #dateInput {
      cursor: pointer;
    }

    #dob-box {
      display: flex;
      justify-content: left;
    }

    #dob-box10 {
      display: flex;
      justify-content: left;
    }


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

    /*-----------------------------HEADER------------------------------*/
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

    .user-log {
      position: relative;
      margin-top: -12px;

      color: var(--primary-color);
      text-decoration: none;
    }

    .user-log::after,
    .user-log:hover {
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

    .btn i {
      color: var(--extra-light);
      display: contents;
    }

    .btn:hover {
      background-color: var(--primary-color-dark);
    }

    /*-------------------------FOOTER CSS---------------------------*/
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .content-wrapper {
      min-height: 88.8vh;
      /* Make sure it takes at least the full height of the viewport */
      padding-bottom: 0;
      /* Adjust as necessary to accommodate footer height */
      box-sizing: border-box;
    }

    .footer {
      width: 100%;
      background-color: var(--primary-color);
      padding: 20px 10px;
      color: var(--white);
      margin-top: 150px;
    }

    .footer__container {
      max-width: var(--max-width);
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .footer__bar1 {
      font-size: 1rem;
    }

    .social {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .social a {
      color: var(--extra-light);
      text-decoration: none;
      font-size: 1.4rem;
    }

    .n_logo {
      display: flex;
      align-items: center;
    }

    .n_logo img {
      height: 40px;
      width: 120px;
      margin-right: 10px;
    }
  </style>
</head>
<?php
  
?>
<body>
  <header>
    <div class="nav__logo"><img src="assets/jetsetflylogo.png"></div>
    <ul class="nav__links">
      <li class="link"><a href="homepagewl.php">HOME</a></li>
      <li class="link"><a href="MyFlights.php">MY FLIGHTS</a></li>
      <li class="link"><a href="About">ABOUT</a></li>
      <li class="link"><a href="feedback.php">FEEDBACK</a></li>
    </ul>
    <a class="user-log"><i class="fa fa-user" style="font-size:20px; top:2px;"></i> <?php echo "$username" ; ?></a>
    <a href="logout.php">
      <button class="btn">Logout &nbsp;<i class="fa fa-sign-out" style="font-size:15px"></i></button>
    </a>
  </header>

  <section class="content-wrapper">
    <div id="main-box">
      <div id="main-box2">
        <h2>Personal Information</h2>
      </div>

      <form id="login" action="personal-preview.php" method="POST">
        <?php
        for ($i = 1; $i <= $nop; $i++) {
        ?>
          <div id="main-box1">
            <div><br>
              <h2>Passenger <?php echo$i;?> </h2>
            </div><br>
              <div id="login-text">
                <div class="input-container">
                  <select id="dropdown" name="title[]" required>
                    <option value="" disabled selected hidden></option>
                    <option value="Mr">Mr</option>
                    <option value="Miss">Miss</option>
                    <option value="Mrs">Mrs</option>
                  </select>
                  <label for="title">Title</label>
                </div>
                <div class="input-container">
                  <input type="text" name="fname[]" id="fname" required>
                  <label for="fname">First Name</label><br>
                </div>
                <div class="input-container">
                  <input type="text" id="lname" name="lname[]" required>
                  <label for="lname">Last Name</label><br>
                </div>
                <div class="input-container">
                  <input type="text" name="mnumber[]" id="mnumber" required>
                  <label for="mnumber">Mobile Number</label>
                </div>
                <div class="input-container">
                  <input type="date" name="dob[]" id="dob">
                  <label for="dob">Date of Birth</label>
                </div>
                <div class="input-container">
                  <select id="dropdown" name="gender[]" required>
                    <option value="" disabled selected hidden></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                  </select>
                  <label for="gender">Gender</label>
                </div>
              </div>
          </div>
        <?php
        }
        ?>
          <div id="main-box3">
            <br>
            <div id="login-button1">
               <div class="button1" onclick="goBack()">Back</div></a>
            </div>
            <div id="login-button2">
              <input type="submit" class="button1" id="submit-button" name="submit" value="Submit">
            </div>
          </div>
      </form>
  </section>

  <footer class="footer">
    <div class="footer__container">
      <div class="footer__bar1">
        <p>Copyright © 2024 Team GMADS. All rights reserved.</p>
      </div>
      <div class="social">
        <a href="" class="text-muted" target="_blank"><i class="ri-facebook-fill" ></i></a>
        <a href="#" class="text-muted" target="_blank"><i class="ri-twitter-fill"></i></a>
        <a href="#" class="text-muted" target="_blank"><i class="ri-instagram-line"></i></a>
        <a href="https://www.youtube.com/channel/UCNCWGkiAKDhwgCuGT02aXCg" class="text-muted" target="_blank"><i class="ri-youtube-fill"></i></a>
        <div class="n_logo">
          <img src="assets/w.png" alt="Logo">
        </div>
      </div>
    </div>
  </footer>
  <script>
    function goBack() {
            window.history.back();
        }
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
      var firstName = document.getElementById("fname").value.trim();
      var lastName = document.getElementById("lname").value.trim();
      var mobileNumber = document.getElementById("mnumber").value.trim();
      var dob = document.getElementById("dob").value.trim();
      var gender = document.getElementById("dropdown").value; // Corrected ID
      var dob = document.getElementById("dob").value.trim();

      var currentDate = new Date();
      var selectedDate = new Date(dob);

      if (selectedDate >= currentDate) {
        alert("Date of Birth must be before the current date.");
        event.preventDefault(); // Prevent form submission
        return false;
      }

      var firstNameRegex = /^[a-zA-Z]+$/;
      if (!firstNameRegex.test(firstName)) {
        alert("First name cannot contain numbers or special characters");
        event.preventDefault(); // Prevent form submission
        return false;
      }

      var lastNameRegex = /^[a-zA-Z]+$/;
      if (!lastNameRegex.test(lastName)) {
        alert("Last name cannot contain numbers or special characters");
        event.preventDefault(); // Prevent form submission
        return false;
      }

      var mobilePatternIndia = /^[6-9]\d{9}$/;
      if (!mobilePatternIndia.test(mobileNumber)) {
        alert("Please enter a valid mobile number");
        event.preventDefault(); // Prevent form submission
        return false;
      }

      // alert("Form submitted successfully!");
      return true;
    }
  </script>
</body>
</html>