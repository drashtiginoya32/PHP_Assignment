<?php
// The Express API endpoint
$apiUrl = 'http://localhost:3000/api/students';

// Data to send in the POST request
$data = [
    'name' => 'Drashti',
    'age' => 23
];

// Convert the data to JSON
$jsonData = json_encode($data);

// Initialize a cURL session
$ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, $apiUrl);

// Set the HTTP method to POST
curl_setopt($ch, CURLOPT_POST, true);

// Attach the data to the POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

// Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Set the option to return the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    echo "Response from API: " . $response;
}

// Close the cURL session
curl_close($ch);
?>
