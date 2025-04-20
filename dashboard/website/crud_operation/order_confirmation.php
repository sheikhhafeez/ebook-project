<?php
session_start();
include "../../assets/includes/db.php";  


if (!isset($_SESSION['order_id'])) {
    echo 'Order ID not found. Please go back and try again.';
    exit();
}

$order_id = $_SESSION['order_id'];


$query = "
    SELECT o.order_id, o.order_date, o.total_amount, o.status, r.reader_name,r.phone,r.address
    FROM orders o
    INNER JOIN reader r ON r.user_id = o.user_id
    WHERE o.order_id = ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order_result = $stmt->get_result();

if ($order_result->num_rows > 0) {
    $order = $order_result->fetch_assoc();
} else {
    echo 'Order not found.';
    exit();
}


$query = "
    SELECT oi.order_item_id, ei.title, oi.quantity, oi.price
    FROM order_items oi
    INNER JOIN ebooks ei ON ei.ebook_id = oi.ebook_id
    WHERE oi.order_id = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order_items_result = $stmt->get_result();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2, h3 {
            color: #0056b3;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        .order-details, .order-items {
            margin-top: 30px;
        }

        .order-details p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .order-items table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .order-items th, .order-items td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .order-items th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .order-items td {
            background-color: #fafafa;
        }

        .order-items tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        .order-items tr:hover td {
            background-color: #f0f0f0;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
            font-size: 18px;
        }

        .back-link a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s;
        }

        .back-link a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Order Confirmation</h1>

        <div class="order-details">
            <h2>Order ID: <?php echo $order['order_id']; ?></h2>
            <p><strong>Order Date:</strong> <?php echo $order['order_date']; ?></p>
            <p><strong>Status:</strong> <?php echo $order['status']; ?></p>
            <p><strong>Total Amount:</strong> $<?php echo $order['total_amount']; ?></p>
            <p><strong>Customer Name:</strong> <?php echo $order['reader_name']; ?></p>
            <p><strong>Customer Phone:</strong> <?php echo $order['phone']; ?></p>
            <p><strong>Customer Address:</strong> <?php echo $order['address']; ?></p>
        </div>

        <div class="order-items">
            <h3>Order Items:</h3>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <?php while ($item = $order_items_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $item['title']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>$<?php echo $item['price']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="back-link">
            <a href="../index.php">Go to Homepage</a>
        </div>
    </div>

</body>
</html>

<?php
$conn->close();
?>
