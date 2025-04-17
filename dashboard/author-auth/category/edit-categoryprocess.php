<?php
include "../../assets/includes/db.php";

if (isset($_GET['category_id'])) {
  $category_id = $_GET['category_id'];
  $query = "SELECT * FROM categories WHERE category_id = '$category_id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['category_id'];
  $category_name = $_POST['category_name'];
  $query = "UPDATE categories SET category_name='$category_name' WHERE category_id = '$id'";
  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Category updated successfully!'); window.location.href='view-category.php';</script>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

