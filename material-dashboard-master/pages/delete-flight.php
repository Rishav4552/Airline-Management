<?php
  session_start();
  if(!isset($_SESSION['user']))
  {
    header("Location: login.php");
  }
  $name=$_SESSION['name'];
?>
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
    if($_GET['deleteConfirmed'])
    {
        $fno=$_GET['deleteConfirmed'];
        $sql = "DELETE FROM flight WHERE fno=$fno";
        $result = mysqli_query($conn, $sql);
        echo "<script>window.location.href = 'flights-available.php';</script>";
    }
    else
    {
        $fno=$_GET['ig'];
        echo "<script>
                    if (confirm('Are you sure you want to delete this flight?')) {
                        window.location.href = 'delete-flight.php?deleteConfirmed=$fno';
                    } else {
                        window.location.href = 'flights-available.php'; // Redirect back to the same page if cancel is clicked
                    }
        </script>";
    }
?>  