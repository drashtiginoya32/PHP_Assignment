<?php
// Include the database connection
include('includes/db.php');

// Load the XML file
$xml = simplexml_load_file('students.xml') or die("Error: Cannot create object");

// Iterate through each student element in the XML
foreach ($xml->student as $student) {
    $name = $student->name;
    $age = $student->age;
    $email = $student->email;

    // Prepare and execute the MySQL insert query
    $stmt = $conn->prepare("INSERT INTO students (name, age, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $age, $email);
    
    if ($stmt->execute()) {
        echo "Student $name inserted successfully.<br>";
    } else {
        echo "Error inserting $name: " . $conn->error . "<br>";
    }
}

// Close the database connection
$conn->close();
?>
