<?php 
include "../assets/includes/db.php"; 
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = trim($_POST["email"]); 
    $password = $_POST["password"]; 

    $stmt = $conn->prepare("SELECT id, password, role_id FROM users WHERE email = ?"); 
    $stmt->bind_param("s", $email); 
    $stmt->execute(); 
    $stmt->store_result(); 

    if ($stmt->num_rows > 0) { 
  
        $stmt->bind_result($id, $hashed_password, $role_id); 
        $stmt->fetch(); 


        if ($role_id == 1) {
            if (md5($password) == $hashed_password) {
                $_SESSION['user_id'] = $id; 
                $_SESSION['user_role'] = $role_id; 
                header("Location: ../admin-auth/index.php"); 
                exit(); 
            } else {
                echo "<script>alert('Invalid credentials!'); window.history.back();</script>"; 
                exit(); 
            }
        } else {
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id; 
                $_SESSION['user_role'] = $role_id; 

                switch ($role_id) { 
                    case 2: 
                        header("Location: ../author-auth/index.php"); 
                        break; 
                    case 3: 
                        header("Location: ../website/view.php"); 
                        break; 
                    default: 
                        echo "<script>alert('Unknown role!'); window.history.back();</script>"; 
                        exit(); 
                } 
                exit(); 
            } else {
                echo "<script>alert('Invalid credentials!'); window.history.back();</script>"; 
                exit(); 
            }
        }
    } else { 
        echo "<script>alert('Invalid credentials!'); window.history.back();</script>"; 
        exit(); 
    } 
    $stmt->close(); 
    $conn->close();
}
?>
