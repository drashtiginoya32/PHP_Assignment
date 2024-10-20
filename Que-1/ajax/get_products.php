<?php
include('../includes/db.php');
$category_id = $_GET['category_id'];
$page = $_GET['page'];
$limit = 5;
$offset = ($page - 1) * $limit;

$products = $conn->query("SELECT * FROM products WHERE category_id = $category_id LIMIT $limit OFFSET $offset");

while ($row = $products->fetch_assoc()) {
    echo "<div>".$row['product_name']." - ".$row['price']."</div>";
}
?>
