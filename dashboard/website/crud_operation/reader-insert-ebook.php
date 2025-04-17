<?php
include "../assets/includes/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    // $author_id = $_POST['author_id'];
    // $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $language = $_POST['language'];
    $isbn = $_POST['isbn'];
    $price = $_POST['price'] ?? 0;
    $is_free = $_POST['is_free'] ?? 0;
    $published_at = $_POST['published_at'] ?? date("Y-m-d");

    $cover_image = time() . '_' . basename($_FILES['cover_image']['name']);
    $cover_tmp = $_FILES['cover_image']['tmp_name'];
    $cover_dir = __DIR__ . '/../uploads/images/';
    $cover_path = $cover_dir . $cover_image;

    $file = time() . '_' . basename($_FILES['file_path']['name']);
    $file_tmp = $_FILES['file_path']['tmp_name'];
    $file_dir = __DIR__ . '/../uploads/files/';
    $file_path = $file_dir . $file;

    if (!is_dir($cover_dir)) {
        mkdir($cover_dir, 0777, true);
    }
    if (!is_dir($file_dir)) {
        mkdir($file_dir, 0777, true);
    }

    if (!move_uploaded_file($cover_tmp, $cover_path)) {
        die("Failed to upload cover image.");
    }

    if (!move_uploaded_file($file_tmp, $file_path)) {
        die("Failed to upload eBook file.");
    }


    $sql = "INSERT INTO ebooks (title, description, language, isbn, cover_image, file_path, price, is_free, published_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssdis", $title, $description, $language, $isbn, $cover_image, $file, $price, $is_free, $published_at);

    if ($stmt->execute()) {
        echo "<script>alert('eBook added successfully!'); window.location.href='reader-view.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
