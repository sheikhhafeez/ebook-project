<?php
session_start();
include "assets/includes/db.php" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if email exists
    $stmt = $conn->prepare("SELECT user_id, role, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $role, $password_hash);
        $stmt->fetch();

        // Now verify the entered password with hashed password from DB
        if (password_verify($password, $password_hash)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_role'] = $role;
            header("location:index.php");
            exit();

            // Redirect based on role
            switch ($role) {
                case 'admin':
                    header("Location: ../AdminDashboard/veiw_ebooks.php");
                    break;
                case 'author':
                    header("Location: ../author/author_dashboard.php");
                    break;
                case 'reader':
                    header("Location: ../CustomerDashboard/veiw_ebooks.php");
                    break;
                default:
                    echo "Unknown role!";
            }
            exit();
        } else {
            echo "<script>alert('Invalid credentials!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials!'); window.history.back();</script>";
    }
}
?>
