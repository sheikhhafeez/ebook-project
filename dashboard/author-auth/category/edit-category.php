

<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>

<h2>Edit Category</h2>

<form method="POST" action="edit-categoryprocess.php">
    <!-- Hidden field to store category ID -->
    <input type="hidden" name="category_id" value="<?= $row['category_id'] ?>">

    <!-- Text field to edit category name -->
    <input type="text" name="category_name" value="<?= $row['category_name'] ?>" required>

    <input type="submit" value="Update Category">
</form>

</body>
</html>
