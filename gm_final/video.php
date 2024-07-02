
<!DOCTYPE html>
<html>

<?php
$from=$_POST['from'];
$to=$_POST['to'];
$d_date=$_POST['d_date'];
$nop=$_POST['nop'];

setcookie("from",$from,time()+60*60*24);
setcookie("to",$to,time()+60*60*24);
setcookie("d_date",$d_date,time()+60*60*24);
setcookie("nop",$nop,time()+60*60*24);
?>

<head>
<link rel="icon" type="image/png" href="assets/tablogo.png">
    <style>
        body {
            margin: 0;
            overflow: hidden;
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .back-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .text-overlay {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 34px;
            font-weight: bold;
            text-align: center;
            z-index: 2;
            color: white; 
        }

        .text-overlay1 {
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 20px;
            text-align: center;
            z-index: 2;
            color: #eee; 
        }

        .text-overlay2 {
            position: absolute;
            top: 21%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 2;
            color: #eee; 
            font-size: 15px;
        }

        .hr-line {
            position: absolute;
            top: 17%; 
            left: 50%;
            transform: translateX(-50%);
            width: 30%;
            z-index: 2;
        }

        .hr-line1 {
            position: absolute;
            top: 21%; 
            left: 50%;
            transform: translateX(-50%);
            width: 8%;
            z-index: 2;
            overflow: hidden;
        }

        .hr-line hr,
        .hr-line1 hr {
            border: none;
            height: 1px;
            background-color: #eee; 
        }

        .hr-line hr {
            animation: loadingAnimation 2s linear infinite;
        }

        .hr-line1 hr {
            background: linear-gradient(to right, white, white 50%, transparent 50%, transparent);
            background-size: 200% 100%;
            background-position: 100% 0;
            animation: loadingAnimation1 2s linear infinite;
        }

        @keyframes loadingAnimation1 {
            to {
                background-position: -100% 0;
            }
        }
    </style>
</head>

<body>
    <div class="video-container">
        <video autoplay loop playsinline class="back-video" id="myVideo">
            <?php
                if ($nop==1)
                   echo "<source src='assets/blue.mp4' type='video/mp4'>"; 
                else if ($nop==2)
                   echo "<source src='assets/red.mp4' type='video/mp4'>"; 
                else if ($nop==3)
                  echo "<source src='assets/yellow.mp4' type='video/mp4'>"; 
                else
                  echo "<source src='assets/purple.mp4' type='video/mp4'>";
            ?>
        </video>
        <div class="text-overlay"><?php echo $from; ?> to <?php echo $to; ?></div>
        <div class="text-overlay1"><small><?php echo $d_date; ?> . <?php echo $nop; ?> passenger(s)</small></div>
        <div class="hr-line"><hr></div>
        <div class="text-overlay2">Loading best fares...</div>
        <div class="hr-line1"><hr></div>
    </div>

    <?php
    $videoDuration = 5; 
    ?>

    <script>
        var video = document.getElementById("myVideo");
        var overlay = document.querySelector(".video-container::before");

        video.addEventListener("timeupdate", function () {
            var progress = video.currentTime / video.duration;
            overlay.style.opacity = 0.5 + progress * 0.5;
        });
    </script>
    <meta http-equiv="refresh" content="<?php echo $videoDuration; ?>;url=F-booking.php">
</body>

</html>
