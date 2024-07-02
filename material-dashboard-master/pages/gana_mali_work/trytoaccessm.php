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
    else
    {
        echo "Connected...";
    }

    $sql = "SELECT flight.seq_no, flight.fno, flight.tnoseats, airline.aname AS airline_name
            FROM flight
            JOIN airline ON flight.ano = airline.ano";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
            
        while($row = $result->fetch_assoc()) 
        {
            echo "Seq No: " . $row["seq_no"]. " - Flight No: " . $row["fno"]. " - Total Seats: " . $row["tnoseats"]. " - Airline: " . $row["airline_name"]. "<br>";
        }
    } 
    else 
    {
        echo "No Flights Availabel....";
    }
    $conn->close();
?>