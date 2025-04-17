<?php
include "../assets/includes/db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $author_name = trim($_POST["author_name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = 2; // Default author role

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
        $stmt->close();
        exit();
    }
    $stmt->close();

    // Insert into users table
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (email, password, role_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $email, $hashed_password, $role);
    
    if (!$stmt->execute()) {
        echo "<script>alert('Error during user registration: " . $stmt->error . "'); window.history.back();</script>";
        $stmt->close();
        $conn->close();
        exit();
    }

    $stmt->close();

    // Get newly inserted user ID
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    // Insert into authors table
    $stmt = $conn->prepare("INSERT INTO authors (user_id, author_name) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $author_name);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!');</script>";
    } else {
        echo "<script>alert('Error occurred: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
