<?php
include "../../assets/includes/db.php";

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM categories WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to the category list page after successful deletion
        header("Location: view-category.php");
        exit;
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}
?>
