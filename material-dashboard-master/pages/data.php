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
    if ($_POST['type']==""){
        $sql="SELECT * FROM airline";
        $query=mysqli_query($conn,$sql) or die("Query Unsucessful");
        $str="";
        while($row=mysqli_fetch_assoc($query)){
            $str.="<option value='{$row['ano']}'>{$row['aname']}</option>";
        }
        echo $str;
    }
    else if ($_POST['type']=="flightData"){
            $sql="SELECT * FROM flight WHERE ano={$_POST['id']}";
            $query=mysqli_query($conn,$sql) or die("Query Unsucessful");
            $str="<option selected disabled>Select Flight</option>";
            while($row=mysqli_fetch_assoc($query)){
                    $str.="<option value='{$row['fno']}'>{$row['fno']}</option>";
            }
            echo $str;
    }
    
    if (isset($_POST['type']) && $_POST['type'] === 'checkEconomyClass') {
        $flightNumber = $_POST['flightNumber'];
        $sql="SELECT noofseats FROM class WHERE fno='$flightNumber' and cname='Economy Class'";
        $result=mysqli_query($conn,$sql);
        if ($result && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['noofseats'] > 0)
                echo "true"; 
            else
                echo "false";
        }
        else
            echo "false"; 
    }
    
    if (isset($_POST['type']) && $_POST['type'] === 'checkFirstClass') {
        $flightNumber = $_POST['flightNumber'];
        $sql="SELECT noofseats FROM class WHERE fno='$flightNumber' and cname='First Class'";
        $result=mysqli_query($conn,$sql);
        if ($result && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['noofseats'] > 0)
                echo "true"; 
            else
                echo "false";
        }
        else
            echo "false"; 
    }

    if (isset($_POST['type']) && $_POST['type'] === 'checkBusinessClass') {
        $flightNumber = $_POST['flightNumber'];
        $sql="SELECT noofseats FROM class WHERE fno='$flightNumber' and cname='Business Class'";
        $result=mysqli_query($conn,$sql);
        if ($result && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['noofseats'] > 0)
                echo "true"; 
            else
                echo "false";
        }
        else
            echo "false"; 
    }




    if (isset($_POST['type']) && $_POST['type'] === 'printEconomyClass') {
        $flightNumber = $_POST['flightNumber'];
        $sql="SELECT noofseats FROM class WHERE fno='$flightNumber' and cname='Economy Class'";
        $result=mysqli_query($conn,$sql);
        if ($result && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['noofseats'] > 0)
                echo $row['noofseats']; 
            else
                echo $row['noofseats'];
        }
        else
            echo "0"; 
    }

    if (isset($_POST['type']) && $_POST['type'] === 'printFirstClass') {
        $flightNumber = $_POST['flightNumber'];
        $sql="SELECT noofseats FROM class WHERE fno='$flightNumber' and cname='First Class'";
        $result=mysqli_query($conn,$sql);
        if ($result && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['noofseats'] > 0)
                echo $row['noofseats']; 
            else
                echo $row['noofseats'];
        }
        else
            echo "0"; 
    }

    if (isset($_POST['type']) && $_POST['type'] === 'printBusinessClass') {
        $flightNumber = $_POST['flightNumber'];
        $sql="SELECT noofseats FROM class WHERE fno='$flightNumber' and cname='Business Class'";
        $result=mysqli_query($conn,$sql);
        if ($result && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['noofseats'] > 0)
                echo $row['noofseats']; 
            else
                echo $row['noofseats'];
        }
        else
            echo "0"; 
    }
?>