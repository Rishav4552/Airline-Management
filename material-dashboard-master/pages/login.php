<?php  
    session_start();
    if (isset($_SESSION['user']))
    {
        header('Location:dashboard.php');
    }
?>
<html>
<head>
    <title>Admin Login</title>
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
    <?php
                if(isset($_POST['submit']))
                {
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $hostName ="localhost";
                    $dbusers ="root";
                    $dbPassword ="";
                    $dbName ="jetsetfly";
                    $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
                    if (!$conn)
                    {
                        die("Something went Wrong");
                    }
                    $sql="SELECT * FROM admin_r WHERE email='$email'";
                    $result=mysqli_query($conn,$sql);
                    $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    if ($user)
                    {
                        if (password_verify($password,$user['password']))
                        {
                            session_start();
                            $_SESSION["user"]=$user['id'];
                            $_SESSION["name"]=$user['name'];
                            header("Location: dashboard.php");
                            die();
                        }
                        else
                        {
                            echo "<script>alert('Password does not match');</script>";
                        }
                    }
                    else
                    {
                        echo "<script>alert('Email does not match');</script>";
                    }
                }
    ?>
        <div id="main-box1">

            <div><br>
                <h1>Admin Login</h1>
            </div>
            <form id="rst" action="login.php" method="POST">
                <div id="newpassword">
                    <div id="login-text">
                        <div class="input-container">
                            <i class='bx bx-user' id="lock"></i>
                            <input type="email" name="email" id="password" required>
                            <label for="password">Email</label>
                        </div>
                    </div>
                    <div id="login-text">
                        <div class="input-container">
                            <i class='bx bx-lock-open belody' id="lock"></i>
                            <input type="password" name="password" id="cpassword" required>
                            <label for="Cpassword">Password</label>
                        </div>
                    </div>
                    <div id="login-button">
                        <input type="submit" class="button" value="Submit" name="submit"><br><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>




