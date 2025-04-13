<?php
$conn = new mysqli("localhost", "root", "", "ebooks");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>