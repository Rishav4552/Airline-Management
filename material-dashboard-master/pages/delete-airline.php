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
        $ano=$_GET['deleteConfirmed'];
        $sql = "DELETE FROM airline WHERE ano=$ano";
        $result = mysqli_query($conn, $sql);
        echo "<script>window.location.href = 'airline-management.php';</script>";
    }
    else
    {
        $ano=$_GET['id'];
        echo "<script>
                    if (confirm('Are you sure you want to delete this airline?')) {
                        window.location.href = 'delete-airline.php?deleteConfirmed=$ano';
                    } else {
                        window.location.href = 'airline-management.php'; // Redirect back to the same page if cancel is clicked
                    }
        </script>";
    }
?>  