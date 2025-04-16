<?php

include "../assets/includes/db.php" ;

$id = $_POST['author_id'];
$author_name = $_POST['author_name'];
$bio = $_POST['bio'];

$profile_image = $_FILES['profile_image']['name'];
$profile_image_tmp = $_FILES['profile_image']['tmp_name'];
$profile_path = '../assets/uploads/images/' . $profile_image_tmp;

if (!empty($profile_image)) {
    move_uploaded_file($profile_image_tmp, $profile_path);
    $authors_query = ", profile_image='$profile_image'";
} else {
    $authors_query = "";
}

$query = "UPDATE authors SET 
    author_name='$author_name',
    bio='$bio',
    $authors_query
    WHERE author_id = $id";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Author updated successfully!'); window.location.href='authors.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
