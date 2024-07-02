<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/tablogo.png">
    <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>JetSetFly-Payment</title>
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
        h1 {
            text-align: center;
            color: #36373a;
        }
        #main-box1 {
      width: 75%;
      position: relative;
      top: 112px;
      left: 150px;
      background-color: white;
      text-align: center;
      border-radius: 20px;
      box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
    }

    #main-box2 {
      display: flex;
      justify-content: center;
      width: 75%;

      position: relative;
      padding: 17px;
      top: 115px;
      left: 150px;
      background-color: white;
      text-align: center;
      border-radius: 20px;
      box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
    }
     
    #main-box2 h2{
        font-weight: 500;
    }
    #login-button {
      display: flex;
      justify-content: center;
      padding-bottom: 10px;
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
      margin-bottom: 20px;
      font-size: 24px;
      text-align: center;
      cursor: pointer;
      font-weight: 500;
      color: #fff;
      background-color: #8E2157;
      ;
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
    #month{
      text-align: center;
      border-bottom: 2px solid #8E2157;
    }
    #day {
      text-align: center;
      font-size: 17px;
      width: 75px;
      padding: 15px 10px 10px;
      border: none;
      border-bottom: 2px solid #8E2157;
      outline: none;
      transition: border-bottom-color 0.3s;
    }

    #day:focus {
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

    select:focus+label,
    select:valid+label {
      top: 0;
      font-size: 12px;
      color: #8E2157;
    }



    #year {
      text-align: center;
      font-size: 17px;
      width: 85px;
      padding: 15px 10px 10px;
      border: none;
      border-bottom: 2px solid #8E2157;
      outline: none;
      transition: 0.3s;
    }

    #year:focus {
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

    select:focus+label,
    select:valid+label {
      top: 0;
      font-size: 12px;
      color: #8E2157;
    }

    select {
      font-size: 17px;
      width: 120px;
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
      font-weight: 500;
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
        font-weight: 500;
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

    #dateInput {
      cursor: pointer;
    }

    #dob-box {
      display: none;
      justify-content: center;
      position: relative;
      right: 380px;
    top: 0;
    
    }

    #dob {
      display: block;
    }
    
    </style>
</head>

<body>
    <header>
        <div class="nav__logo"><img src="assets/GG-removebg-preview.png"></div>
        <ul class="nav__links">
            <li class="link"><a href="#">HOME</a></li>
            <li class="link"><a href="my-flights.html">MY FLIGHTS</a></li>
            <li class="link"><a href="#">ABOUT</a></li>
            <li class="link"><a href="feedback.html">FEEDBACK</a></li>
        </ul>
        <a class="user-log"><i class="fa fa-user" style="font-size:24px"></i> Ganesh Mali</a>
        <a href="new-home updates.html"><button class="btn">Logout &nbsp;<i class="fa fa-sign-out"
                    style="font-size:15px"></i></button></a>
    </header>
    <br><br><br>
    <section class="personal-info">
        <div id="main-box">
            <div id="main-box2">
              <h2>Personal Information</h2>
            </div>
            <div id="main-box1" >
              <div><br>
                <h2>Passenger 1 </h2>
              </div>
              <form id="login" action="abc.php" onsubmit="return validateForm()">
                <div id="login-text">
      
                  <div class="input-container">
                    <select id="dropdown" required>
                      <option value="" disabled selected hidden></option>
                      <option value="option1">Mr</option>
                      <option value="option2">Miss</option>
                      <option value="option3">Mrs</option>
                    </select>
                    <label for="title">Title</label>
                  </div>
                  <div class="input-container">
                    <input type="text" name="fname" id="fname" required>
                    <label for="fname">First Name</label><br>
                  </div>
                  <div class="input-container">
                    <input type="text" id="lname" required>
                    <label for="lname">Last Name</label><br>
                  </div>
                  <div class="input-container">
                    <input type="text" name="mnumber" id="mnumber" required>
                    <label for="mnumber">Mobile Number</label>
                  </div>
                  <div class="input-container">
                    <input type="text" name="mnumber" id="dob" onclick="dispassword()" required >
                    <label for="dob" id="dob">Date of Birth</label>
                  </div>
                  <div id="dob-box">
                    <div>
                      <select id="year">
                        <option value="">Year</option>
                      </select>
                    </div>
                    <div>
                      <select id="month">
                        <option value="">Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                    </div>
                    <div>
                      <select id="day">
                        <option value="">Day</option>
                      </select>
                    </div>
                  </div>
                  <div id="login-button">
                    <input type="submit" class="button1" value="Submit" ><br><br>
                 </div>
              </form>
            </div>
            
          </div>
    </section>
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
    
    <script>
        // Populate year dropdown with years from 1947 to 2024
        const yearDropdown = document.getElementById('year');
        const currentYear = new Date().getFullYear();
        for (let year = currentYear; year >= 1947; year--) {
          const option = document.createElement('option');
          option.value = year;
          option.textContent = year;
          yearDropdown.appendChild(option);
        }
    
        // Populate day dropdown based on selected month and year
        const dayDropdown = document.getElementById('day');
        const monthDropdown = document.getElementById('month');
        const daysInMonth = {
          '01': 31, '02': 29, '03': 31, '04': 30, '05': 31, '06': 30,
          '07': 31, '08': 31, '09': 30, '10': 31, '11': 30, '12': 31
        };
    
        function populateDays() {
          const selectedMonth = monthDropdown.value;
          const selectedYear = yearDropdown.value;
          const days = daysInMonth[selectedMonth] || 31; // Default to 31 days
          dayDropdown.innerHTML = '<option value="">Day</option>';
          for (let day = 1; day <= days; day++) {
            const option = document.createElement('option');
            option.value = day < 10 ? '0' + day : day; // Add leading zero if needed
            option.textContent = day;
            dayDropdown.appendChild(option);
          }
        }
    
        // Event listener to populate day dropdown when month or year changes
        monthDropdown.addEventListener('change', populateDays);
        yearDropdown.addEventListener('change', populateDays);
    
        function validateForm() {
          var mobileNumber = document.getElementById("mnumber").value.trim();
          var email = document.getElementById("email").value;
          var firstName = document.getElementById("fname").value;
          var lastName = document.getElementById("lname").value;
    
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
            alert("Please Enter a Valid Mobile Number");
            return false;
          }
          alert("Login successful!");
          return true;
        }
        // var doblabel = document.getElementById("dob");
        // var dobbox = document.getElementById("dob-box");
        // dobbox.style.display = "none";
        // function dispassword() {
        //   if (doblabel.style.display = "block") {
        //     dobbox.style.display = "flex";
        //   }
        //   else{
        //     dobbox.style.display = "none";
        //   }
        // }
     
    document.body.addEventListener('click', function(event) {
        var dobbox = document.getElementById("dob-box");
        // Check if the clicked element is not the "Date of Birth" label
        if (event.target.id !== 'dob' && !dobbox.contains(event.target)) {
            // Hide the "dob-box"
            dobbox.style.display = "none";
        } else {
            // Show the "dob-box"
            dobbox.style.display = "flex";
        }
    });



      </script>

</body>

</html>