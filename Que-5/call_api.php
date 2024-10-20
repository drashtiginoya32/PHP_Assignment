<?php
// The Express API endpoint
$apiUrl = 'http://localhost:3000/api/students';

// Initialize a cURL session
$ch = curl_init();

// Set the URL for the cURL request
curl_setopt($ch, CURLOPT_URL, $apiUrl);

// Set the cURL option to return the result as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set the HTTP method (GET in this case)
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    // Decode the JSON response from the API
    $students = json_decode($response, true);
    
    // Display the students data
    echo "<h3>List of Students:</h3>";
    foreach ($students as $student) {
        echo "ID: " . $student['id'] . "<br>";
        echo "Name: " . $student['name'] . "<br>";
        echo "Age: " . $student['age'] . "<br><br>";
    }
}

// Close the cURL session
curl_close($ch);
?>
