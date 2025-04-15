<?php
$conn = new mysqli("localhost", "root", "", "ebook");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>