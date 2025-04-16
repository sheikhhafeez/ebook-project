<?php

include "../assets/includes/db.php" ;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $getFiles = mysqli_query($conn, "SELECT profile_image FROM authors WHERE author_id = $id");
    $fileData = mysqli_fetch_assoc($getFiles);
    if ($fileData) {
        $profile_image = "../assets/uploads/images/" . $fileData['profile_image'];
    
        if (file_exists($profile_image)) {
            unlink($profile_image);
        }
        
        $query = "DELETE FROM authors WHERE author_id = $id";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('author deleted successfully.'); window.location.href='authors.php';</script>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "No such record found.";
    }
} else {
    echo "Invalid Request.";
}
?>
