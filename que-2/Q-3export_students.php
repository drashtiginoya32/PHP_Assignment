<?php
// Include the database connection
include('includes/db.php');

// Query the database to fetch all students data
$query = "SELECT * FROM students";
$result = $conn->query($query);

// Create a new XML document
$xml = new DOMDocument("1.0", "UTF-8");
$xml->formatOutput = true;

// Add the root element <students>
$studentsElement = $xml->createElement("students");
$xml->appendChild($studentsElement);

// Loop through each record in the result
while ($row = $result->fetch_assoc()) {
    // Create a <student> element for each row
    $studentElement = $xml->createElement("student");
    
    // Create child elements for name, age, and email
    $nameElement = $xml->createElement("name", $row['name']);
    $ageElement = $xml->createElement("age", $row['age']);
    $emailElement = $xml->createElement("email", $row['email']);
    
    // Append the child elements to the <student> element
    $studentElement->appendChild($nameElement);
    $studentElement->appendChild($ageElement);
    $studentElement->appendChild($emailElement);
    
    // Append the <student> element to the <students> root element
    $studentsElement->appendChild($studentElement);
}

// Save the XML document to a file
$xml->save("students.xml");

// Close the database connection
$conn->close();

// Confirmation message
echo "Data has been successfully exported to students.xml";
?>
