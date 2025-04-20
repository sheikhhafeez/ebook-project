<?php
include "../assets/includes/db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reader_name = $_POST["reader_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $country_id = $_POST["country_id"];
    $role = 3; // Default role for reader

    // Image upload handling
    $profile_image = "";
    if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == 0) {
        $upload_dir = __DIR__ . "/../uploads/";

        // Create folder if not exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $profile_image = time() . "_" . basename($_FILES["profile_image"]["name"]);
        $target_file = $upload_dir . $profile_image;

        if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            echo "<script>alert('Failed to upload image. Check folder permissions or file size.'); window.history.back();</script>";
            exit();
        }
    }

    // Passwords must match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email already registered!'); window.history.back();</script>";
        exit();
    }

    // Insert into users table
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (email, password, role_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $email, $hashed_password, $role);

    if ($stmt->execute()) {
        $user_id = $stmt->insert_id; // Get the inserted user ID

        // Insert into reader table
        $stmt_reader = $conn->prepare("INSERT INTO reader (reader_name, phone, address, country_id, profile_image, user_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_reader->bind_param("sssssi", $reader_name, $phone, $address, $country_id, $profile_image, $user_id);

        if ($stmt_reader->execute()) {
            echo "<script>alert('Registration successful!'); window.location.href ='login.php';</script>";
        } else {
            echo "<script>alert('Error inserting into reader: " . $stmt_reader->error . "'); window.history.back();</script>";
        }

        $stmt_reader->close();
    } else {
        echo "<script>alert('Error occurred: " . $conn->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
