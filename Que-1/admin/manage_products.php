<?php
include('../includes/db.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // File upload logic
    if (isset($_FILES['image'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $conn->query("INSERT INTO products (category_id, product_name, price, image_path) 
                  VALUES ('$category_id', '$product_name', '$price', '$target_file')");
}

$categories = $conn->query("SELECT * FROM categories");
?>

<form method="POST" enctype="multipart/form-data">
    <select name="category_id">
        <?php while ($row = $categories->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
        <?php } ?>
    </select>
    <input type="text" name="product_name" placeholder="Product Name" required>
    <input type="text" name="price" placeholder="Price" required>
    <input type="file" name="image" required>
    <button type="submit">Add Product</button>
</form>
