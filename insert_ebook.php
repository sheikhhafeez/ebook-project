<?php

$conn = new mysqli("localhost", "root", "", "ebooks");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$author_id = $_POST['author_id'];
$category_id = $_POST['category_id'];
$description = $_POST['description'];
$language = $_POST['language'];
$isbn = $_POST['isbn'];
$price = $_POST['price'];
$is_free = $_POST['is_free'];
$published_at = $_POST['published_at'];

$cover_image = $_FILES['cover_image']['name'];
$cover_tmp = $_FILES['cover_image']['tmp_name'];
$cover_path = '../uploads/images/' . $cover_image;

$file = $_FILES['file_path']['name'];
$file_tmp = $_FILES['file_path']['tmp_name'];
$file_path = '../uploads/files/' . $file;

if (!is_dir('uploads/images')) {
    mkdir('uploads/images', 0777, true);
}
if (!is_dir('uploads/files')) {
    mkdir('uploads/files', 0777, true);
}

if (!empty($cover_image)) {
    if (!move_uploaded_file($cover_tmp, $cover_path)) {
        die("Failed to upload cover image.");
    }
}
if (!move_uploaded_file($file_tmp, $file_path)) {
    die("Failed to upload eBook file.");
}

$sql = "INSERT INTO ebooks (title, author_id, category_id, description, language, isbn, cover_image, file_path, price, is_free, published_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("siisssssdis", $title, $author_id, $category_id, $description, $language, $isbn, $cover_image, $file_path, $price, $is_free, $published_at);

if ($stmt->execute()) {
    echo "<script>alert('eBook added successfully!'); window.location.href='your_view_page.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}
header("location:veiw_ebooks.php");
$stmt->close();
$conn->close();
?>
