<?php
  $conn = new mysqli("localhost", "root", "", "ebooks");
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }


$id = $_GET['id'];
$query = "SELECT * FROM ebooks WHERE ebook_id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit eBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <form action="editprocess.php" method="POST" enctype="multipart/form-data">
        <h3 class="mb-4">Edit eBook Details</h3>
        <input type="hidden" name="ebook_id" value="<?php echo $data['ebook_id']; ?>">

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" name="title" value="<?php echo $data['title']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Author ID:</label>
            <input type="number" class="form-control" name="author_id" value="<?php echo $data['author_id']; ?>">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category ID:</label>
            <input type="number" class="form-control" name="category_id" value="<?php echo $data['category_id']; ?>">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" name="description"><?php echo $data['description']; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="language" class="form-label">Language:</label>
            <input type="text" class="form-control" name="language" value="<?php echo $data['language']; ?>">
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN:</label>
            <input type="text" class="form-control" name="isbn" value="<?php echo $data['isbn']; ?>">
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image (Optional):</label>
            <input type="file" class="form-control" name="cover_image">
            <small>Current: <?php echo $data['cover_image']; ?></small>
        </div>

        <div class="mb-3">
            <label for="file_path" class="form-label">eBook File (Optional):</label>
            <input type="file" class="form-control" name="file_path">
            <small>Current: <?php echo $data['file_path']; ?></small>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" step="0.01" class="form-control" name="price" value="<?php echo $data['price']; ?>">
        </div>

        <div class="mb-3">
            <label for="is_free" class="form-label">Is Free:</label>
            <select class="form-select" name="is_free">
                <option value="0" <?php if ($data['is_free'] == 0) echo "selected"; ?>>No</option>
                <option value="1" <?php if ($data['is_free'] == 1) echo "selected"; ?>>Yes</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Published At:</label>
            <input type="date" class="form-control" name="published_at" value="<?php echo $data['published_at']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update eBook</button>
    </form>
</div>
</body>
</html>
