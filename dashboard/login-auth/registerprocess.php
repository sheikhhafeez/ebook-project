<?php
include "../assets/includes/db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = isset($_POST["role"]) && $_POST["role"] === "author" ? "2" : "3"; 

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email already registered!'); window.history.back();</script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email, password, role_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href ='login.php';</script>";
    } else {
        echo "<script>alert('Error occurred: " . $conn->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
