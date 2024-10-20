<?php
include('../includes/db.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];
    $conn->query("INSERT INTO categories (category_name) VALUES ('$category_name')");
    header("Location: manage_products.php");
}

$categories = $conn->query("SELECT * FROM categories");
?>

<form method="POST">
    <input type="text" name="category_name" placeholder="Category Name" required>
    <button type="submit">Add Category</button>
</form>

<h2>Manage Categories</h2>
<ul>
    <?php while ($row = $categories->fetch_assoc()) { ?>
        <li><?php echo $row['category_name']; ?> <a href="delete_category.php?id=<?php echo $row['id']; ?>">Delete</a></li>
    <?php } ?>
</ul>
