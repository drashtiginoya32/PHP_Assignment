<?php
header('Content-Type: application/json');

// Sample student data
$students = [
    ['id' => 1, 'name' => 'John Doe', 'age' => 21],
    ['id' => 2, 'name' => 'Jane Smith', 'age' => 22],
];


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the posted data
    $input = json_decode(file_get_contents('php://input'), true);

    // For example, just return the same data for demonstration
    $response = [
        'received_data' => $input
    ];

    // Send the response as JSON
    echo json_encode($response);
}


// Send the response as JSON
echo json_encode($students);
?>
