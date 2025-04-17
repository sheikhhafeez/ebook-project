
<?php
// Include the database connection
include "../../assets/includes/db.php";

// Check if category_id is provided in the URL
if (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    // Prepare and execute the SELECT statement
    $stmt = $conn->prepare("SELECT category_name FROM categories WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $stmt->bind_result($category_name);
    if (!$stmt->fetch()) {
        // No category found with the given ID
        echo "Category not found.";
        exit;
    }
    $stmt->close();
} else {
    echo "Invalid category ID.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['category_id'], $_POST['category_name']) && is_numeric($_POST['category_id'])) {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];

        // Prepare and execute the UPDATE statement
        $stmt = $conn->prepare("UPDATE categories SET category_name = ? WHERE category_id = ?");
        $stmt->bind_param("si", $category_name, $category_id);
        if ($stmt->execute()) {
            // Redirect to the category list page after successful update
            header("Location: view-category.php");
            exit;
        } else {
            echo "Error updating category: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Invalid form data.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
    <!-- Include Bootstrap CSS for styling (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Category</h2>
    <form method="POST" action="">
        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category_id); ?>">
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name:</label>
            <input type="text" id="category_name" name="category_name" class="form-control" value="<?php echo htmlspecialchars($category_name); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="view-category.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
