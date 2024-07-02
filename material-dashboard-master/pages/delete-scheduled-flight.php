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
        $seq_no=$_GET['deleteConfirmed'];
        $sql = "DELETE FROM seat_cost WHERE seq_no=$seq_no";
        $result = mysqli_query($conn, $sql);

        $sql = "DELETE FROM flight_availabality WHERE seq_no=$seq_no";
        $result = mysqli_query($conn, $sql);

        $sql = "DELETE FROM flight_schedule WHERE seq_no=$seq_no";
        $result = mysqli_query($conn, $sql);

        echo "<script>window.location.href = 'scheduled-flight-details.php';</script>";
    }
    else
    {
        $fno=$_GET['seq_no_of_scheduled_flight'];
        echo "<script>
                    if (confirm('Are you sure you want to delete this schedule flight?')) {
                        window.location.href = 'delete-scheduled-flight.php?deleteConfirmed=$fno';
                    } else {
                        window.location.href = 'scheduled-flight-details.php';
                    }
        </script>";
    }
?>  