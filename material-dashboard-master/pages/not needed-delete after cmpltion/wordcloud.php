<?php

// Function to perform sentiment analysis with improved negation handling
function performSentimentAnalysis($text) {
    // Define positive and negative words
    $positiveWords = ["good", "awesome", "great", "excellent"];
    $negativeWords = ["bad", "terrible", "awful", "poor"];
    $negations = ["not", "isn't", "wasn't", "cannot", "don't"]; // Add more as needed

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

// Connect to the database
$hostName = "localhost";
$dbusers = "root";
$dbPassword = "";
$dbName = "jetsetfly";
$conn = mysqli_connect($hostName, $dbusers, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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

// Close the database connection
$conn->close();

// Prepare data for bar graph
$labels = array_keys($sentimentFrequencies);
$data = array_values($sentimentFrequencies);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sentiment Analysis Bar Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="sentimentChart" width="400" height="200"></canvas>

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

</body>
</html>
