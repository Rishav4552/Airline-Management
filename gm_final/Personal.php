<html>

<head>
  <title>Personal Information</title>
  <link rel="icon" type="image/png" href="assets/tablogo.png">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-color: #f1f5f9;
    }

    #main-box1 {
      width: 75%;
      position: relative;
      top: 112px;
      left:150px;
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
      top: 100px;
      left:150px;
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
      top: 100px;
      left:287px;
      background-color: white;
     padding:10px 0px;
      text-align: center;
      border-radius: 20px;
      box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
    }
       
    #login-button1 {
position:relative;
right:75px;
    }
    #login-button2 {
position:relative;
left:75px;
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
     justify-content: center;
    }

  </style>

</head>

<body>
  <div id="main-box">
     <div id="main-box2">
	<h2>Personal Information</h2>
     </div>
    <div id="main-box1">
      <div><br>
        <h2>Passenger 1 </h2>
      </div>
      <form id="login">
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
	<input type="text" name="dob" id="dob" onclick="disdob()">
            <label for="mnumber">Date of Birth</label>
            <div id="dob-box">
              <div>
                <select id="year" required>
                  <option value="">Year</option>
                </select>
              </div>
              <div>
                <select id="month" required>
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
                <select id="day" required>
                  <option value="">Day</option>
                </select>
              </div>
            </div>
    </div>
  </div>


  </div>
<div id="main-box3">
<br>
       <div id="login-button1">
      <button class="button1">Back</button>
      </div>
     <div id="login-button2">
      <input type="submit" class="button1" id="submit-button" value="Submit" onclick="validateForm()">
    </div>
     </div>
</form>
  <script>
    // JavaScript code for populating year dropdown and validating form

    // Function to populate year dropdown
    function populateYearDropdown() {
      const yearDropdown = document.getElementById('year');
      const currentYear = new Date().getFullYear();
      for (let year = currentYear; year >= 1947; year--) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        yearDropdown.appendChild(option);
      }
    }

    // Function to populate days based on selected month and year
    function populateDays() {
      const daysInMonth = {
        '01': 31, '02': 28, '03': 31, '04': 30, '05': 31, '06': 30,
        '07': 31, '08': 31, '09': 30, '10': 31, '11': 30, '12': 31
      };

      const dayDropdown = document.getElementById('day');
      const monthDropdown = document.getElementById('month');
      const selectedMonth = monthDropdown.value;
      const selectedYear = document.getElementById('year').value;

      // Adjust days for February in leap years
      if (selectedMonth === '02' && (selectedYear % 4 === 0 && (selectedYear % 100 !== 0 || selectedYear % 400 === 0))) {
        daysInMonth['02'] = 29;
      }

      dayDropdown.innerHTML = '<option value="">Day</option>';
      const days = daysInMonth[selectedMonth] || 31; // Default to 31 days
      for (let day = 1; day <= days; day++) {
        const option = document.createElement('option');
        option.value = day < 10 ? '0' + day : day; // Add leading zero if needed
        option.textContent = day;
        dayDropdown.appendChild(option);
      }
    }

    // Function to validate form
    function validateForm() {
      var firstName = document.getElementById("fname").value.trim();
      var lastName = document.getElementById("lname").value.trim();
      var mobileNumber = document.getElementById("mnumber").value.trim();
      var dob = document.getElementById("dob").value.trim();
      var year = document.getElementById("year").value;
      var month = document.getElementById("month").value;
      var day = document.getElementById("day").value;

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

      if (!year || !month || !day) {
        alert("Please select your date of birth");
        return false;
      }
      alert("Form submitted successfully!");
  document.getElementById("login").submit();
return true;
    }

    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
      populateYearDropdown();
      populateDays();
    });

    document.getElementById('month').addEventListener('change', populateDays);
    document.getElementById('year').addEventListener('change', populateDays);
  </script>

<script>
 var before = document.getElementById("dob");
 var after = document.getElementById("dob-box");
 after.style.display = "none";
function disdob()
        {
	if (before.style.display = "block")
	{
	 before.style.display = "none";
	 after.style.display = "flex";
	}
         }
  </script>
</body>

</html>