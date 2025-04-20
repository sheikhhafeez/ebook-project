<?php
session_start();
include "../../assets/includes/db.php";


if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 3) {
    echo "<script>
            alert('Please login with valid credentials');
            window.location.href='../../login-auth/login.php';
          </script>";
    exit;
}

$user_id = $_SESSION['user_id'];


if (isset($_POST['Update_Quantity'])) {
    $cart_id = $_POST['cart_id'];
    $quantity = intval($_POST['prod_quantity']);
    if ($quantity < 1) $quantity = 1;
    if ($quantity > 100) $quantity = 100;

    $update = "UPDATE cart SET quantity = ? WHERE cart_id = ?";
    $stmt = $conn->prepare($update);
    $stmt->bind_param("ii", $quantity, $cart_id);
    if ($stmt->execute()) {
        header("Location: customer-mycart.php");
        exit();
    } else {
        echo "<script>alert('Error updating quantity');</script>";
    }
}


if (isset($_POST['Remove_Item'])) {
    $cart_id = $_POST['cart_id'];
    $delete = "DELETE FROM cart WHERE cart_id = ?";
    $stmt = $conn->prepare($delete);
    $stmt->bind_param("i", $cart_id);
    if ($stmt->execute()) {
        header("Location: customer-mycart.php");
        exit();
    } else {
        echo "<script>alert('Error removing item');</script>";
    }
}


$query = "SELECT c.cart_id, c.quantity, e.title, e.price 
          FROM cart c
          JOIN ebooks e ON c.ebook_id = e.ebook_id
          WHERE c.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}


$grand_total = 0;
foreach ($cart_items as $item) {
    $grand_total += $item['price'] * $item['quantity'];
}
$grand_total = number_format($grand_total, 2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>BookSaw - Free Book Store HTML CSS Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../icomoon/icomoon.css">
    <link rel="stylesheet" type="text/css" href="../css/vendor.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- Slick Theme (optional) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <!-- Slick JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .cart-container {
            margin-top: 30px;
        }

        .grand-total-box {
            background: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>

<body>

    <!-- header start -->
    <div id="header-wrap">

        <div class="top-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="social-links">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-youtube-play"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                </li>
                            </ul>
                        </div><!--social-links-->
                    </div>
                    <div class="col-md-6">
                        <div class="right-element">
                            <a href="#" class="user-account for-buy"><i
                                    class="icon icon-user"></i><span>Account</span></a>
                            <a href="#" class="cart for-buy"><i class="icon icon-clipboard"></i><span>Cart:(0
                                    $)</span></a>

                            <div class="action-menu">

                                <div class="search-bar">
                                    <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                        <i class="icon icon-search"></i>
                                    </a>
                                    <form role="search" method="get" class="search-box">
                                        <input class="search-field text search-input" placeholder="Search"
                                            type="search">
                                    </form>
                                </div>
                            </div>

                        </div><!--top-right-->
                    </div>

                </div>
            </div>
        </div><!--top-content-->

        <header id="header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-2">
                        <div class="main-logo">
                            <a href="index.html"><img src="../../assets/images/download1.png" alt="" width="100px" height="60px"></a>
                        </div>

                    </div>

                    <div class="col-md-10">

                        <nav id="navbar">
                            <div class="main-menu stellarnav">
                                <ul class="menu-list">
                                    <li class="menu-item active"><a href="../index.php">Home</a></li>
                                    <li class="menu-item"><a href="#featured-books" class="nav-link">About</a></li>
                                    <li class="menu-item"><a href="#popular-books" class="nav-link">Shop</a></li>
                                    <li class="menu-item"><a href="#special-offer" class="nav-link">Contact</a></li>
                                    <li class="menu-item"><a href="#download-app" class="nav-link">Download App</a></li>
                                    <li class="menu-item"><a href="#latest-blog" class="nav-link">Competition</a></li>
                                    <li class="menu-item"><a href="../login-auth/logout.php" class="nav-link">logout</a></li>
                                </ul>

                                <div class="hamburger">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </div>

                            </div>
                        </nav>

                    </div>

                </div>
            </div>
        </header>

    </div>
    <!--header-wrap-->
    <div class="container cart-container">
        <div class="row">

            <div class="col-lg-8">
                <h2 class="mb-4">Your Cart</h2>
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th style="width: 120px;">Quantity</th>
                            <th>Total</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($cart_items)): ?>
                            <?php foreach ($cart_items as $item):
                                $total = number_format($item['price'] * $item['quantity'], 2);
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['title']); ?></td>
                                    <td>
                                        <form method="post" class="d-flex justify-content-center align-items-center">
                                            <input type="number" class="form-control text-center"
                                                value="<?php echo $item['quantity']; ?>"
                                                name="prod_quantity"
                                                onchange="this.form.submit()"
                                                min="1" max="100" />
                                            <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>" />
                                            <input type="hidden" name="Update_Quantity" value="true" />
                                        </form>
                                    </td>
                                    <td>$<?php echo $total; ?></td>
                                    <td>
                                        <form method="post" onsubmit="return confirm('Are you sure you want to remove this item?');">
                                            <button type="submit" name="Remove_Item" class="btn btn-sm btn-outline-danger">REMOVE</button>
                                            <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>" />
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">Your cart is empty.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <a href="../index.php">Back to shopping</a>
            </div>


            <div class="col-lg-4">
                <div class="grand-total-box">
                    <h4 class="mb-3">Order Summary</h4>
                    <div class="d-flex justify-content-between mb-3">
                        <h5>Grand Total:</h5>
                        <h5 class="text-primary">$<?php echo $grand_total; ?></h5>
                    </div>


                    <?php if (!empty($cart_items)): ?>
                        <form action="customer-purchase.php" method="POST" class="purchase-form">
                            <div class="mb-3">
                                <label for="Full_name" class="form-label">Full Name</label>
                                <input type="text" id="Full_name" name="reader_name" class="form-control" required />
                            </div>

                            <div class="mb-3">
                                <label for="Address" class="form-label">Address</label>
                                <input type="text" id="Address" name="address" class="form-control" required />
                            </div>

                            <div class="mb-3">
                                <label for="Phone_No" class="form-label">Phone Number</label>
                                <input type="tel" id="Phone_No" name="phone" class="form-control"  required />
                                <div class="form-text">Enter 11-digit phone number</div>
                            </div>

                            <!-- Payment Method -->
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" name="COD" value="COD" id="cod" checked />
                                <label class="form-check-label" for="cod">Cash On Delivery</label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" name="purchase" class="btn btn-primary w-100 btn-lg">Complete Purchase</button>
                        </form>

                    <?php else: ?>
                        <p>Your cart is empty. Add items to purchase.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>