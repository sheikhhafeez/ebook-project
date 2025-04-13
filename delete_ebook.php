<?php
  $conn = new mysqli("localhost", "root", "", "ebooks");
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }



if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $getFiles = mysqli_query($conn, "SELECT cover_image, file_path FROM ebooks WHERE ebook_id = $id");
    $fileData = mysqli_fetch_assoc($getFiles);

    if ($fileData) {
        $coverPath = "../uploads/images/" . $fileData['cover_image'];
        $filePath = "../uploads/files/" . $fileData['file_path'];

    
        if (file_exists($coverPath)) {
            unlink($coverPath);
        }
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        
        $query = "DELETE FROM ebooks WHERE ebook_id = $id";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('eBook deleted successfully.'); window.location.href='veiw_ebooks.php';</script>";
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
