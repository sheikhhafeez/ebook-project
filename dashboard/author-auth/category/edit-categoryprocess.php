<?php
include "../../assets/includes/db.php";

// Check if ID is passed via GET
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Query to fetch the category
    $sql = "SELECT * FROM categories WHERE category_id = $category_id";
    $result = mysqli_query($conn, $sql);

    // Check if the category exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // ✅ Correct variable name
    } else {
        echo "Category not found.";
        exit;
    }
} else {
    echo "No category ID provided in URL.";
    exit;
}
?>