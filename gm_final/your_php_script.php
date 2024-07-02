<?php
    function factorial($n) {
        if ($n == 0) 
        {
            return 1;
        } 
        else 
        {
            sleep(2);
            return $n * factorial($n - 1);
        }
        


    }

    $start_time = microtime(true); // Start time
    $result = factorial(5); // Simulate a heavy computation
    $end_time = microtime(true); // End time

    // Calculate the elapsed time
    $elapsed_time = $end_time - $start_time;

    // Send a JSON response
    $response = array(
        'status' => 'success',
        'message' => 'Server contact successful!',
        'elapsed_time' => $elapsed_time // Optionally, you can send the elapsed time back to the client
    );

    header('Content-Type: application/json');
    echo json_encode($response);
?>
