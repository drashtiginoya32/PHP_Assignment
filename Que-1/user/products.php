<?php
include('../includes/db.php');
$category_id = $_GET['category_id'];
?>

<div id="product-list"></div>

<script>
$(document).ready(function() {
    loadProducts(1);  // Load the first page of products

    function loadProducts(page) {
        $.ajax({
            url: "../ajax/get_products.php",
            type: "GET",
            data: {category_id: <?php echo $category_id; ?>, page: page},
            success: function(data) {
                $('#product-list').html(data);
            }
        });
    }
});
</script>
