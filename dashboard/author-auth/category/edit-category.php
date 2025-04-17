<!DOCTYPE html>
<html>
<head>
  <title>Edit Category</title>                                                                      
</head>
<body>
  <div class="container mt-5">
    <h2>Edit Category</h2>
    <form method="POST" action="edit-categoryprocess">
      <input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">
      <div class="mb-3">
        <label for="category_name" class="form-label">Category Name:</label>
        <input type="text" id="category_name" name="category_name" class="form-control" value="<?php echo $row['category_name']; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Update Category</button>
      <a href="view-category.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
