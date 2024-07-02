<?php
  session_start();
  if(!isset($_SESSION['user']))
  {
    header("Location: login.php");
  }
  $name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Feedback</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/png" href="assets/fg.png">
  <!--this for show your LOGO on tab HA AAPLA TAKU-->

  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" /> <!--FONT-->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Material Icons INCOME HE TE -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link id="pagestyle" href="../assetsp/css/my.css?v=3.1.0" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/my.css?v=3.1.0" rel="stylesheet" />
  <style>
    .aaa {
      height: 50px;
      width: 165px;
      margin-right: 10px;
    }

    .container2 {
      display: flex;
      justify-content: space-between;
    }

    .nav-links {
      flex: 1;
      text-align: left;
      max-height: 20px;
    }

    .nav-links ul li {
      list-style: none;
      display: inline-block;
      padding: 8px 12px;
      position: relative;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .nav-links ul li a {
      color: black;
      text-decoration: none;
      font-size: 15px;

    }

    .nav-links ul li::after {
      content: "";
      width: 0%;
      height: 3px;
      background: #8E2157;
      display: block;
      margin: auto;
      transition: 1s;
    }

    .nav-links ul li:hover::after {
      width: 100%;
    }
  </style>

</head>

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

  // Function to perform sentiment analysis with improved negation handling
  function performSentimentAnalysis($text) {
    // Define positive and negative words
    $positiveWords = ["excellent","good", "awesome", "great", "excellent", "fantastic", "amazing", "wonderful", "terrific", "superb", "fabulous", "outstanding", "marvelous", "spectacular", "splendid", "phenomenal", "remarkable", "exceptional", "magnificent", "brilliant","better","positive"];
    $negativeWords = ["bad", "terrible", "awful", "poor", "horrible", "dreadful", "lousy", "atrocious", "abysmal", "inferior", "subpar", "unsatisfactory", "miserable", "unpleasant", "disappointing", "inadequate", "unacceptable", "faulty", "deficient","tatti"];

    $negations = ["not", "isn't", "wasn't", "cannot", "don't", "didn't", "won't", "aren't", "can't", "shouldn't", "wouldn't", "haven't", "hasn't", "weren't", "ain't", "doesn't", "couldn't", "isn't", "mustn't"];
  // Add more as needed

    // Tokenize input text
    $tokens = preg_split('/\s+/', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);

    // Initialize sentiment score
    $sentimentScore = 0;
    $negationMultiplier = 1;

    // Calculate sentiment score based on positive and negative words, considering negations
    foreach ($tokens as $index => $token) {
        if (in_array($token, $negations)) {
            $negationMultiplier = -1; // Adjust sentiment score for negations
        } elseif (in_array($token, $positiveWords)) {
            // Adjust sentiment score based on negation, checking if the following word is already negative
            $nextWordIndex = $index + 1;
            $nextWord = isset($tokens[$nextWordIndex]) ? $tokens[$nextWordIndex] : '';
            if (in_array($nextWord, $negativeWords)) {
                $sentimentScore -= $negationMultiplier;
            } else {
                $sentimentScore += $negationMultiplier;
            }
            $negationMultiplier = 1; // Reset negation multiplier
        } elseif (in_array($token, $negativeWords)) {
            // Adjust sentiment score based on negation, checking if the following word is already positive
            $nextWordIndex = $index + 1;
            $nextWord = isset($tokens[$nextWordIndex]) ? $tokens[$nextWordIndex] : '';
            if (in_array($nextWord, $positiveWords)) {
                $sentimentScore += $negationMultiplier;
            } else {
                $sentimentScore -= $negationMultiplier;
            }
            $negationMultiplier = 1; // Reset negation multiplier
        }
    }

    // Determine sentiment category
    if ($sentimentScore > 0) {
        return 'Positive';
    } elseif ($sentimentScore < 0) {
        return 'Negative';
    } else {
        return 'Neutral';
    }
  }

  // Query the feedback table to retrieve the firstimpression data
  $sql = "SELECT firstimpression FROM feedback";
  $result = $conn->query($sql);

  // Initialize arrays to store sentiment frequencies
  $sentimentFrequencies = [
    'Positive' => 0,
    'Negative' => 0,
    'Neutral' => 0
  ];

  // Perform sentiment analysis on each text entry and update frequency counts
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $text = $row["firstimpression"];
        $sentiment = performSentimentAnalysis($text);
        $sentimentFrequencies[$sentiment]++;
    }
  }


  // Prepare data for bar graph
  $labels = array_keys($sentimentFrequencies);
  $data = array_values($sentimentFrequencies);

