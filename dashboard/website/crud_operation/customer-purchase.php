<?php
session_start();
include "../../assets/includes/db.php";  

$grand_total = 0;
$cart_items = array();


$query = "SELECT * FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
    $grand_total += $row['price'] * $row['quantity'];
}


$query = "
    SELECT r.reader_name, r.phone, r.address 
    FROM reader r 
    INNER JOIN users u ON u.id = r.user_id 
    WHERE r.user_id = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$reader_result = $stmt->get_result();
$reader = $reader_result->fetch_assoc();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['purchase'])) {

    $user_name = $reader['reader_name'];  
    $address = $reader['address'];        
    $phone_no = $reader['phone'];        

   
    $query = "INSERT INTO orders (user_id, order_date, total_amount, status) VALUES (?, NOW(), ?, 'pending')";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("id", $_SESSION['user_id'], $grand_total);
    $stmt->execute();

    $order_id = $conn->insert_id;  


    foreach ($cart_items as $item) {
        $ebook_id = $item['ebook_id'];
        $quantity = $item['quantity'];
        $price = $item['price'];

        $query = "INSERT INTO order_items (order_id, ebook_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiid", $order_id, $ebook_id, $quantity, $price);
        $stmt->execute();

    
        $query = "INSERT INTO purchases (user_id, ebook_id, amount_paid) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iid", $_SESSION['user_id'], $ebook_id, $price);
        $stmt->execute();
    }

  
    $_SESSION['order_id'] = $order_id;

   
    header('Location: order_confirmation.php');  // Redirect to the payment page
    exit();
}

$conn->close();
?>
