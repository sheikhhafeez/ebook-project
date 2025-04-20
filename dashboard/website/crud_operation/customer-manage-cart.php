<?php
session_start();
include "../../assets/includes/db.php";

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 3) {
    echo "<script>alert('Please login with valid credentials'); window.location.href='../../login-auth/login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id']; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['Add_To_Cart']) && isset($_POST['ebook_id'])) {
        $ebook_id = intval($_POST['ebook_id']);

       
        $check_ebook = "SELECT * FROM ebooks WHERE ebook_id = ?";
        $stmt = $conn->prepare($check_ebook);
        $stmt->bind_param("i", $ebook_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $ebook = $result->fetch_assoc();
            $price = $ebook['price'];

        
            $check_cart = "SELECT * FROM cart WHERE user_id = ? AND ebook_id = ?";
            $stmt = $conn->prepare($check_cart);
            $stmt->bind_param("ii", $user_id, $ebook_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>alert('Item already in cart'); window.location.href='../crud_operation/customer-mycart.php';</script>";
            } else {
              
                $insert_cart = "INSERT INTO cart (user_id, ebook_id, quantity, price) VALUES (?, ?, 1, ?)";
                $stmt = $conn->prepare($insert_cart);
                $stmt->bind_param("iid", $user_id, $ebook_id, $price);
                if ($stmt->execute()) {
                    echo "<script>alert('Item Added to Cart'); window.location.href='../crud_operation/customer-mycart.php';</script>";
                } else {
                    echo "<script>alert('Error adding item to cart'); window.location.href='../crud_operation/customer-mycart.php';</script>";
                }
            }
        } else {
            echo "<script>alert('Ebook not found'); window.location.href='../crud_operation/customer-mycart.php';</script>";
        }
    }

    elseif (isset($_POST['Remove_Item']) && isset($_POST['ebook_id'])) {
        $ebook_id = intval($_POST['ebook_id']);

        $delete = "DELETE FROM cart WHERE user_id = ? AND ebook_id = ?";
        $stmt = $conn->prepare($delete);
        $stmt->bind_param("ii", $user_id, $ebook_id);
        if ($stmt->execute()) {
            echo "<script>alert('Item Removed from Cart'); window.location.href='../crud_operation/customer-mycart.php';</script>";
        } else {
            echo "<script>alert('Error removing item'); window.location.href='../crud_operation/customer-mycart.php';</script>";
        }
    }

    elseif (isset($_POST['Update_Quantity']) && isset($_POST['ebook_id']) && isset($_POST['quantity'])) {
        $ebook_id = intval($_POST['ebook_id']);
        $quantity = intval($_POST['quantity']);

        if ($quantity < 1) $quantity = 1;
        if ($quantity > 100) $quantity = 100;

        $update = "UPDATE cart SET quantity = ? WHERE user_id = ? AND ebook_id = ?";
        $stmt = $conn->prepare($update);
        $stmt->bind_param("iii", $quantity, $user_id, $ebook_id);
        if ($stmt->execute()) {
            echo "<script>window.location.href='../crud_operation/customer-mycart.php';</script>";
        } else {
            echo "<script>alert('Error updating quantity'); window.location.href='../crud_operation/customer-mycart.php';</script>";
        }
    }

    else {
        echo "<script>alert('Invalid request'); window.location.href='../crud_operation/customer-mycart.php';</script>";
    }
}
?>
