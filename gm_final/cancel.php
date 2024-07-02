<?php
    session_start();
    if (isset($_SESSION['u']))
    {
        $username=$_SESSION['u'];
    }
    if (isset($_SESSION['userid']))
    {
        $userid=$_SESSION['userid'];
    }

    $hostName ="localhost";
    $dbusers ="root";
    $dbPassword ="";
    $dbName ="jetsetfly";
    $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
    if (!$conn)
    {
        die("Something went Wrong");
    }
    
    if (isset($_POST['single']))
    {

        $bid=$_POST['booking_id'];
        $tno=$_POST['tno'];
        $pid=$_POST['pid'];
        echo "Booking Id : ".$bid;
        echo "Ticket No : ".$tno;
        echo "PID : ".$pid;
        $sql1="SELECT * FROM payment WHERE booking_id=$bid"; 
        $result1=mysqli_query($conn,$sql1);
        if (mysqli_num_rows($result1)>0)
        {
            $row1 = mysqli_fetch_assoc($result1);
            $nop = $row1['nop'];
            // echo $nop;
            if ($nop==1)
            {
                $sql = "SELECT * FROM ticket WHERE booking_id=$bid AND pid=$pid";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) 
                {
                    $row = mysqli_fetch_assoc($result); 
                    $class = $row['cname'];
                    $seq_no=$row['seq_no'];
                    $src=$row['src'];
                    $dest=$row['dest'];
                    $prn=$row['prn'];
                }

                $sql = "SELECT * FROM register WHERE id=$userid";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) 
                {
                    $row = mysqli_fetch_assoc($result); 
                    $email=$row['email'];
                    $name=$row['firstname']." ".$row['lastname'];
                }

                $to = "$email";
                $subject = "Ticket Cancellation Confirmation";
                $message = "Dear User $name,\r\n\r\n";
                $message .= "Your JetSetFly ticket from $src to $dest of prn no : $prn has been successfully canceled.Refund will be initiated within 24 hours and your payment will be credited..\r\n\r\n";
                $message .= "Thank you for choosing JetSetFly.\r\n";
                $headers = "From: ganarm2003@gmail.com\r\n";
                $headers .= "Reply-To: ganarm2003@gmail.com\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                
                if (mail($to, $subject, $message, $headers)) {
                    echo "Email sent successfully.";
                } else {
                    echo "Email sending failed.";
                }




                $sql = "DELETE FROM ticket WHERE booking_id=$bid";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $deletedRows = mysqli_affected_rows($conn);
                    // echo "Number of rows deleted: $deletedRows";
                }

                if($class=='Economy Class')
                {
                
                    $query = "UPDATE flight_availabality SET seatsofeco = seatsofeco+$deletedRows WHERE seq_no = $seq_no";
                    $run = mysqli_query($conn, $query);
                    if ($run)
                        echo "<script>alert('flight eco');</script>";
                }
                if($class=='First Class')
                {
                    $query = "UPDATE flight_availabality SET  seatsoffrt = seatsoffrt+$deletedRows WHERE seq_no = $seq_no";
                    $run = mysqli_query($conn, $query);
                    if ($run)
                        echo "<script>alert('flight frt');</script>";
                }
                if($class=='Business Class')
                {
                    $query = "UPDATE flight_availabality SET seatsofbsn = seatsofbsn+$deletedRows WHERE seq_no = $seq_no";
                    $run = mysqli_query($conn, $query);
                    if ($run)
                        echo "<script>alert('flight bsn');</script>";
                }


                

                $sql = "DELETE FROM payment WHERE booking_id=$bid";
                $result = mysqli_query($conn, $sql);

                $sql = "DELETE FROM passenger WHERE booking_id=$bid";
                $result = mysqli_query($conn, $sql);

                $sql = "DELETE FROM booking WHERE booking_id=$bid";
                $result = mysqli_query($conn, $sql);

                echo "<script>window.location.href = 'MyFlights.php';</script>";
            }
            else
            {
                $sql = "SELECT * FROM ticket WHERE booking_id=$bid AND pid=$pid";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) 
                {
                    $row = mysqli_fetch_assoc($result); 
                    $class = $row['cname'];
                    $seq_no=$row['seq_no'];
                    $src=$row['src'];
                    $dest=$row['dest'];
                    $prn=$row['prn'];
                }

                $sql = "SELECT * FROM register WHERE id=$userid";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) 
                {
                    $row = mysqli_fetch_assoc($result); 
                    $email=$row['email'];
                    $name=$row['firstname']." ".$row['lastname'];
                }

                $to = "$email";
                $subject = "Ticket Cancellation Confirmation";
                $message = "Dear User $name,\r\n\r\n";
                $message .= "Your JetSetFly Ticket from $src to $dest of PRN No : $prn has been Successfully Cancelled.Refund will be Initiated within 24 hours and your Funds will be Credited..\r\n\r\n";
                $message .= "Thank you for choosing JetSetFly.\r\n";
                $headers = "From: ganarm2003@gmail.com\r\n";
                $headers .= "Reply-To: ganarm2003@gmail.com\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                
                if (mail($to, $subject, $message, $headers)) {
                    echo "Email sent successfully.";
                } else {
                    echo "Email sending failed.";
                }

                $sql = "DELETE FROM ticket WHERE booking_id=$bid AND pid=$pid";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $deletedRows = mysqli_affected_rows($conn);
                }

                if($class=='Economy Class')
                {
                
                    $query = "UPDATE flight_availabality SET seatsofeco = seatsofeco+$deletedRows WHERE seq_no = $seq_no";
                    $run = mysqli_query($conn, $query);
                    if ($run)
                        echo "<script>alert('flight eco');</script>";
                }
                if($class=='First Class')
                {
                    $query = "UPDATE flight_availabality SET  seatsoffrt = seatsoffrt+$deletedRows WHERE seq_no = $seq_no";
                    $run = mysqli_query($conn, $query);
                    if ($run)
                        echo "<script>alert('flight frt');</script>";
                }
                if($class=='Business Class')
                {
                    $query = "UPDATE flight_availabality SET seatsofbsn = seatsofbsn+$deletedRows WHERE seq_no = $seq_no";
                    $run = mysqli_query($conn, $query);
                    if ($run)
                        echo "<script>alert('flight bsn');</script>";
                }

                $nop=$nop - 1;
                $sql1 = "UPDATE payment SET nop = $nop WHERE booking_id = $bid"; 
                $result1 = mysqli_query($conn, $sql1);

                $sql = "DELETE FROM ticket WHERE booking_id=$bid AND tno=$tno";
                $result = mysqli_query($conn, $sql);

                $sql = "DELETE FROM passenger WHERE pid=$pid";
                $result = mysqli_query($conn, $sql);

                echo "<script>window.location.href = 'MyFlights.php';</script>";
            }
        }
    }
    else
    {
        $bid=$_POST['booking_id'];
        echo $bid;
        $sql = "SELECT * FROM ticket WHERE booking_id=$bid";
        $result = mysqli_query($conn, $sql);
        $prnNumbers = array();
        if ($result && mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $prnNumbers[] = $row['prn']; // Add prn number to the array

                $class = $row['cname'];
                $seq_no=$row['seq_no'];
                $src=$row['src'];
                $dest=$row['dest'];
            }
            $prnString = implode(', ', $prnNumbers);
             
            if ($prnString=='')
                $prnString=$row['prn'];
            
        }
        echo "PRN Numbers: $prnString";
        

        $sql = "SELECT * FROM register WHERE id=$userid";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result); 
            $email=$row['email'];
            $name=$row['firstname']." ".$row['lastname'];
        }

        $to = "$email";
        $subject = "Ticket Cancellation Confirmation";
        $message = "Dear User $name,\r\n\r\n";
        $message .= "Your JetSetFly ticket from $src to $dest of prn no : $prnString has been successfully canceled.Refund will be initiated within 24 hours and your payment will be credited..\r\n\r\n";
        $message .= "Thank you for choosing JetSetFly.\r\n";
        $headers = "From: ganarm2003@gmail.com\r\n";
        $headers .= "Reply-To: ganarm2003@gmail.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully.";
        } else {
            echo "Email sending failed.";
        }

        $sql = "DELETE FROM ticket WHERE booking_id=$bid";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $deletedRows = mysqli_affected_rows($conn);
            // echo "Number of rows deleted: $deletedRows";
        }

        if($class=='Economy Class')
        {
        
            $query = "UPDATE flight_availabality SET seatsofeco = seatsofeco+$deletedRows WHERE seq_no = $seq_no";
            $run = mysqli_query($conn, $query);
            if ($run)
                echo "<script>alert('flight eco');</script>";
        }
        if($class=='First Class')
        {
            $query = "UPDATE flight_availabality SET  seatsoffrt = seatsoffrt+$deletedRows WHERE seq_no = $seq_no";
            $run = mysqli_query($conn, $query);
            if ($run)
                echo "<script>alert('flight frt');</script>";
        }
        if($class=='Business Class')
        {
            $query = "UPDATE flight_availabality SET seatsofbsn = seatsofbsn+$deletedRows WHERE seq_no = $seq_no";
            $run = mysqli_query($conn, $query);
            if ($run)
                echo "<script>alert('flight bsn');</script>";
        }

        $sql = "DELETE FROM payment WHERE booking_id=$bid";
        $result = mysqli_query($conn, $sql);

        $sql = "DELETE FROM passenger WHERE booking_id=$bid";
        $result = mysqli_query($conn, $sql);

        $sql = "DELETE FROM booking WHERE booking_id=$bid";
        $result = mysqli_query($conn, $sql);

        

       echo "<script>window.location.href = 'MyFlights.php';</script>";
    }
?>