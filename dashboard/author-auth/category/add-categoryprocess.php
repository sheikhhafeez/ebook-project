<?php
include "../../assets/includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to view-category.php after success
        header("Location: view-category.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
