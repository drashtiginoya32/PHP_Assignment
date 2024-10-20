<?php
include('../includes/db.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

// Check if category ID is provided
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    
    // Delete the category
    $conn->query("DELETE FROM categories WHERE id = $category_id");
    
    // Redirect back to manage categories page
    header("Location: manage_category.php");
} else {
    echo "Invalid request.";
}
?>