?>

<body class="g-sidenav-show  bg-gray-200">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="">
        <img src="../assetsp/img/PH.jpg" class="navbar-brand-img h-100 border-radius-lg" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"><?php echo $name;?></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="airline-management.PHP">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Airline Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="flights-available.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Flights Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="scheduled-flight-details.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Schedule Flight</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="passenger-lists.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Passenger Lists</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="feedback.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Feedback</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="logout.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="addNewM.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Add New Member</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <img class="aaa" src="assets/GG-removebg-preview.png">
        <div class="container2">
          <div class="nav-links">
            <ul>
              <li><a href="add-flight.php"> <i class="fa fa-space-shuttle" style="font-size:20px;"></i></i> ADD NEW FLIGHT
                </a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
          </div>
          <div class="nav-links">
            <ul>
              <li><a href="add-airline.php"><i class="fa fa-plane" style="font-size:20px"></i> ADD NEW AIRLINE </a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
          </div>
          <div class="nav-links">
            <ul>
              <li><a href="logout.php" style="color:chocolate;"><?php echo $name;?> <i class="fa fa-sign-out"
                    style="font-size:18px"></i></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
          </div>
        </div>
      </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-4">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">
                  <h1>Feedback
                  </h1>
                </h4>
                <?php
                    $sql = "SELECT ROUND(AVG(rating), 1) AS average_rating FROM feedback"; // Use AVG() function to get average rating
                    $result = mysqli_query($conn, $sql);
                    
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result); // Fetch associative array
                        $average_rating = $row['average_rating']; // Access average rating
                    } else {
                        $average_rating = 0; // Default value if query fails or no rows returned
                    }
                ?>
                <div style="position:relative;left:800px;bottom:25px;">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                      <div class="card-header p-3 pt-2">
                        <div
                          class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                         <h3 style="position:relative;bottom: -15px;color: white;"><?php echo $average_rating;?></h3>
                        </div>
                        
                        <div class="text-end pt-1">
                          <p class="text-sm mb-0 text-capitalize">Average Rating</p>
                          <h4 class="mb-0"><?php echo $average_rating;?></h4>
                        </div>
                      </div>
                      <hr class="dark horizontal my-0">
                      <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php if($average_rating>3) echo "Positive"; else echo "Negative";?> </span></p>
                      </div>
                    </div>
                
                </div>
                </div>
              </div>
              <div class="card-body">
                <form action="" method="GET">
                  <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                      <input type="text" name="search" class="form-control" value="<?php if(isset($_GET['search'])) ?>"
                        placeholder="you can search here">
                    </div>
                    <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
                      <button type="submit" class="btn btn-primary">Search &nbsp;<i class="fa fa-search"
                          style="font-size:15px"></i></button>
                      <small class='form-text text-muted'>(You can search feedback details using user id)</small>
                    </div>
                  </div>

                    <?php
                    if(isset($_GET['search']))
                    {
                      ?>
                      <br>
                      <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr align="center">
                              <th>#</th>
                              <th>USER EMAIL</th>
                              <th>FIRST IMPRESSION</th>
                              <th>COME ACROSS</th>
                              <th>SUGGESTION</th>
                              <th>RATING</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $filter=$_GET['search'];
                            $sql="SELECT * FROM feedback WHERE CONCAT(seq_no,id) LIKE '%$filter%' "; 
                            $result=mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)>0)
                            {
                                foreach($result as $feedback)
                                {
                                    //  echo $user['id'];
                                  ?>
                                  <tr align="center">
                                    <td>
                                      <?php echo $feedback['seq_no']; ?>
                                    </td>
                                    <td>
                                      <?php 
                                            $id=$feedback['id'];
                                            $sql = "SELECT * FROM register WHERE id=$id";
                                            $result = mysqli_query($conn, $sql);
                                            if ($result) 
                                            {
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Fetch the first row
                                                    $row = mysqli_fetch_assoc($result);
                                                    echo $row['email'];
                                                  }
                                            }
                                      ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo $feedback['firstimpression'];
                                        ?>
                                    </td>
                                    <td>
                                      <?php 
                                        echo $feedback['come'];
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $feedback['missing'];
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                         echo $feedback['rating'];
                                      ?>
                                    </td>
                                  </tr>
                                  <?php
                                }
                            }
                            else
                            {
                                echo "<div class='cont'><div class='alert alert-danger'>
                                        No such record(s) found(s)
                                      </div></div>";
                            }
                          ?>
                        </tbody>
                      </table>
                </form>
                      <?php
                    }
                    else
                    {
                      ?>   
                      <br>
                      <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr align="center">
                              <th>#</th>
                              <th>USER EMAIL</th>
                              <th>FIRST IMPRESSION</th>
                              <th>COME ACROSS</th>
                              <th>SUGGESTION</th>
                              <th>RATING</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql="SELECT * FROM feedback"; 
                            $result=mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)>0)
                            {
                                foreach($result as $feedback)
                                {
                                    //  echo $user['id'];
                                  ?>
                                  <tr align="center">
                                    <td>
                                        <?php echo $feedback['seq_no']; ?>
                                    </td>
                                    <td>
                                      <?php 
                                          $id=$feedback['id'];
                                          $sql = "SELECT * FROM register WHERE id=$id";
                                          $result = mysqli_query($conn, $sql);
                                          if ($result) 
                                          {
                                              if (mysqli_num_rows($result) > 0) {
                                                  // Fetch the first row
                                                  $row = mysqli_fetch_assoc($result);
                                                  echo $row['email'];
                                                }
                                          }
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $feedback['firstimpression'];
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $feedback['come'];
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $feedback['missing'];
                                      ?>
                                    </td>
                                    <td>
                                      <?php 
                                          echo $feedback['rating'];
                                      ?>
                                    </td>
                                  </tr>
                                  <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }?>
                            </tbody>
                      </table>
                      <?php
                    }
                    ?>    
              </div>
              <br><br><br>
              <div style="width: 700px; height: 500px; margin: 0 auto; text-align: center;">
                <h2>Graph of Feedback</h2>
                <canvas id="sentimentChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="container-fluid py-4">
        <footer class="footer py-4  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                  ©
                  <script>
                    document.write(new Date().getFullYear())
                  </script>,
                  Copyright All rights reserved. Team :
                  <a href="" class="font-weight-bold" target="_blank">GMADS <i class="fa fa-heart"></i></a>
                  for a better web.
                </div>
              </div>
              <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                  <li class="nav-item">
                    <a href="" class="nav-link text-muted" target="_blank"><i class="fa fa-facebook-f"></i></a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link text-muted" target="_blank"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link text-muted" target="_blank"><i class="fa fa-instagram"></i></a>
                  </li>
                  <li class="nav-item">
                    <a href="https://www.youtube.com/channel/UCNCWGkiAKDhwgCuGT02aXCg" class="nav-link text-muted"
                      target="_blank"><i class="fa fa-youtube-play"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
  </main>
  
</body>
<script>
    var labels = <?php echo json_encode($labels); ?>;
    var data = <?php echo json_encode($data); ?>;

    var ctx = document.getElementById('sentimentChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Sentiment Frequency',
                data: data,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)', // Blue for Positive
                    'rgba(255, 99, 132, 0.2)', // Red for Negative
                    'rgba(255, 206, 86, 0.2)' // Yellow for Neutral
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        callback: function(value, index, values) {
                            return value; // Add unit if needed
                        }
                    },
                    title: {
                        display: true,
                        text: 'Frequency'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Sentiment'
                    }
                }
            }
        }
    });
</script>
</html>