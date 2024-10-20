<?php
include('../includes/db.php');
$categories = $conn->query("SELECT * FROM categories");
?>

<h2>Categories</h2>
<ul>
    <?php while ($row = $categories->fetch_assoc()) { ?>
        <li><a href="products.php?category_id=<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></a></li>
    <?php } ?>
</ul>
