<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "ebook");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from form
    $title = $_POST['title'];
    $description = $_POST['description'];

    // File upload handling
    $upload_dir = '../../assets/uploads/images/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $image_name = $_FILES['image']['name'];
    $target_file = $upload_dir . $image_name;
    $tmp_dir = $_FILES['image']['tmp_name'];

    if (move_uploaded_file($tmp_dir, $target_file)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO banners (title, description, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $image_name);

        if ($stmt->execute()) {
            echo "Data inserted successfully.";
            header('Location: ../../website/index.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error uploading file.";
    }

    $stmt->close();
    $conn->close();
}
?>
