<?php
    $upsuc=false;
    $email = "";
    if (isset($_GET['username']))
    {
       $email=$_GET['username'];
       //echo $email;
    }
    if (isset($_POST['s']))
    {

        // echo "Thank You..";
        var_dump($_POST);
        $newPassword = $_POST['password'];
        $username = $_POST['email'];
        $hostName = "localhost";
        $dbusers = "root";
        $dbPassword = "";
        $dbName = "jetsetfly";
        $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
        $passwordhash=password_hash($newPassword,PASSWORD_DEFAULT);
        $sql = "UPDATE register SET password='$passwordhash' WHERE email='$username'";
        $result = mysqli_query($conn, $sql);

        if ($result) 
        {
            echo '<script>alert("Password Updated Successfully..!!\n Using Email & New Password Login Now..!!");</script>';
            echo '<script>window.location.href = "Login.php";</script>';
        } 
        else 
        {
            echo "Not Updated";
        }

    }
?> 

<html>

<head>
    <title>Reset Password</title>
    <link rel="icon" type="image/png" href="assets/tablogo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

        #login-button {
            display: flex;
            justify-content: center;
            padding-top: 15px;
            padding-bottom: 8px;
        }

        #login-button1 {
            display: flex;
            justify-content: center;
            padding-bottom: 19px;
        }

        #login-text {
            DISPLAY: FLEX;
            justify-content: center;
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

        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px white inset !important;
        }
    </style>
</head>

<body>
    <div id="main-box">
        <div id="main-box1">

            <div><br>
                <h1>Reset Password</h1>
            </div>
            <form id="rst" action="resetpass.php" method="POST">
                <div id="newpassword">
                    <div id="login-text">
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
                        <input type="text" name="email" value="<?php echo $email;?>" hidden>
                        <input type="submit" class="button" value="Submit" name="s"><br><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const form = document.querySelector('#rst');
        form.addEventListener('submit', (event) => {
            let k = validateForm();
            if (k == true) {
                form.submit();
            }
            else {
                event.preventDefault();
            }
        });
        function validateForm() {
            var password = document.getElementById("password").value.trim();
            var confirmPassword = document.getElementById("cpassword").value.trim();
            if (password !== confirmPassword) {
                alert("Password and Confirm Password Must Same..!!");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>




