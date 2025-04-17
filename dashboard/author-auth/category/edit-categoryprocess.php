<?php
include "../../assets/includes/db.php";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category_id = $_POST['category_id'];
  $category_name = $_POST['category_name'];
  $stmt = $conn->prepare("UPDATE categories SET category_name = ? WHERE id = ?");
  $stmt->bind_param("si", $name, $id);
  if ($stmt->execute() === TRUE) {
    echo "Category updated successfully!";
    header("Location: view-category.php"); // redirect back to categories page
  } else {
    echo "Error: " . $conn->error;
  }
}
?>