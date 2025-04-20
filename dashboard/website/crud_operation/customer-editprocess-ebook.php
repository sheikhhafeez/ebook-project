<?php

include "../assets/includes/db.php";

$id = $_POST['ebook_id'];
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
$cover_path = 'uploads/images/' . $cover_image;

$file = $_FILES['file_path']['name'];
$file_tmp = $_FILES['file_path']['tmp_name'];
$file_path = 'uploads/files/' . $file;

if (!empty($cover_image)) {
    move_uploaded_file($cover_tmp, $cover_path);
    $cover_query = ", cover_image='$cover_image'";
} else {
    $cover_query = "";
}

if (!empty($file)) {
    move_uploaded_file($file_tmp, $file_path);
    $file_query = ", file_path='$file'";
} else {
    $file_query = "";
}

$query = "UPDATE ebooks SET 
    author_id='$author_id',
    category_id='$category_id',
    title='$title',
    description='$description',
    language='$language',
    isbn='$isbn',
    price='$price',
    is_free='$is_free',
    published_at='$published_at'
    $cover_query
    $file_query
    WHERE ebook_id = $id";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('eBook updated successfully!'); window.location.href='customer-view.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
