<?php
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; Filename=tc_data.xls");
?>
    <table border="1">
        <thead>
        <tr align="center">
            <th>#</th>
            <th>NAME</th>
            <th>MOBILE NO</th>
            <th>DOB</th>
            <th>GENDER</th>
            <th>BOOKING</th>
            <th>PRN</th>
        </tr>
        </thead>
                <tbody>
                <?php
                    $a=$_POST['field'];
                    $hostName ="localhost";
                    $dbusers ="root";
                    $dbPassword ="";
                    $dbName ="jetsetfly";
                    $conn =mysqli_connect($hostName,$dbusers,$dbPassword,$dbName);
                    if (!$conn)
                    {
                        die("Something went Wrong");
                    }
                    if ($a=='')
                    {
                        $sql="SELECT * FROM passenger";
                    }
                    else
                    {
                        $sql="SELECT * FROM passenger WHERE seq_no=$a";
                    }
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0)
                    {
                        foreach($result as $pass)
                        {
                            //  echo $user['id'];
                            ?>
                            <tr>
                            <td><?php echo $pass['pid']; ?></td>
                            <td><?php echo $pass['name']; ?></td>
                            <td><?php echo $pass['mobile']; ?></td>
                            <td><?php echo $pass['dob']; ?></td>
                            <td><?php echo $pass['gender']; ?></td>

                            <td>
                                <?php 
                                    $pseq=$pass['seq_no'];
                                    $sql7 = "SELECT * FROM flight_schedule WHERE seq_no = $pseq";
                                    $result7 = mysqli_query($conn, $sql7);
                                    if ($result7) 
                                    {
                                        if (mysqli_num_rows($result7) > 0) 
                                        {
                                            $row7 = mysqli_fetch_assoc($result7);
                                        }
                                    }
                                    $fno=$row7['fno'];
                                    $src=$row7['source'];
                                    $dest=$row7['destination'];
                                    echo"$fno : $src -> $dest";
                                ?>
                            </td>
                            <td>
                            <?php 
                            $pid=$pass['pid'];
                            $sql7 = "SELECT * FROM ticket WHERE pid=$pid";
                            $result7 = mysqli_query($conn, $sql7);
                            if ($result7) 
                            {
                                if (mysqli_num_rows($result7) > 0) 
                                {
                                    $row7 = mysqli_fetch_assoc($result7);
                                    $prn=$row7['prn'];
                                }
                            }
                            echo $prn;
                            ?>
                            </td>
                            </tr>
                        <?php
                        }
                    }
                    else
                    {
                        echo "<h5> No Record Found </h5>";
                    }
                ?>
                </tbody>
            </table>
